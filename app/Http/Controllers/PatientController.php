<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Models\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Session;
use PDF;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Session::has('msg'))
        {
            $success_msg = session()->get('msg');
            session()->forget('msg');
            return view('Patient.register')->with('msg', $success_msg);
        }
        return view('Patient.register');
    }

    public function dashboard(){

       // $datas=Http::get('https://covid-api.mmediagroup.fr/v1/history?country=Bangladesh&status=deaths')['All'];

        $patient=Patient::where('patient_id',session('username'))->first();
        if($patient->membership_type=="Basic"){
            return view('Patient.dashboard')->with('patient',$patient);
        }
        return view('Patient.premium_dashboard')->with('patient',$patient);
    }

    public function loadProfile(Request $req) {

        $patient=Patient::where('patient_id',session('username'))->first();

        return view('Patient.profile')->with('patient',$patient);


    }

    public function updateProfile(Request $req) {

        $req->validate([
            'password'=>'required|max:15|alpha_num',
            'email'=>'required|email:rfc',
            'name'=>'required',
            'dp'=>'required|mimes:jpg,png'

        ]);

        $patient=Patient::where('patient_id',$req->p_id)->first();
        $patient->patient_name=$req->name;
        $patient->patient_email=$req->email;
        $patient->patient_dp=$req->dp->hashName();
        $req->dp->store('dp', 'public');
        $patient->patient_pass=$req->password;
        $patient->save();

        return redirect()->route('p_profile');




    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        //
        $user_id=$this->generateID();

        $req->validate([
            'password'=>'required|max:15|alpha_num',
            'mail'=>'required|email:rfc',
            'name'=>'required',
            'dp'=>'required|mimes:png,jpg',
            'gender'=>'required|alpha',
            'dob'=>'required|date'
        ]);

        if($req->hasFile('dp')){

            $req->dp->store('dp', 'public');

            $patient=new Patient();
            $patient->patient_id=$user_id;
            $patient->patient_name=$req->name;
            $patient->patient_email=$req->mail;
            $patient->patient_pass=$req->password;
            $patient->patient_gender=$req->gender;
            $patient->patient_dob=$req->dob;
            $patient->patient_dp=$req->dp->hashName();
            $patient->membership_type="Basic";
            $patient->status="Valid";
            $patient->save();

            return redirect()->route('p_register')->with([ 'msg' => "Registration Done!. Your ID is : ".$user_id ]);

        }else{

            return back()->with('msg','Registration Unable To Complete');
        }


    }

    public function generateID(){

        $patient=Patient::orderBy('patient_id','desc')->first();
        if(empty($patient)){

            return "ASHCS-P-1";
        }else{
            $rec=explode('-',$patient->patient_id);
            $new_id=(int)$rec[2];
            $updated_id=$new_id+1;

            return "ASHCS-P-".str($updated_id);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePatientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePatientRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePatientRequest  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function getProfileDetails(Request $req){

        $userActive=Token::where('token',$req->token)->first();
        $patient=Patient::where('patient_id',$userActive->user_id)->first();

        return $patient;
    }

    public function updateProfileDetails(Request $req){
        $userActive=Token::where('token',$req->token)->first();
        $patient=Patient::where('patient_id',$userActive->user_id)->first();
        $patient->patient_name=$req->name;
        $patient->patient_email=$req->email;
        $patient->patient_pass=$req->pass;
        $patient->save();

        return "Saved";

    }


    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
