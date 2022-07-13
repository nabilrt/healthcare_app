<?php

namespace App\Http\Controllers;
use App\Mail\UnblockMail;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Seller;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    //
    public function index(){

        return view('homepage');

    }

    public function reg(){
        return view('who_reg');
    }

    public function login(){

        return view('login');
    }

    public function forgot(){

        return view('forgot_password');
    }

    public function aboutUs(){

        return view('about_us');
    }

    public function loginSubmit(Request $req) {

        $req->validate([
            'username'=>'required',
            'pass'=>'required'
        ]);

        $username = $req->username;
        $password = $req->pass;

        $doctorCount=0;
        $sellerCount=0;
        $adminCount=0;



        if(str_contains($username,'-')){

            $rec=explode('-',$username);

        }else{

            $rec="";
        }

        if(is_array($rec)){

            if($rec[1]=="D"){

                $doctor = Doctor::whereRaw("BINARY doctor_id = '$username'")->whereRaw("BINARY doctor_pass = '$password'")->first();


                if($doctor){

                    if($doctor->status=="Valid"){

                        $req->session()->put('username',$username);

                        if($req->remember){
                            setcookie('uname',$req->username, time()+20);
                            setcookie('pass',$req->pass, time()+20);

                            return redirect()->route('doc_dashboard');
                        }

                        return redirect()->route('doc_dashboard');

                    }else{

                        return back()->withErrors(['You have been blocked! Please Contact Support!', 'Cart is Empty!!']);


                    }



                }else{

                    $doctorCount++;

                    return back()->withErrors(['Invalid Login Credentials!! Please Try Again', 'Cart is Empty!!']);

                }

            }
            else if($rec[1]=="MS"){

                $seller = Seller::where('seller_id',$req->username)->where('seller_pass',$password)->first();

                if($seller) {



                        $req->session()->put('username', $username);

                        if ($req->remember) {
                            setcookie('uname', $req->username, time() + 20);
                            setcookie('pass', $req->pass, time() + 20);
                            return redirect()->route('s_dashboard');
                        }

                        return redirect()->route('s_dashboard');


                }else{

                    return back()->withErrors(['Invalid Login Credentials!! Please Try Again', 'Cart is Empty!!']);

                }



            }else if($rec[1]=="AD"){

                $admin = Admin::where('admin_id',$req->username)->where('admin_pass',$password)->first();

                if($admin){

                    $req->session()->put('username',$username);

                    if($req->remember){
                        setcookie('uname',$req->username, time()+20);
                        setcookie('pass',$req->pass, time()+20);
                        return redirect()->route('a_dashboard');
                    }

                    return redirect()->route('a_dashboard');

                }else{

                    $adminCount++;

                    return back()->withErrors(['Invalid Login Credentials!! Please Try Again', 'Cart is Empty!!']);

                }

            }else if ($rec[1]=="P"){

                $patient=Patient::where('patient_id',$req->username)->where('patient_pass',$password)->first();

                if($patient){

                    if($patient->status=="Valid"){

                        $req->session()->put('username',$username);

                        if($req->remember){
                            setcookie('uname',$req->username, time()+20);
                            setcookie('pass',$req->pass, time()+20);
                            return redirect()->route('p_dashboard');
                        }

                        return redirect()->route('p_dashboard');

                    }else{


                        return back()->withErrors(['You are blocked! Please Contact Support!', 'Cart is Empty!!']);

                    }
                    } else{

                        return back()->withErrors(['Invalid Login Credentials!! Please Try Again', 'Cart is Empty!!']);
                    }




            }

        }


        else{

            return back()->withErrors(['Invalid User!', 'Cart is Empty!!']);

        }



    }

    public function unblockForm(){

        return view('unblock_request');
    }

    public function unblockRequest(Request $req){

        $id=$req->id;

        $admin_email="nabil_rti@outlook.com";


        if(str_contains($id,'-')){

            $rec=explode('-',$id);

        }else{

            $rec="";
        }
        if(is_array($rec)){

            if($rec[1]=="D"){

                $doctor=Doctor::where('doctor_id',$id)->first();



                $data=array(
                    'name'=>$doctor->doctor_name,
                    'id'=>$doctor->doctor_id
                );


                Mail::to($admin_email)->send(new UnblockMail($data));

                return view('send_confirm');

            }
            else if($rec[1]=="P"){

                $patient=Patient::where('patient_id',$id)->first();

                $data=array(
                    'name'=>$patient->patient_name,
                    'id'=>$id
                );


                Mail::to($admin_email)->send(new UnblockMail($data));

                return view('send_confirm');


            }

        }


        return back()->withErrors(['Wrong ID Format! Try Again!','']);

    }

    public function logout() {

        session()->forget('username');
        return redirect()->route('login');

    }

    public function generateOTP(){

        $otp=rand(1000,5000);

        return $otp;


    }

    public function res_otp(){

        return view('reset_otp');
    }

    public function sendOTP(Request $req){

        $req->session()->put('u_id',$req->id);

        $id=$req->id;



        if(str_contains($id,'-')){

            $rec=explode('-',$id);

        }else{

            $rec="";
        }

        $otp=$this->generateOTP();

        //Cookie for 2 minutes
        setcookie('otp',$otp, time()+120000);


        if(is_array($rec)){

            if($rec[1]=="D"){

                $doctor=Doctor::where('doctor_id',session('u_id'))->first();

                if($doctor){

                    $data=array(
                        'otp'=>$otp,
                    );


                    Mail::to($doctor->doctor_email)->send(new ResetPassword($data));

                    return redirect()->route('reset_otp');
                }else{

                    session()->forget('u_id');
                    setcookie('otp','', time()-20);
                    return back()->withErrors(['Wrong ID!! Please Try Again', 'Cart is Empty!!']);
                }

            }else if ($rec[1]=="MS"){

                $seller=Seller::where('seller_id',session('u_id'))->first();

                if($seller){

                    $data=array(
                        'otp'=>$otp,
                    );


                    Mail::to($seller->seller_email)->send(new ResetPassword($data));

                    return redirect()->route('reset_otp');
                }else{

                    session()->forget('u_id');
                    setcookie('otp','', time()-20);
                    return back()->withErrors(['Wrong ID!! Please Try Again', 'Cart is Empty!!']);
                }

            }else if($rec[1]=="AD"){

                $admin=Admin::where('admin_id',session('u_id'))->first();

                if($admin){

                    $data=array(
                        'otp'=>$otp,
                    );


                    Mail::to($admin->admin_email)->send(new ResetPassword($data));

                    return redirect()->route('reset_otp');
                }else{

                    session()->forget('u_id');
                    setcookie('otp','', time()-20);
                    return back()->withErrors(['Wrong ID!! Please Try Again', 'Cart is Empty!!']);
                }

            }

        }

        else if(!is_array($rec)){
            return back()->withErrors(['Wrong ID Format!! Please Try Again', 'Cart is Empty!!']);
        }



    }

    public function res_pass(){

        return view('change_pass');
    }

    public function matchOTP(Request $req){

        if(isset($_COOKIE['otp'])){

            if($_COOKIE['otp']==$req->otp){

                return redirect()->route('reset_pass');
            }

            else{

                return back()->withErrors(['Wrong OTP!! Please Try Again', 'Cart is Empty!!']);
            }

        }

        return back()->withErrors(['OTP Expired! Try Again Resetting Password', 'Cart is Empty!!']);

    }

    public function changePass(Request $req){

        $user_id=$req->session()->get('u_id');

        $rec=explode('-',$user_id);

        if($rec[1]=="D"){

            $doctor=Doctor::where('doctor_id',$user_id)->first();
            $doctor->doctor_pass=$req->pass;
            $doctor->save();

            session()->forget('u_id');
            setcookie('otp','', time()-20);

            return redirect()->route('change_confirm');

        }else if($rec[1]=="MS"){

            $seller=Seller::where('seller_id',$user_id)->first();
            $seller->seller_pass=$req->pass;
            $seller->save();

            session()->forget('u_id');
            setcookie('otp','', time()-20);

            return redirect()->route('change_confirm');

        }

        return back()->withErrors(['Wrong ID!! Please Try Again', 'Cart is Empty!!']);

    }

    public function change_confirm(){

        return view('change_pass_confirm');
    }


}
