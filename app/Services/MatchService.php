<?php

namespace App\Services;

use App\Http\Resources\MatchResource;
use App\Models\City;
use App\Models\SportType;
use App\Repositories\CityRepository;
use App\Repositories\MatchRepository;
use App\Repositories\SportTypeRepository;
use App\Support\Messages\MatchSwalMessages;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MatchService extends CrudService
{
    protected MatchRepository $matchRepository;

    /**
     * @param MatchRepository $matchRepository
     * @return void
    */
    public function __construct(MatchRepository $matchRepository)
    {
        $this->matchRepository = $matchRepository;
        parent::__construct($this->matchRepository); // Crud işlemleri yoksa kaldırınız.
    }

    public function index(Request $request, array $with = [], bool $useCache = false) : array
    {
        $datas['matches'] = MatchResource::collection($this->matchRepository->all($request, $with, $useCache))
                                            ->response()
                                            ->getData(true);

        $datas['sport_types'] = (new SportTypeRepository(new SportType()))->home([], $useCache);
        $language = $request->server('HTTP_ACCEPT_LANGUAGE');
        $countryCode = substr($language, 3, 2); // Extract country code (e.g., 'US' for 'en-US')
        $datas['cities'] = (new CityRepository(new City()))->getByCountryCode($countryCode);
        return $datas;
    }

    public function create() : array
    {
        $datas = [];

        return $datas;
    }

    public function delete(string $id): RedirectResponse
    {
        try {
            $match = $this->matchRepository->find($id);

            // Related models üzerinden silme işlemi
            $match->announcements()->delete();
            $match->activities()->delete();

            $playerRequests = $match->requestMatchTeamPlayers;

            foreach ($playerRequests as $request) {
                $request->receivers()->delete();
                $request->delete();
            }

            $match->delete();

            DB::commit();

            // TODO: Delete match images, send notifications...

            return redirect()->route('matches.index')->with('swal', MatchSwalMessages::deletedSuccessfully()->toArray());
        } catch (\Throwable $th) {
            Log::error("message", [$th->getMessage()]);
            // LoggerManager::log('Error deleting match: ', $th->getMessage(), ['user_id' => $id]);

            return redirect()->back()->with('swal', MatchSwalMessages::deleteError()->toArray());
        }
    }
}
