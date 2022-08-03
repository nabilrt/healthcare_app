<?php

namespace App\Http\Controllers;

use App\Models\PatientPayment;
use App\Models\Doctor;
use App\Http\Requests\StorePatientPaymentRequest;
use App\Http\Requests\UpdatePatientPaymentRequest;
use App\Models\Token;
use Illuminate\Http\Request;

class PatientPaymentController extends Controller
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
        $payments=PatientPayment::where('doctor_id',session('username'))->paginate(5);
        $pay=PatientPayment::where('doctor_id',session('username'))->sum('paid_amount');
        return view('Doctor.earnings')->with('doctor',$doctor)->with('payments',$payments)->with('earned',$pay);
    }

    public function earningAPI(Request $req){

        $userActive=Token::where('token',$req->token)->first();
        $payments=PatientPayment::where('doctor_id',$userActive->user_id)->get();

        return $payments;
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
     * @param  \App\Http\Requests\StorePatientPaymentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePatientPaymentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PatientPayment  $patientPayment
     * @return \Illuminate\Http\Response
     */
    public function show(PatientPayment $patientPayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PatientPayment  $patientPayment
     * @return \Illuminate\Http\Response
     */
    public function edit(PatientPayment $patientPayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePatientPaymentRequest  $request
     * @param  \App\Models\PatientPayment  $patientPayment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePatientPaymentRequest $request, PatientPayment $patientPayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PatientPayment  $patientPayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(PatientPayment $patientPayment)
    {
        //
    }
}
