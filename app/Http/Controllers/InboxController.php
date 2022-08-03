<?php

namespace App\Http\Controllers;

use App\Models\Inbox;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Token;
use Illuminate\Http\Request;
use App\Http\Requests\StoreInboxRequest;
use App\Http\Requests\UpdateInboxRequest;

class InboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $inbox=Inbox::where('doctor_id',session('username'))->get();
        $doctor=Doctor::where('doctor_id',session('username'))->first();

        return view('Doctor.inbox')->with('inboxes',$inbox)->with('doctor',$doctor);
    }

    public function ind(){

        $inbox=Inbox::where('patient_id',session('username'))->get();
        $patient=Patient::where('patient_id',session('username'))->first();

        return view('Patient.inbox')->with('inboxes',$inbox)->with('patient',$patient);


    }

    public function apiInboxFetch(Request $req){

        $activeUser=Token::where('token',$req->token)->first();

        return Inbox::where('doctor_id',$activeUser->user_id)->get();

    }
    public function apiInboxFetchPatient(Request $req){

        $activeUser=Token::where('token',$req->token)->first();

        return Inbox::where('patient_id',$activeUser->user_id)->get();

    }

    public function finish(Request $req){
        $inbox = Inbox::where('inbox_id',$req->i_id)->first();
        $inbox->delete();
        return redirect()->route('inbox');
    }

    public function finishAppointmentAPIDoctor(Request $req){
        $inbox = Inbox::where('inbox_id',$req->id)->first();
        $inbox->delete();
        return "Finished";
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
     * @param  \App\Http\Requests\StoreInboxRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInboxRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inbox  $inbox
     * @return \Illuminate\Http\Response
     */
    public function show(Inbox $inbox)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inbox  $inbox
     * @return \Illuminate\Http\Response
     */
    public function edit(Inbox $inbox)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInboxRequest  $request
     * @param  \App\Models\Inbox  $inbox
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInboxRequest $request, Inbox $inbox)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inbox  $inbox
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inbox $inbox)
    {
        //
    }
}
