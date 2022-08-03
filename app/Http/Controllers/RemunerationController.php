<?php

namespace App\Http\Controllers;

use App\Models\Remuneration;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\PremiumPayment;
use App\Http\Requests\StoreRemunerationRequest;
use App\Http\Requests\UpdateRemunerationRequest;
use App\Models\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RemunerationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $doctor=Doctor::where('doctor_id',session('username'))->first();
        $rem=Remuneration::where('doctor_id',session('username'))->first();
        if($rem){
            return view('Doctor.payment_profile')->with('rem',$rem)->with('doctor',$doctor);
        }
        return view('Doctor.payment_setup')->with('doctor',$doctor);
    }

    public function generateID(){

        $remuneration=Remuneration::orderBy('rm_id','desc')->first();
        if(empty($remuneration)){
            $Remuneration_ID="RM-1";
            return $Remuneration_ID;
        }else{
            $rec=explode('-',$remuneration->rm_id);
            $new_id=(int)$rec[1];
            $updated_id=$new_id+1;

            $Remuneration_ID="RM-".str($updated_id);

            return $Remuneration_ID;
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        $req->validate([
            'amount'=>'required|numeric',
            'disc_per'=>'required|integer',

        ]);

        $id=$this->generateID();

        $remuneration=new Remuneration();
        $remuneration->rm_id=$id;
        $remuneration->visit=$req->amount;
        $remuneration->discount_per=$req->disc_per;
        $remuneration->doctor_id=$req->d_id;
        $remuneration->save();

        return redirect()->route('pay_setup');


    }

    public function paymentSetupDoctor(Request $req){

        $userActive=Token::where('token',$req->token)->first();
        $doctor=Remuneration::where('doctor_id',$userActive->user_id)->first();
        if($doctor){
            return $doctor;
        }
        return "None";

    }

    public function paySetupDoctor(Request $req){

        $userActive=Token::where('token',$req->token)->first();
        $remu=Remuneration::where('doctor_id',$userActive->user_id)->first();

        if($remu){
            $remu->visit=$req->visit;
            $remu->discount_per=$req->disc_per;
            $remu->save();
            return "Updated";

        }else{

            $id=$this->generateID();
            $rem=new Remuneration();
            $rem->rm_id=$id;
            $rem->visit=$req->visit;
            $rem->discount_per=$req->disc_per;
            $rem->doctor_id=$userActive->user_id;
            $rem->save();

            return "Saved";
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRemunerationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update_rm(Request $req)
    {
        $req->validate([
            'amount'=>'required|numeric',
            'disc_per'=>'required|integer',
        ]);

        $remuneration=Remuneration::where('rm_id',$req->rm_id)->first();
        $remuneration->visit=$req->amount;
        $remuneration->discount_per=$req->disc_per;
        $remuneration->save();

        return redirect()->route('pay_setup');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Remuneration  $remuneration
     * @return \Illuminate\Http\Response
     */
    public function show(Remuneration $remuneration)
    {
        //
        $data=DB::table('remunerations')->join('doctors','remunerations.doctor_id',"=",'doctors.doctor_id')->where('status','Valid')->get();

        $norm=DB::table('remunerations')->join('doctors','remunerations.doctor_id',"=",'doctors.doctor_id')
            ->where('doctor_type','Normal')->where('status','Valid')->get();

        $patient=Patient::where('patient_id',session('username'))->first();

        $is_premium=PremiumPayment::where('patient_id',session('username'))->first();

        if($is_premium){

            return view('Patient.specialists')->with('patient',$patient)->with('details',$data);
        }

        return view('Patient.non_specialists')->with('patient',$patient)->with('details',$norm);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Remuneration  $remuneration
     * @return \Illuminate\Http\Response
     */
    public function edit(Remuneration $remuneration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRemunerationRequest  $request
     * @param  \App\Models\Remuneration  $remuneration
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRemunerationRequest $request, Remuneration $remuneration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Remuneration  $remuneration
     * @return \Illuminate\Http\Response
     */
    public function destroy(Remuneration $remuneration)
    {
        //
    }
}
