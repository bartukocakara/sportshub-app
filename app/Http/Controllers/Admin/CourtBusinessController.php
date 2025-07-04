<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourtBusiness;
use Illuminate\Http\Request;

class CourtBusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.court-businesses.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.court-businesses.create.index');
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
    public function show(CourtBusiness $courtBusiness)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourtBusiness $courtBusiness)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CourtBusiness $courtBusiness)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourtBusiness $courtBusiness)
    {
        //
    }
}
