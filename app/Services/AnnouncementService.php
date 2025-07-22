<?php

namespace App\Services;

use App\Http\Resources\AnnouncementResource;
use App\Models\City;
use App\Models\Definition;
use App\Models\SportType;
use App\Repositories\AnnouncementRepository;
use App\Repositories\CityRepository;
use App\Repositories\DefinitionRepository;
use App\Repositories\SportTypeRepository;
use App\Support\Messages\AnnouncementSwalMessages;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AnnouncementService extends CrudService
{
    protected AnnouncementRepository $announcementRepository;

    /**
     * @param AnnouncementRepository $announcementRepository
     * @return void
    */
    public function __construct(AnnouncementRepository $announcementRepository)
    {
        $this->announcementRepository = $announcementRepository;
        parent::__construct($this->announcementRepository); // Crud işlemleri yoksa kaldırınız.
    }

    public function index(Request $request, array $with = []) : array
    {
        $datas['announcements'] = AnnouncementResource::collection($this->announcementRepository->all($request, $with, false))
                                            ->response()
                                            ->getData(true);

        $definitions =  (new DefinitionRepository(new Definition()))->all((new Request(['group_key' => 'user_announcement_type'])));
        $datas['announcement_types'] = AnnouncementResource::collection($definitions);
        $datas['sport_types'] = (new SportTypeRepository(new SportType()))->home();
        $language = $request->server('HTTP_ACCEPT_LANGUAGE');
        $countryCode = substr($language, 3, 2); // Extract country code (e.g., 'US' for 'en-US')
        $datas['cities'] = (new CityRepository(new City()))->getByCountryCode($countryCode, ['districts.courtAddresses', 'districts.courtBusinesses'], false);
        return $datas;
    }

    public function create(array $data): RedirectResponse
    {
        try {
            DB::beginTransaction();
             $data['created_user_id'] = auth()->user()->id;

            $data['subject_type'] = 'App\\Models\\' . ucfirst($data['subject_type']);
            DB::commit();
            $this->announcementRepository->create($data);

            return redirect()->back()->with('swal', AnnouncementSwalMessages::createSuccess()->toArray());
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            Log::error($th);
            return redirect()->back()->with('swal', AnnouncementSwalMessages::createError()->toArray());
        }
    }
}
