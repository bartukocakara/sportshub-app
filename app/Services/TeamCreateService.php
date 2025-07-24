<?php

namespace App\Services;

use App\Http\Resources\UserResource;
use App\Models\City; // Assuming you have City, SportType, Player models
use App\Models\Player;
use App\Models\SportType;
use App\Models\Team;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TeamCreateService
{
    const SESSION_KEY = 'team_creation_data';

    /**
     * Get data from the session.
     * @param ?string $key
     * @return mixed
     */
    protected function getSessionData(?string $key = null)
    {
        if ($key) {
            return Session::get(self::SESSION_KEY . '.' . $key);
        }
        return Session::get(self::SESSION_KEY, []);
    }

    /**
     * Set data in the session.
     * @param string $key
     * @param mixed $value
     */
    protected function setSessionData(string $key, $value)
    {
        Session::put(self::SESSION_KEY . '.' . $key, $value);
    }

    /**
     * Clear all team creation data from the session.
     */
    public function clearSession()
    {
        Session::forget(self::SESSION_KEY);
    }

    /**
     * Get available sport types.
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAvailableSportTypes():array
    {
        $datas = [];
        $datas['sport_types'] = SportType::all();
        $datas['sport_type_id'] = $this->getSportType();
        $datas['current_step'] = 1;
        return $datas;
    }

    /**
     * Set the selected sport type.
     * @param string $sportTypeId
     */
    public function setSportType(string $sportTypeId)
    {
        $this->setSessionData('sport_type_id', $sportTypeId);
    }

    /**
     * Get the selected sport type ID.
     * @return int|null
     */
    public function getSportType()
    {
        return $this->getSessionData('sport_type_id');
    }

    /**
     * Get available cities.
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAvailableCities():array
    {
        $datas['cities']=  City::all();
        $datas['city_id']=  $this->getCity();
        $datas['sport_type_id'] = $this->getSportType();
        $datas['current_step'] = 2;
        return $datas;
    }

    /**
     * Set the selected city.
     * @param int $cityId
     */
    public function setCity(int $cityId)
    {
        $this->setSessionData('city_id', $cityId);
    }

    /**
     * Get the selected city ID.
     * @return int|null
     */
    public function getCity()
    {
        return $this->getSessionData('city_id');
    }

    /**
     * Get available players.
     * You might filter these based on the selected sport type or other criteria.
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAvailablePlayers(Request $request): array
    {
        $datas = [];
        $userRepo = app(UserRepository::class);
        $sportTypeId = $this->getSportType();
        $request->merge(['sport_type_id' => [$sportTypeId]]);
        $datas['users'] = UserResource::collection($userRepo->all($request, ['sportTypes']))->response()->getData(true);
        $datas['sport_type_id'] = $sportTypeId;
        $datas['selected_users'] = $this->getSelectedUsers();
        $datas['current_step'] = 3;

        // dd($datas['selected_users']);
        return $datas;
    }

    /**
     * Set the selected players.
     * @param array $userIds
     */
    public function setPlayers(array $userIds)
    {
        $usersData = User::whereIn('id', $userIds)
                            ->select('id', 'first_name', 'last_name', 'avatar') // Select only necessary fields
                            ->get()
                            ->map(function ($user) {
                                return [
                                    'id' => $user->id,
                                    'full_name' => $user->full_name, // Assuming you have an accessor or can derive it
                                    'avatar' => $user->avatar,
                                ];
                            })->toArray();
        $this->setSessionData('selected_users', $usersData);
    }

    /**
     * Get the selected users.
     * @return array
     */
    public function getSelectedUsers(): array
    {
        return $this->getSessionData('selected_users') ?? [];
    }

    /**
     * Set the team details.
     * @param array $details
     */
    public function setTeamDetails(array $details)
    {
        $currentDetails = $this->getSessionData('team_details') ?? [];
        $this->setSessionData('team_details', array_merge($currentDetails, $details));
    }

    /**
     * Get the team details.
     * @return array
     */
    public function getTeamDetails(): array
    {
        $datas['team_details'] = $this->getSessionData('team_details') ?? [];
        $datas['current_step'] = 4;
        return $datas;
    }

    /**
     * Get all collected team data from the session.
     * @return array
     */
    public function getAllTeamData(): array
    {
        $datas = $this->getSessionData();
        // Optionally, load related models for display
        $sportType = $datas['sport_type_id'] ? SportType::find($datas['sport_type_id']) : null;
        $city = $datas['city_id'] ? City::find($datas['city_id']) : null;
        $players = !empty($data['selected_users']) ? User::whereIn('id', $datas['selected_users'])->get() : collect();
        $datas['current_step'] = 5;

        return array_merge($datas, [
            'sport_type_name' => $sportType ? $sportType->title : 'N/A',
            'city_name' => $city ? $city->title : 'N/A',
            'player_names' => $players->pluck('first_name')->toArray(),
        ]);
    }

    /**
     * Create the team in the database using session data.
     * @return \App\Models\Team
     * @throws \Exception
     */
    public function createTeamFromSession(): Team
    {
        $data = $this->getSessionData();

        if (empty($data['sport_type_id']) || empty($data['city_id']) || empty($data['team_details']['team_name'])) {
            throw new \Exception('Missing required team creation data.');
        }

        DB::beginTransaction();
        try {
            $team = Team::create([
                'title' => $data['team_details']['team_name'],
                'sport_type_id' => $data['sport_type_id'],
                'city_id' => $data['city_id'],
                'min_player' => $data['team_details']['min_player'],
                'max_player' => $data['team_details']['max_player'],
                'gender' => $data['team_details']['gender'],
                'followable_status' => $data['team_details']['followable_status'],
                'team_status' => 'active',
            ]);

            if (!empty($data['selected_users'])) {
                $team->users()->attach($data['selected_users']);
            }

            DB::commit();
            return $team;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
