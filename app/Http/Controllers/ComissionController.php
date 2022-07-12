<?php

namespace App\Http\Controllers;

use App\Models\Comission;
use App\Models\PremiumPayment;
use App\Models\Admin;
use App\Http\Requests\StoreComissionRequest;
use App\Http\Requests\UpdateComissionRequest;

class ComissionController extends Controller
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
        $p_p=PremiumPayment::paginate(5);
        $amount_pp=PremiumPayment::sum('amount');
        $amount_c=Comission::sum('amount');
        $com=Comission::paginate(5);
        $earn=(int)$amount_pp+(int)$amount_c;
        return view('Admin.earnings')->with('admin',$admin)->with('p_p',$p_p)->with('com',$com)->with('earn',$earn);
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
     * @param  \App\Http\Requests\StoreComissionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComissionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comission  $comission
     * @return \Illuminate\Http\Response
     */
    public function show(Comission $comission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comission  $comission
     * @return \Illuminate\Http\Response
     */
    public function edit(Comission $comission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateComissionRequest  $request
     * @param  \App\Models\Comission  $comission
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateComissionRequest $request, Comission $comission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comission  $comission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comission $comission)
    {
        //
    }
}
