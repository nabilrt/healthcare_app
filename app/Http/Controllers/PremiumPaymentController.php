<?php

namespace App\Http\Controllers;

use App\Models\PremiumPayment;
use App\Models\PremiumCharge;
use App\Models\Patient;
use App\Http\Requests\StorePremiumPaymentRequest;
use App\Http\Requests\UpdatePremiumPaymentRequest;
use Illuminate\Http\Request;


class PremiumPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $patient=Patient::where('patient_id',session('username'))->first();
        $prem_member=PremiumPayment::where('patient_id',session('username'))->first();
        $charge=PremiumCharge::first();
        $amount=(int)$charge->charge - (((int)$charge->charge*(int)$charge->discount)/100);
        if($prem_member){

            return view('Patient.membership')->with('patient',$patient)->with('prem',$prem_member);
        }

        return view('Patient.membership_pay')->with('patient',$patient)->with('charge',$amount)->with('cr',$charge);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        //
        $req->validate([
            'amount'=>'required',
            'met'=>'required|alpha'
        ]);

        $p_p=new PremiumPayment();
        $p_p->p_id=$this->generateID();
        $p_p->amount=$req->amount;
        $p_p->patient_id=session('username');
        $p_p->method=$req->met;
        $p_p->paid_at=date('Y-m-d');
        $p_p->save();

        $patient=Patient::where('patient_id',session('username'))->first();
        $patient->membership_type="Premium";
        $patient->save();



        return redirect()->route('member');

    }

    public function generateID(){
        $p_p=PremiumPayment::orderBy('p_id','desc')->first();

        if(empty($p_p)){

            return "PY-1";
        }
        else{

            $rec=explode('-',$p_p->p_id);
            $new_id=(int)$rec[1];
            $updated_id=$new_id+1;

            return "PY-".str($updated_id);

        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePremiumPaymentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePremiumPaymentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PremiumPayment  $premiumPayment
     * @return \Illuminate\Http\Response
     */
    public function show(PremiumPayment $premiumPayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PremiumPayment  $premiumPayment
     * @return \Illuminate\Http\Response
     */
    public function edit(PremiumPayment $premiumPayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePremiumPaymentRequest  $request
     * @param  \App\Models\PremiumPayment  $premiumPayment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePremiumPaymentRequest $request, PremiumPayment $premiumPayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PremiumPayment  $premiumPayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(PremiumPayment $premiumPayment)
    {
        //
    }
}
