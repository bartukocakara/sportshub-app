<?php

namespace App\Services;

use App\Models\City;
use App\Models\Team;
use App\Models\User;
use App\Models\SportType;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\RequestPlayerTeam;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\UserResource;
use App\Repositories\UserRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use App\Enums\Request\RequestStatusEnum;
use App\Enums\TypeEnums\RequestReceiverNameEnum;
use App\Models\PlayerTeam;
use App\Models\RequestReceiver;
use App\Models\TeamLeader;
use App\Repositories\SportTypeRepository;
use Illuminate\Support\Facades\Validator;
use App\Support\Messages\TeamSwalMessages;
use Illuminate\Validation\ValidationException;

class TeamCreateService
{
    private Team $team;
    private const SESSION_KEY = 'team_creation_data';

    protected function getSessionData(?string $key = null)
    {
        return $key ? Session::get(self::SESSION_KEY . '.' . $key) : Session::get(self::SESSION_KEY, []);
    }

    protected function setSessionData(string $key, $value)
    {
        Session::put(self::SESSION_KEY . '.' . $key, $value);
    }

    public function clearSession()
    {
        Session::forget(self::SESSION_KEY);
    }

    /**
     * Wraps data with step number and last step visibility flag.
     */
    private function withStep(array $data, int $step, bool $showLast = false): array
    {
        $data['current_step'] = $step;
        $data['show_last_step'] = $showLast;
        return $data;
    }

    public function getAvailableSportTypes(Request $request): array
    {
        $sportTypeRepo = app(SportTypeRepository::class);
        $data['sport_types'] = $sportTypeRepo->all($request);
        $data['sport_type_id'] = $this->getSportType();
        return $this->withStep($data, 1);
    }

    public function setSportType(string $sportTypeId)
    {
        $this->setSessionData('sport_type_id', $sportTypeId);
    }

    public function getSportType()
    {
        return $this->getSessionData('sport_type_id');
    }

    public function getAvailableCities(): array
    {
        $data['cities'] = City::all();
        $data['city_id'] = $this->getCity();
        $data['sport_type_id'] = $this->getSportType();
        return $this->withStep($data, 2);
    }

    public function setCity(int $cityId)
    {
        $this->setSessionData('city_id', $cityId);
    }

    public function getCity()
    {
        return $this->getSessionData('city_id');
    }

    public function getAvailableUsers(Request $request): array
    {
        $userRepo = app(UserRepository::class);
        $sportTypeId = $this->getSportType();

        $request->merge(['sport_type_id' => [$sportTypeId]]);
        $request->merge(['except_me' => [auth()->user()->id]]);
        // $request->merge(['city_id' => $this->getCity()]); #TODO canlıya geçerken açılacak
        $data['users'] = UserResource::collection(
            $userRepo->all($request, ['sportTypes', 'userActiveAddress'])
        )->response()->getData(true);
        $data['city_id'] = $this->getCity();
        $data['sport_type_id'] = $this->getSportType();
        $data['sport_type_id'] = $sportTypeId;
        $data['selected_users'] = $this->getSelectedUsers();

        return $this->withStep($data, 3);
    }

    public function setPlayers(array $userIds)
    {
        $authUser = auth()->user();
        // Fetch users from DB
        $users = User::whereIn('id', $userIds)
            ->select('id', 'first_name', 'last_name', 'avatar')
            ->get()
            ->map(function ($user) {
                return [
                    'id' => $user->id,
                    'uuid' => $user->uuid ?? null, // include uuid for attach logic
                    'full_name' => $user->full_name,
                    'avatar' => $user->avatar,
                ];
            })
            ->keyBy('id')
            ->toArray();

        // Add authenticated user if not in the list
        if (!in_array($authUser->id, $userIds)) {
            $users[$authUser->id] = [
                'id' => $authUser->id,
                'uuid' => $authUser->uuid ?? null,
                'full_name' => $authUser->full_name,
                'avatar' => $authUser->avatar,
            ];
        }

        // Save to session
        $this->setSessionData('selected_users', array_values($users));
    }

    public function getSelectedUsers(): array
    {
        return $this->getSessionData('selected_users') ?? [];
    }

    public function setTeamDetails(array $details)
    {
        $currentDetails = $this->getSessionData('team_details') ?? [];
        $this->setSessionData('team_details', array_merge($currentDetails, $details));
    }

    public function getTeamDetails(): array
    {
        $data['team_details'] = $this->getSessionData('team_details') ?? [];
        return $this->withStep($data, 4);
    }

    public function getAllTeamData(): array
    {
        $data = $this->getSessionData();
        $sportType = $data['sport_type_id'] ? SportType::find($data['sport_type_id']) : null;
        $city = $data['city_id'] ? City::find($data['city_id']) : null;

        $selectedUsers = $this->getSelectedUsers();
        $playerNames = !empty($selectedUsers)
            ? array_column($selectedUsers, 'full_name')
            : [];
        return $this->withStep(array_merge($data, [
            'sport_type_name' => $sportType?->title ?? 'N/A',
            'city_name' => $city?->title ?? 'N/A',
            'player_names' => $playerNames,
        ]), 5, true);
    }

    public function createTeamFromSession(): RedirectResponse
    {
        $data = $this->getSessionData();

        $flatData = $this->flattenTeamData($data);

        $this->validateTeamData($flatData);

        DB::beginTransaction();

        try {
            $this->createTeam($flatData);

            if (!empty($data['selected_users'])) {
                $invitationValidationResponse = $this->validateInvitations($data['selected_users']);
                if ($invitationValidationResponse instanceof RedirectResponse) {
                    return $invitationValidationResponse;
                }
                $this->handleInvitations($data['selected_users']);
            }

            $this->addPlayerToTeam(auth()->user());
            $this->team->logActivity('team.created', $this->team, [
                'user' => auth()->user()?->first_name,
                'team_title' => $this->team->title,
            ]);


            $this->team->follow(auth()->id());
            $this->createTeamLeader();
            DB::commit();
            $this->clearSession();

            return redirect()->route('teams.profile', ['id' => $this->team->id]);
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Team create error', ['exception' => $e]);

            return redirect()->back()->with('swal', TeamSwalMessages::teamCreateError()->toArray());
        }
    }

    private function flattenTeamData(array $data): array
    {
        return [
            'sport_type_id' => $data['sport_type_id'] ?? null,
            'city_id' => $data['city_id'] ?? null,
            'title' => $data['team_details']['title'] ?? null,
            'min_player' => $data['team_details']['min_player'] ?? null,
            'max_player' => $data['team_details']['max_player'] ?? null,
            'gender' => $data['team_details']['gender'] ?? null,
            'followable_status' => $data['team_details']['followable_status'] ?? null,
        ];
    }

    private function validateTeamData(array $data): void
    {
        $validator = Validator::make($data, [
            'sport_type_id' => ['required', 'uuid'],
            'city_id' => ['required', 'integer', 'exists:cities,id'],
            'title' => ['required', 'string', 'max:255'],
            'min_player' => ['required', 'integer', 'min:1'],
            'max_player' => ['required', 'integer', 'min:1', 'gte:min_player'],
            'gender' => ['required', 'in:male,female,mixed'],
            'followable_status' => ['required', 'in:0,1'],
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }

    private function createTeam(array $data): void
    {
        $this->team = Team::create([
            'title' => $data['title'],
            'sport_type_id' => $data['sport_type_id'],
            'city_id' => $data['city_id'],
            'min_player' => $data['min_player'],
            'player_count' => 1,
            'max_player' => $data['max_player'],
            'gender' => $data['gender'],
            'followable_status' => $data['followable_status'],
            'team_status' => 'active',
        ]);
    }

    private function validateInvitations(array $users): ?RedirectResponse
    {
        $userCount = count($users);

        if ($userCount < $this->team->min_player) {
            return redirect()->back()->with('swal', TeamSwalMessages::teamPlayersMinCountError()->toArray());
        }

        if ($userCount > $this->team->max_player) {
            return redirect()->back()->with('swal', TeamSwalMessages::teamPlayersMaxCountError()->toArray());
        }
        return null;

    }

    private function handleInvitations(array $users): void
    {
        $playerRequests = [];
        $receiverRequests = [];
        $now = now();

        foreach ($users as $user) {
            if (!isset($user['id']) || $user['id'] === auth()->id()) {
                continue;
            }

            $requestId = (string) Str::uuid();

            $playerRequests[] = [
                'id' => $requestId,
                'requested_user_id' => $user['id'],
                'team_id' => $this->team->id,
                'status' => RequestStatusEnum::WAITING_FOR_APPROVAL->value,
                'type' => 'invite',
                'title' => __('messages.team_invite_request_title', ['title' => $this->team->title]),
                'expiring_date' => $now->copy()->addDays(7),
                'created_at' => $now,
                'updated_at' => $now,
            ];

            $receiverRequests[] = [
                'id' => (string) Str::uuid(),
                'requestable_id' => $requestId,
                'requestable_type' => RequestPlayerTeam::class,
                'receiver_user_id' => $user['id'],
                'name' => RequestReceiverNameEnum::REQUEST_PLAYER_TEAM->value,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        RequestPlayerTeam::insert($playerRequests);
        RequestReceiver::insert($receiverRequests);
    }

    private function addPlayerToTeam(User $user): void
    {
        PlayerTeam::create([
            'user_id' => $user->id,
            'team_id' => $this->team->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    private function createTeamLeader()
    {
        TeamLeader::insert([
            [
                'team_id' => $this->team->id,
                'user_id'=> auth()->user()->id,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
