<?php

namespace App\Http\Controllers;

use App\Models\PremiumCharge;
use App\Models\Admin;
use App\Http\Requests\StorePremiumChargeRequest;
use App\Http\Requests\UpdatePremiumChargeRequest;
use Illuminate\Http\Request;

class PremiumChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $admin=Admin::where('admin_id',session('username'))->first();
        $p_c=PremiumCharge::where('c_id','C-1')->first();
        return view('Admin.membership')->with('admin',$admin)->with('p_c',$p_c);

    }

    public function getCharge(){

        return PremiumCharge::all();
    }

    public function update_c(Request $req)
    {
        $req->validate([
            'amount'=>'required|numeric',
            'disc_per'=>'required|integer',
        ]);

        $charge=PremiumCharge::where('c_id',$req->c_id)->first();
        $charge->charge=$req->amount;
        $charge->discount=$req->disc_per;
        $charge->save();

        return redirect()->route('memb');
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
     * @param  \App\Http\Requests\StorePremiumChargeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePremiumChargeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PremiumCharge  $premiumCharge
     * @return \Illuminate\Http\Response
     */
    public function show(PremiumCharge $premiumCharge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PremiumCharge  $premiumCharge
     * @return \Illuminate\Http\Response
     */
    public function edit(PremiumCharge $premiumCharge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePremiumChargeRequest  $request
     * @param  \App\Models\PremiumCharge  $premiumCharge
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePremiumChargeRequest $request, PremiumCharge $premiumCharge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PremiumCharge  $premiumCharge
     * @return \Illuminate\Http\Response
     */
    public function destroy(PremiumCharge $premiumCharge)
    {
        //
    }
}
