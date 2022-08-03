<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Doctor;
use App\Models\Inbox;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Requests\StoreConversationRequest;
use App\Http\Requests\UpdateConversationRequest;

class ConversationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        //
        $conversations=Conversation::where('inbox_id',$req->i_id)->paginate(3);
        $doctor=Doctor::where('doctor_id',session('username'))->first();
        $patient=Inbox::where('inbox_id',$req->i_id)->first();
        $patient_n=Patient::where('patient_id',$patient->patient_id)->first();

        return view('Doctor.conversations')->with('doctor',$doctor)->with('conversations',$conversations)->with('name',$patient_n->patient_name)->with('i_id',$req->i_id);



    }

    public function ind(Request $req){

        $conversations=Conversation::where('inbox_id',$req->i_id)->paginate(5);
        $patient=Patient::where('patient_id',session('username'))->first();
        $doctor=Inbox::where('inbox_id',$req->i_id)->first();
        $doctor_n=Doctor::where('doctor_id',$doctor->doctor_id)->first();

        return view('Patient.conversations')->with('patient',$patient)->with('conversations',$conversations)->with('name',$doctor_n->doctor_name)->with('i_id',$req->i_id);


    }

    public function createMessage(Request $req){

        $inbox=Inbox::where('inbox_id',$req->i_id)->first();
        $doctor=Doctor::where('doctor_id',session('username'))->first();
        return view('Doctor.new_message')->with('inbox',$inbox)->with('i_id',$req->i_id)->with('doctor',$doctor);

     }

     public function p_createMessage(Request $req){

         $inbox=Inbox::where('inbox_id',$req->i_id)->first();
         $patient=Patient::where('patient_id',session('username'))->first();
         return view('Patient.new_message')->with('inbox',$inbox)->with('i_id',$req->i_id)->with('patient',$patient);


     }

    public function replyMessage(Request $req){

        $conversation=Conversation::where('conv_id',$req->c_id)->first();
        $doctor=Doctor::where('doctor_id',session('username'))->first();
        return view('Doctor.reply_message')->with('conversation',$conversation)->with('c_id',$req->c_id)->with('doctor',$doctor);

     }

     public function p_replyMessage(Request $req){

         $conversation=Conversation::where('conv_id',$req->c_id)->first();
         $patient=Patient::where('patient_id',session('username'))->first();
         return view('Patient.reply_message')->with('conversation',$conversation)->with('c_id',$req->c_id)->with('patient',$patient);
     }

     public function reply(Request $req){

        $conversation=Conversation::where('conv_id',$req->c_id)->first();
        $conversation->conv_id=$req->c_id;
        $conversation->inbox_id=$req->i_id;
        $conversation->doctor_id=$req->d_id;
        $conversation->patient_id=$req->p_id;
        $conversation->message=$req->msg;
        $conversation->reply=$req->reply;
        $conversation->save();

        return redirect('/doctor/inbox/'.$req->i_id);

     }

     public function getMessageAPIDoctor(Request $req){

         return Conversation::where('inbox_id',$req->id)->get();

     }
    public function getMessageAPIPatient(Request $req){

        return Conversation::where('inbox_id',$req->id)->get();

    }

     public function replyMessageAPIDoctor(Request $req){

        $conversation=Conversation::where('conv_id',$req->c_id)->first();
        $conversation->reply=$req->reply;
        $conversation->save();
        return "Replied";
     }
    public function replyMessageAPIPatient(Request $req){

        $conversation=Conversation::where('conv_id',$req->c_id)->first();
        $conversation->reply=$req->reply;
        $conversation->save();
        return "Replied";
    }

     public function p_reply(Request $req){

         $conversation=Conversation::where('conv_id',$req->c_id)->first();
         $conversation->conv_id=$req->c_id;
         $conversation->inbox_id=$req->i_id;
         $conversation->doctor_id=$req->d_id;
         $conversation->patient_id=$req->p_id;
         $conversation->message=$req->msg;
         $conversation->reply=$req->reply;
         $conversation->save();

         return redirect('/patient/inbox/'.$req->i_id);
     }

     public function newMessageAPIDoctor(Request $req){

        $inb=Inbox::where('inbox_id',$req->i_id)->first();
        $conv=new Conversation();
        $conv->conv_id="C-".rand(11,1000);
        $conv->inbox_id=$req->i_id;
        $conv->patient_id=$inb->patient_id;
        $conv->doctor_id=$inb->doctor_id;
        $conv->message=$req->msg;
        $conv->reply="";
        $conv->save();

        return "Sent";

     }
    public function newMessageAPIPatient(Request $req){

        $inb=Inbox::where('inbox_id',$req->i_id)->first();
        $conv=new Conversation();
        $conv->conv_id="C-".rand(11,1000);
        $conv->inbox_id=$req->i_id;
        $conv->patient_id=$inb->patient_id;
        $conv->doctor_id=$inb->doctor_id;
        $conv->message=$req->msg;
        $conv->reply="";
        $conv->save();

        return "Sent";

    }

     public function generateID(){

        $conv=Conversation::orderBy('conv_id','desc')->first();
        if(empty($conv)){
            $Conv_ID="C-1";
            return $Conv_ID;
        }else{
            $rec=explode('-',$conv->conv_id);
            $new_id=(int)$rec[1];
            $updated_id=$new_id+1;

            $Conv_ID="C-".str($updated_id);

            return $Conv_ID;
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        //
        $c_id=$this->generateID();
        $conversation=new Conversation();
        $conversation->conv_id=$c_id;
        $conversation->inbox_id=$req->i_id;
        $conversation->doctor_id=$req->d_id;
        $conversation->patient_id=$req->p_id;
        $conversation->message=$req->msg;
        $conversation->reply="";
        $conversation->save();

        return redirect('/doctor/inbox/'.$req->i_id);

    }

    public function p_create(Request $req){

        $c_id=$this->generateID();
        $conversation=new Conversation();
        $conversation->conv_id=$c_id;
        $conversation->inbox_id=$req->i_id;
        $conversation->doctor_id=$req->d_id;
        $conversation->patient_id=$req->p_id;
        $conversation->message=$req->msg;
        $conversation->reply="";
        $conversation->save();

        return redirect('/patient/inbox/'.$req->i_id);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreConversationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreConversationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Conversation  $conversation
     * @return \Illuminate\Http\Response
     */
    public function show(Conversation $conversation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Conversation  $conversation
     * @return \Illuminate\Http\Response
     */
    public function edit(Conversation $conversation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateConversationRequest  $request
     * @param  \App\Models\Conversation  $conversation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateConversationRequest $request, Conversation $conversation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Conversation  $conversation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conversation $conversation)
    {
        //
    }
}
