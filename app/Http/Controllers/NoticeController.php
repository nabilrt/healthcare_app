<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Seller;
use App\Http\Requests\StoreNoticeRequest;
use App\Http\Requests\UpdateNoticeRequest;
use Illuminate\Http\Request;

class NoticeController extends Controller
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
        return view('Admin.create_notice')->with('admin',$admin);
    }

    public function getDocNotices(Request $req){

        return Notice::where('notice_for',"Doctor")->get();

    }
    public function getPatientNotices(Request $req){

        return Notice::where('notice_for',"Patient")->get();

    }
    public function getSellerNotices(Request $req){

        return Notice::where('notice_for',"Seller")->get();

    }

    public function doctorNotices(){

        $doctor=Doctor::where('doctor_id',session('username'))->first();
        $notices=Notice::where('notice_for','Doctor')->get();

        return view('Doctor.notices')->with('doctor',$doctor)->with('notices',$notices);
    }

    public function sellerNotices(){

        $seller=Seller::where('seller_id',session('username'))->first();
        $notices=Notice::where('notice_for','Seller')->get();

        return view('Seller.notices')->with('seller',$seller)->with('notices',$notices);
    }

    public function patientNotices(){

        $patient=Patient::where('patient_id',session('username'))->first();
        $notices=Notice::where('notice_for','Patient')->get();

        return view('Patient.notices')->with('patient',$patient)->with('notices',$notices);
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
           'n_f'=>'required|alpha',
           'notice'=>'required'
        ]);

        $notice=new Notice();
        $notice->notice_id=$this->generateID();
        $notice->notice_for=$req->n_f;
        $notice->message=$req->notice;
        $notice->save();

        return back()->withErrors(['Notice Posted Successfully','']);


    }

    public function generateID(){
        $notice=Notice::orderBy('notice_id','desc')->first();

        if(empty($notice)){

            return "N-1";
        }
        else{

            $rec=explode('-',$notice->notice_id);
            $new_id=(int)$rec[1];
            $updated_id=$new_id+1;

            return "N-".str($updated_id);

        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNoticeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $req)
    {
        //
        $notice=Notice::where('notice_id',$req->n_id)->first();
        $notice->delete();
        return redirect()->route('manage_notices');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function show(Notice $notice)
    {
        $admin=Admin::where('admin_id',session('username'))->first();
        $notices=Notice::all();
        return view('Admin.manage_notices')->with('notices',$notices)->with('admin',$admin);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function edit(Notice $notice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNoticeRequest  $request
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNoticeRequest $request, Notice $notice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notice $notice)
    {
        //
    }
}
