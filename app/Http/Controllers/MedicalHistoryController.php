<?php

namespace App\Http\Controllers;

use App\Models\MedicalHistory;
use App\Models\Doctor;
use App\Http\Requests\StoreMedicalHistoryRequest;
use App\Http\Requests\UpdateMedicalHistoryRequest;
use App\Models\Token;
use Illuminate\Http\Request;

class MedicalHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $medicalHistory=MedicalHistory::where('doctor_id',session('username'))->get();
        $doctor=Doctor::where('doctor_id',session('username'))->first();
        return view('Doctor.medical_histories')->with('doctor',$doctor)->with('medhist',$medicalHistory);
    }

    public function getMedHistAPI(Request $req){

        $userActive=Token::where('token',$req->token)->first();
        $medicalHistory=MedicalHistory::where('doctor_id',$userActive->user_id)->get();

        return $medicalHistory;

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
     * @param  \App\Http\Requests\StoreMedicalHistoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMedicalHistoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MedicalHistory  $medicalHistory
     * @return \Illuminate\Http\Response
     */
    public function show(MedicalHistory $medicalHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MedicalHistory  $medicalHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(MedicalHistory $medicalHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMedicalHistoryRequest  $request
     * @param  \App\Models\MedicalHistory  $medicalHistory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMedicalHistoryRequest $request, MedicalHistory $medicalHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MedicalHistory  $medicalHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedicalHistory $medicalHistory)
    {
        //
    }
}
