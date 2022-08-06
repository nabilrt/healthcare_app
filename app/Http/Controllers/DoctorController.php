<?php

namespace App\Http\Controllers;

use App\Mail\RemarkMail;
use App\Models\Doctor;
use App\Models\PatientPayment;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Inbox;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Models\Token;
use Illuminate\Http\Request;
use App\Mail\Prescription;
use Illuminate\Support\Facades\Mail;
use Session;
use PDF;

class DoctorController extends Controller
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
      return view('Doctor.register')->with('msg', $success_msg);
    }
        return view('Doctor.register');
    }

    public function dpdf(){
        $doctor=Doctor::where('doctor_id',session('username'))->first();
        $payments=PatientPayment::where('doctor_id',session('username'))->get();
        $amount=PatientPayment::where('doctor_id',session('username'))->sum('paid_amount');
        $pdf = PDF::loadView('Doctor.earning',compact('payments','doctor','amount'));
        return $pdf->download('invoice.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function generateID(){

        $doctor=Doctor::orderBy('doctor_id','desc')->first();
        if(empty($doctor)){
            $Doctor_ID="ASHCS-D-1";
            return $Doctor_ID;
        }else{
            $rec=explode('-',$doctor->doctor_id);
            $new_id=(int)$rec[2];
            $updated_id=$new_id+1;

            $Doctor_ID="ASHCS-D-".str($updated_id);

            return $Doctor_ID;
        }

    }

    public function sendMail(Request $req){

        $doctor=Doctor::where('doctor_id',session('username'))->first();

        $data=array(

            'Name'=>$req->name,
            'Email'=>$req->mail,
            'Meds'=>$req->meds,
            'Doc'=>$doctor->doctor_name

        );


        Mail::to($data['Email'])->send(new Prescription($data));

        return view('Doctor.email_confirmation')->with('doctor',$doctor);
    }

    public function pres(Request $req){

        $inbox=Inbox::where('inbox_id',$req->id)->first();
        $doctor=Doctor::where('doctor_id',session('username'))->first();
        $patient=Patient::where('patient_id',$inbox->patient_id)->first();

        return view('Doctor.prescribe_med')->with('patient',$patient)->with('doctor',$doctor);
    }




    public function create(Request $req)
    {
        //
        $user_id=$this->generateID();

        $req->validate([
            'password'=>'required|max:15|alpha_num',
            'mail'=>'required|email:rfc',
            'name'=>'required',
            'dp'=>'required|mimes:png,jpg',
            'degree'=>'required|mimes:pdf',
            'gender'=>'required|alpha',
            'specialty'=>'required|alpha',
            'doc_type'=>'required|alpha'
        ]);

        if($req->hasFile('dp') && $req->hasFile('degree')){

            $req->dp->store('dp', 'public');
            $req->degree->store('degree', 'public');

        $doctor=new Doctor();
        $doctor->doctor_id = $this->generateID();
        $doctor->doctor_name=$req->name;
        $doctor->doctor_email=$req->mail;
        $doctor->doctor_pass=$req->password;
        $doctor->doctor_gender=$req->gender;
        $doctor->doctor_dp=$req->dp->hashName();
        $doctor->doctor_degree=$req->degree->hashName();
        $doctor->doctor_type=$req->doc_type;
        $doctor->doctor_specialty=$req->specialty;
        $doctor->status="Valid";
        $doctor->save();



        return redirect()->route('register')->with([ 'msg' => "Registration Done!. Your ID is : ".$user_id ]);

        }else{

            return back()->with('msg','Registration Unable To Complete');
        }

    }

    public function getProfileDetails(Request $req){

        $userActive=Token::where('token',$req->token)->first();
        $doctor=Doctor::where('doctor_id',$userActive->user_id)->first();

        return $doctor;
    }

    public function allDoctors(){

        return Doctor::where('status',"Valid")->get();
    }

    public function blockedDoctors(){

        return Doctor::where('status',"Blocked")->get();

    }

    public function blockDoctor(Request $req){

        $doctor=Doctor::where('doctor_id',$req->id)->first();

        $doctor->status="Blocked";
        $doctor->save();

        $data=array(
            'name'=>$doctor->doctor_name,
            'remark'=>$req->remark
        );


        Mail::to($doctor->doctor_email)->send(new RemarkMail($data));

        return "Sent";

    }

    public function unblockDoctor(Request $req){

        $doctor=Doctor::where('doctor_id',$req->id)->first();

        $doctor->status="Valid";
        $doctor->save();

        return "Done";
    }

    public function updateProfileDetails(Request $req){
        $userActive=Token::where('token',$req->token)->first();
        $doctor=Doctor::where('doctor_id',$userActive->user_id)->first();
        $doctor->doctor_name=$req->name;
        $doctor->doctor_email=$req->email;
        $doctor->doctor_pass=$req->pass;
        $doctor->save();

        return "Saved";

    }





    public function loadProfile(Request $req) {

        $doctor=Doctor::where('doctor_id',session('username'))->first();

        return view('Doctor.profile')->with('doctor',$doctor);


    }

    public function updateProfile(Request $req) {

        $req->validate([
            'password'=>'required|max:15|alpha_num',
            'email'=>'required|email:rfc',
            'name'=>'required',
            'dp'=>'required|mimes:jpg,png'

        ]);

        $doctor=Doctor::where('doctor_id',$req->d_id)->first();
        $doctor->doctor_name=$req->name;
        $doctor->doctor_email=$req->email;
        $doctor->doctor_dp=$req->dp->hashName();
        $req->dp->store('dp', 'public');
        $doctor->doctor_pass=$req->password;
        $doctor->save();

        return redirect()->route('profile');




    }

    public function dashboard(){

        $doctor=Doctor::where('doctor_id',session('username'))->first();
        $appointments=Appointment::where('doctor_id',session('username'))->count();
        $inbox=Inbox::where('doctor_id',session('username'))->count();
        $earning=PatientPayment::where('doctor_id',session('username'))->sum('paid_amount');
        return view('Doctor.dashboard')->with('doctor',$doctor)->with('app',$appointments)->with('inb',$inbox)->with('earning',$earning);
    }

    public function logout() {

        session()->forget('username');
        return redirect()->route('login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDoctorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDoctorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDoctorRequest  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        //
    }
}
