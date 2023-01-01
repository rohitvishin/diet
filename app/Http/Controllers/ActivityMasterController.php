<?php

namespace App\Http\Controllers;

use App\Models\ActivityMaster;
use Illuminate\Http\Request;

class ActivityMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ActivityMaster::All();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ActivityMaster  $activityMaster
     * @return \Illuminate\Http\Response
     */
    public function show(ActivityMaster $activityMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ActivityMaster  $activityMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(ActivityMaster $activityMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ActivityMaster  $activityMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ActivityMaster $activityMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ActivityMaster  $activityMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(ActivityMaster $activityMaster)
    {
        //
    }
}