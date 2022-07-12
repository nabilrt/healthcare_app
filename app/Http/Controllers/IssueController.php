<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\MedicalHistory;
use App\Models\Patient;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Http\Requests\StoreIssueRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateIssueRequest;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        //
        $issues=Issue::where('his_id',$req->h_id)->get();
        $appointment=MedicalHistory::where('his_id',$req->h_id)->first();
        $patient=Appointment::where('appointment_id',$appointment->appointment_id)->first();
        $p_id=Patient::where('patient_id',$patient->patient_id)->first();
        $doctor=Doctor::where('doctor_id',session('username'))->first();

        return view('Doctor.issues')->with('issues',$issues)
        ->with('appointment_id',$appointment->appointment_id)
        ->with('patient',$p_id)
        ->with('doctor',$doctor);
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
     * @param  \App\Http\Requests\StoreIssueRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIssueRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function show(Issue $issue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function edit(Issue $issue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIssueRequest  $request
     * @param  \App\Models\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIssueRequest $request, Issue $issue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Issue $issue)
    {
        //
    }
}
