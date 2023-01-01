<?php

namespace App\Http\Controllers;

use App\Models\MedicalMaster;
use Illuminate\Http\Request;

class MedicalMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MedicalMaster::all();
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
     * @param  \App\Models\MedicalMaster  $medicalMaster
     * @return \Illuminate\Http\Response
     */
    public function show(MedicalMaster $medicalMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MedicalMaster  $medicalMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(MedicalMaster $medicalMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MedicalMaster  $medicalMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MedicalMaster $medicalMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MedicalMaster  $medicalMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedicalMaster $medicalMaster)
    {
        //
    }
}
