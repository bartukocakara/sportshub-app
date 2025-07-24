<?php

namespace App\Services;

use App\Http\Resources\UserResource;
use App\Models\City;
use App\Models\Player;
use App\Models\SportType;
use App\Models\Team;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Support\Messages\TeamSwalMessages;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class TeamCreateService
{
    const SESSION_KEY = 'team_creation_data';

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

    public function getAvailableSportTypes(): array
    {
        $data['sport_types'] = SportType::all();
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

    public function getAvailablePlayers(Request $request): array
    {
        $userRepo = app(UserRepository::class);
        $sportTypeId = $this->getSportType();

        $request->merge(['sport_type_id' => [$sportTypeId]]);
        $data['users'] = UserResource::collection(
            $userRepo->all($request, ['sportTypes'])
        )->response()->getData(true);

        $data['sport_type_id'] = $sportTypeId;
        $data['selected_users'] = $this->getSelectedUsers();

        return $this->withStep($data, 3);
    }

    public function setPlayers(array $userIds)
    {
        $users = User::whereIn('id', $userIds)
            ->select('id', 'first_name', 'last_name', 'avatar')
            ->get()
            ->map(function ($user) {
                return [
                    'id' => $user->id,
                    'full_name' => $user->full_name,
                    'avatar' => $user->avatar,
                ];
            })->toArray();

        $this->setSessionData('selected_users', $users);
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
        return $this->withStep($data, 4); // ❗ do NOT show last step here
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
        ]), 5, true); // ✅ show_last_step = true here only
    }

    public function createTeamFromSession(): RedirectResponse
    {
        $data = $this->getSessionData();
        // Flatten the data structure for validation
        $flatData = [
            'sport_type_id' => $data['sport_type_id'] ?? null,
            'city_id' => $data['city_id'] ?? null,
            'title' => $data['team_details']['title'] ?? null,
            'min_player' => $data['team_details']['min_player'] ?? null,
            'max_player' => $data['team_details']['max_player'] ?? null,
            'gender' => $data['team_details']['gender'] ?? null,
            'followable_status' => $data['team_details']['followable_status'] ?? null,
        ];

        $validator = Validator::make($flatData, [
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

        DB::beginTransaction();

        try {
            $team = Team::create([
                'title' => $flatData['title'],
                'sport_type_id' => $flatData['sport_type_id'],
                'city_id' => $flatData['city_id'],
                'min_player' => $flatData['min_player'],
                'max_player' => $flatData['max_player'],
                'gender' => $flatData['gender'],
                'followable_status' => $flatData['followable_status'],
                'team_status' => 'active',
            ]);
            // Attach users if any
            if (!empty($data['selected_users'])) {
                $attachData = [];

                foreach ($data['selected_users'] as $user) {
                    if (isset($user['id']) && isset($user['uuid'])) {
                        $attachData[$user['id']] = ['user_uuid' => $user['uuid']];
                    }
                }

                $team->users()->attach($attachData);
            }

            DB::commit();
            $this->clearSession();
            return redirect()->route('teams.profile', ['id' => $team->id]);
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Team create error', ['exception' => $e]);
            return redirect()->back()->with('swal', TeamSwalMessages::teamCreateSuccess()->toArray());
        }
    }

}
