<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Report;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Inbox;
use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;
use Illuminate\Http\Request;

class ReportController extends Controller
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
        $inbox=Inbox::where('doctor_id',session('username'))->get();

        return view('Doctor.report')->with('doctor',$doctor)->with('inbox',$inbox);


    }

    public function ind(){

        $patient=Patient::where('patient_id',session('username'))->first();
        $inbox=Inbox::where('patient_id',session('username'))->get();

        return view('Patient.report')->with('patient',$patient)->with('inbox',$inbox);


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
            'against'=>'required',
            'reason'=>'required'
        ]);

        $report=new Report();
        $report->report_id=$this->generateID();
        $report->against=$req->against;
        $report->reason=$req->reason;
        $report->rep_by=session('username');
        $report->save();

        return back()->withErrors(['Activity Reported!','']);


    }

    public function cr(Request $req){

        $req->validate([
            'against'=>'required',
            'reason'=>'required'
        ]);

        $report=new Report();
        $report->report_id=$this->generateID();
        $report->against=$req->against;
        $report->reason=$req->reason;
        $report->rep_by=session('username');
        $report->save();

        return back()->withErrors(['Activity Reported!','']);

    }

    public function generateID(){
        $report=Report::orderBy('report_id','desc')->first();

        if(empty($report)){

            return "RP-1";
        }
        else{

            $rec=explode('-',$report->report_id);
            $new_id=(int)$rec[1];
            $updated_id=$new_id+1;

            return "RP-".str($updated_id);

        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReportRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
        $doctor=Doctor::where('doctor_id',session('username'))->first();
        $reports=Report::where('rep_by',session('username'))->get();

        return view('Doctor.previous_reports')->with('doctor',$doctor)->with('reports',$reports);

    }

    public function patientShow(Report $report)
    {
        //
        $patient=Patient::where('patient_id',session('username'))->first();
        $reports=Report::where('rep_by',session('username'))->get();

        return view('Patient.previous_reports')->with('patient',$patient)->with('reports',$reports);

    }

    public function adminShow(){

        $admin=Admin::where('admin_id',session('username'))->first();
        $reports=Report::all();

        return view('Admin.report')->with('admin',$admin)->with('reports',$reports);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReportRequest  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReportRequest $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        //
        $report=Report::where('report_id',$req->r_id)->first();
        $report->delete();
        return redirect()->route('prev_rep');
    }

    public function p_delete(Request $req){

        $report=Report::where('report_id',$req->r_id)->first();
        $report->delete();
        return redirect()->route('ck_rep');

    }
}
