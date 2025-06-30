<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Services\ActivityService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ActivityController extends Controller
{
    private ActivityService $activityService;

    /**
     * Service interface tanımlanıyor.
     *
     * @param  ActivityService $activityService
     * @return void
     */
    public function __construct(ActivityService $activityService)
    {
        $this->activityService = $activityService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) : View
    {
        $datas = $this->activityService->index($request, ['user'], false);
        return view('activities.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreActivityRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateActivityRequest $request, Activity $activity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        //
    }
}
