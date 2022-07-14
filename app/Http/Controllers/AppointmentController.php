<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Remuneration;
use App\Models\PatientPayment;
use App\Models\Inbox;
use App\Models\MedicalHistory;
use App\Models\Comission;
use App\Models\Issue;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAppointmentRequest;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Http\Requests\UpdateAppointmentRequest;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        //

        $doctor=Doctor::where('doctor_id',session('username'))->first();
        $appointments=Appointment::where('doctor_id',session('username'))->get();

        if($req->app_d!=""){

        $appointments=Appointment::where('doctor_id',session('username'))->whereDate('app_date',$req->app_d)->get();
        return view('Doctor.search_appointments')->with('doctor',$doctor)->with('appointments',$appointments);

        }

        return view('Doctor.search_appointments')->with('doctor',$doctor)->with('appointments',$appointments);




    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $appointments=Appointment::where('doctor_id',session('username'))->get();
        (new FastExcel($appointments))->export('appointments.xlsx');

        //return (new FastExcel($appointments))->headerStyle($header_style)->rowsStyle($rows_style)->download('appointments.xlsx');

        return (new FastExcel($appointments))->download('appointments '.session('username').'.xlsx');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAppointmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        //
        $doctor=Doctor::where('doctor_id',session('username'))->first();
        $appointments=Appointment::where('doctor_id',session('username'))->paginate(5);
        return view('Doctor.appointments')->with('doctor',$doctor)->with('appointments',$appointments);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    public function take_appointment(Request $req){

        $patient=Patient::where('patient_id',session('username'))->first();
        $t_a=Doctor::where('doctor_id',$req->d_id)->first();
        $rem=Remuneration::where('doctor_id',$req->d_id)->first();

        return view('Patient.take_appointment')->with('patient',$patient)
            ->with('t_a',$t_a)
            ->with('rem',$rem);

    }

    public function bookAppointment(Request $req){

        $req->validate([
            'app_date'=>'required|date',
            'app_time'=>'required'
        ]);


        //Checking if the time slot is available
        $app=Appointment::where('doctor_id',$req->d_id)->where('app_date',$req->app_date)->where('app_time',$req->app_time)->first();

        if(empty($app)){

            $problems=$req->problems;

            $app_id=$this->generateID_A();
            $inb_id=$this->generateID_I();
            $c_id=$this->generateID_C();
            $mh_id=$this->generateID_MH();
            $pp_id=$this->generateID_PP();

            $patient=Patient::where('patient_id',session('username'))->first();


            if($patient->membership_type=='Premium'){

                $appointment=new Appointment();
                $appointment->appointment_id=$app_id;
                $appointment->doctor_id=$req->d_id;
                $appointment->patient_id=session('username');
                $appointment->app_date=$req->app_date;
                $appointment->app_time=$req->app_time;
                $appointment->save();

                $com=new Comission();
                $com->commission_id=$c_id;
                $com->amount=str((int)$req->rm - (((int)$req->rm*95)/100));
                $com->purpose="Appointment Charge";
                $com->save();

                $inbox=new Inbox();
                $inbox->inbox_id=$inb_id;
                $inbox->appointment_id=$app_id;
                $inbox->doctor_id=$req->d_id;
                $inbox->patient_id=session('username');
                $inbox->save();

                $mh=new MedicalHistory();
                $mh->his_id=$mh_id;
                $mh->doctor_id=$req->d_id;
                $mh->patient_id=session('username');
                $mh->appointment_id=$app_id;
                $mh->save();

                $pp=new PatientPayment();
                $pp->payment_id=$pp_id;
                $pp->paid_amount=(int)$req->rm - (((int)$req->rm*5)/100);
                $pp->doctor_id=$req->d_id;
                $pp->patient_id=session('username');
                $pp->appointment_id=$app_id;
                $pp->save();

                foreach($problems as $prb){

                    $issue=new Issue();
                    $issue->his_id=$mh_id;
                    $issue->problems=$prb;
                    $issue->save();

                }

                return redirect()->route('docs');

            }else{

                $appointment=new Appointment();
                $appointment->appointment_id=$app_id;
                $appointment->doctor_id=$req->d_id;
                $appointment->patient_id=session('username');
                $appointment->app_date=$req->app_date;
                $appointment->app_time=$req->app_time;
                $appointment->save();

                $com=new Comission();
                $com->commission_id=$c_id;
                $com->amount=str((int)$req->rm_b - (((int)$req->rm_b*95)/100));
                $com->purpose="Appointment Charge";
                $com->save();

                $inbox=new Inbox();
                $inbox->inbox_id=$inb_id;
                $inbox->appointment_id=$app_id;
                $inbox->doctor_id=$req->d_id;
                $inbox->patient_id=session('username');
                $inbox->save();

                $mh=new MedicalHistory();
                $mh->his_id=$mh_id;
                $mh->doctor_id=$req->d_id;
                $mh->patient_id=session('username');
                $mh->appointment_id=$app_id;
                $mh->save();

                $pp=new PatientPayment();
                $pp->payment_id=$pp_id;
                $pp->paid_amount=(int)$req->rm_b - (((int)$req->rm_b*5)/100);
                $pp->doctor_id=$req->d_id;
                $pp->patient_id=session('username');
                $pp->appointment_id=$app_id;
                $pp->save();

                foreach($problems as $prb){

                    $issue=new Issue();
                    $issue->his_id=$mh_id;
                    $issue->problems=$prb;
                    $issue->save();

                }

                return redirect()->route('docs');


            }

        }else{

            return back()->withErrors(['This time slot is already taken! Try Another','']);
        }



    }

    public function generateID_A(){
        $app=Appointment::orderBy('appointment_id','desc')->first();

        if(empty($app)){

            return "A-1";
        }
        else{

            $rec=explode('-',$app->appointment_id);
            $new_id=(int)$rec[1];
            $updated_id=$new_id+1;

            return "A-".str($updated_id);

        }


    }

    public function checkSchedule(Request $req){

        $apps=Appointment::where('doctor_id',$req->id)->get();
        $doctor=Doctor::where('doctor_id',$req->id)->first();
        $patient=Patient::where('patient_id',session('username'))->first();

        return view('Patient.check_schedule')->with('patient',$patient)
            ->with('apps',$apps)
            ->with('doctor_name',$doctor->doctor_name);
    }

    public function generateID_C(){
        $com=Comission::orderBy('commission_id','desc')->first();

        if(empty($com)){

            return "CM-1";
        }
        else{

            $rec=explode('-',$com->commission_id);
            $new_id=(int)$rec[1];
            $updated_id=$new_id+1;

            return "CM-".str($updated_id);

        }


    }

    public function generateID_I(){
        $inb=Inbox::orderBy('inbox_id','desc')->first();

        if(empty($inb)){

            return "I-1";
        }
        else{

            $rec=explode('-',$inb->inbox_id);
            $new_id=(int)$rec[1];
            $updated_id=$new_id+1;

            return "I-".str($updated_id);

        }


    }

    public function generateID_MH(){
        $mh=MedicalHistory::orderBy('his_id','desc')->first();

        if(empty($mh)){

            return "H-1";
        }
        else{

            $rec=explode('-',$mh->his_id);
            $new_id=(int)$rec[1];
            $updated_id=$new_id+1;

            return "H-".str($updated_id);

        }

    }

    public function generateID_PP(){
        $p_p=PatientPayment::orderBy('payment_id','desc')->first();

        if(empty($p_p)){

            return "P-1";
        }
        else{

            $rec=explode('-',$p_p->payment_id);
            $new_id=(int)$rec[1];
            $updated_id=$new_id+1;

            return "P-".str($updated_id);

        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAppointmentRequest  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
