<?php

namespace App\Http\Controllers;

use App\Mail\RemarkMail;
use App\Models\Admin;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\PremiumPayment;
use App\Models\Comission;
use App\Models\Expense;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Admin::where('admin_id',session('username'))->first();
        $expense=Expense::sum('amount');
        $premium=PremiumPayment::sum('amount');
        $com=Comission::sum('amount');
        $total_earn=(int)$premium+(int)$com;
        $profit=$total_earn-(int)$expense;
        return view('Admin.dashboard')->with('admin',$admin)->with('expense',$expense)->with('total_earning',$total_earn)->with('profit',$profit);

    }

    public function getProfileDetails(Request $req){

        $userActive=Token::where('token',$req->token)->first();
        return Admin::where('admin_id',$userActive->user_id)->first();
    }

    public function updateProfileDetails(Request $req){
        $userActive=Token::where('token',$req->token)->first();
        $admin=Admin::where('admin_id',$userActive->user_id)->first();
        $admin->admin_name=$req->name;
        $admin->admin_email=$req->email;
        $admin->admin_pass=$req->pass;
        $admin->save();

        return "Saved";

    }

    public function loadProfile(Request $req) {

        $admin=Admin::where('admin_id',session('username'))->first();

        return view('Admin.profile')->with('admin',$admin);


    }

    public function updateProfile(Request $req) {

        $req->validate([
            'password'=>'required|max:15|alpha_num',
            'email'=>'required|email:rfc',
            'name'=>'required',
            'dp'=>'required|mimes:jpg,png'

        ]);

        if($req->hasFile('dp')){

            $admin=Admin::where('admin_id',$req->a_id)->first();
            $admin->admin_name=$req->name;
            $admin->admin_email=$req->email;
            $admin->admin_dp=$req->dp->hashName();
            $req->dp->store('dp', 'public');
            $admin->admin_pass=$req->password;
            $admin->save();

            return redirect()->route('a_profile');

        }

        else{

            $admin=Admin::where('admin_id',$req->a_id)->first();
            $admin->admin_name=$req->name;
            $admin->admin_email=$req->email;
            $admin->admin_pass=$req->password;
            $admin->save();

            return redirect()->route('a_profile');
        }


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

    public function blockPatient(Request $req){

        $admin=Admin::where('admin_id',session('username'))->first();
        $patient=Patient::where('patient_id',$req->p_id)->first();

        return view('Admin.block_remark')->with('admin',$admin)->with('patient',$patient);


    }

    public function blockDoctor(Request $req){

        $admin=Admin::where('admin_id',session('username'))->first();
        $doctor=Doctor::where('doctor_id',$req->d_id)->first();

        return view('Admin.doctor_block')->with('admin',$admin)->with('doctor',$doctor);


    }

    public function block_doc(Request $req){

        $doctor=Doctor::where('doctor_id',$req->d_id)->first();

        if($req->rem){

            $doctor->status="Blocked";
            $doctor->save();

            return redirect()->route('ma_doc');
        }
        else{

            $doctor->status="Blocked";
            $doctor->save();

            $data=array(
                'name'=>$doctor->doctor_name,
                'remark'=>$req->remark
            );


            Mail::to($doctor->doctor_email)->send(new RemarkMail($data));

            return redirect()->route('ma_doc');

        }
    }

    public function blockUser(Request $req){

        $patient=Patient::where('patient_id',$req->p_id)->first();

        if($req->rem){

            $patient->status="Blocked";
            $patient->save();

            return redirect()->route('ma_pa');
        }
        else{

            $patient->status="Blocked";
            $patient->save();

            $data=array(
                'name'=>$patient->patient_name,
                'remark'=>$req->remark
            );


            Mail::to($patient->patient_email)->send(new RemarkMail($data));

            return redirect()->route('ma_pa');

        }




    }

    public function validPatients(){

        $admin=Admin::where('admin_id',session('username'))->first();
        $patients=Patient::where('status','Valid')->get();
        return view('Admin.manage_patients')->with('admin',$admin)->with('patients',$patients);

    }

    public function validDoctors(){

        $admin=Admin::where('admin_id',session('username'))->first();
        $doctors=Doctor::where('status','Valid')->get();
        return view('Admin.manage_doctors')->with('admin',$admin)->with('doctors',$doctors);

    }

    public function blockedPatients(){

        $admin=Admin::where('admin_id',session('username'))->first();
        $patients=Patient::where('status','Blocked')->get();
        return view('Admin.blocked_patients')->with('admin',$admin)->with('patients',$patients);

    }

    public function blockedDoctors(){

        $admin=Admin::where('admin_id',session('username'))->first();
        $doctors=Doctor::where('status','Blocked')->get();
        return view('Admin.blocked_doctors')->with('admin',$admin)->with('doctors',$doctors);

    }

    public function unblockPatient(Request $req){

        $patient=Patient::where('patient_id',$req->p_id)->first();
        $patient->status="Valid";
        $patient->save();

        return redirect()->route('bl_pa');
    }

    public function unblockDoctor(Request $req){

        $doctor=Doctor::where('doctor_id',$req->d_id)->first();
        $doctor->status="Valid";
        $doctor->save();

        return redirect()->route('bl_doc');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAdminRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdminRequest  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
