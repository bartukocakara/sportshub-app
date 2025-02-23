<?php

namespace App\Http\Controllers\CourtBusiness;

use App\Http\Controllers\Controller;
use App\Services\CourtBusiness\CourtService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CourtController extends Controller
{
    public CourtService $courtService;

    public function __construct(CourtService $courtService)
    {
        $this->courtService = $courtService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) : View
    {
        $homeData = $this->courtService->all($request);
        return view('court-business.courts.index', compact('homeData'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
