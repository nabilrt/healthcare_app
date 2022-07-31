<?php

namespace App\Http\Controllers;

use App\Mail\ResetPassword;
use App\Mail\UserVerification;
use App\Models\Admin;
use App\Models\Doctor;
use App\Models\OTP;
use App\Models\Patient;
use App\Models\Seller;
use App\Models\Token;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthenticationAPI extends Controller
{
    //
    public function login(Request $req){

        $username = $req->username;
        $password = $req->password;

        $rec=explode('-',$username);

        if($rec[1]=="D"){

            $doctor = Doctor::whereRaw("BINARY doctor_id = '$username'")->whereRaw("BINARY doctor_pass = '$password'")->first();
            if($doctor){

                $api_token = Str::random(64);
                $token = new Token();
                $token->user_id = $doctor->doctor_id;
                $token->token = $api_token;
                $token->token_for="Doctor";
                $token->created_at = new DateTime();
                $token->save();
                return $token;

            }
        }
        else if($rec[1]=="P"){

            $patient=Patient::where('patient_id',$req->username)->where('patient_pass',$password)->first();
            if($patient){

                $api_token = Str::random(64);
                $token = new Token();
                $token->user_id = $patient->patient_id;
                $token->token = $api_token;
                $token->token_for="Patient";
                $token->created_at = new DateTime();
                $token->save();
                return $token;

            }
        }
        else if($rec[1]=="MS"){
            $seller = Seller::where('seller_id',$req->username)->where('seller_pass',$password)->first();
            if($seller){

                $api_token = Str::random(64);
                $token = new Token();
                $token->user_id = $seller->seller_id;
                $token->token = $api_token;
                $token->token_for="Seller";
                $token->created_at = new DateTime();
                $token->save();
                return $token;

            }
        }
        else if($rec[1]=="AD"){
            $admin = Admin::where('admin_id',$req->username)->where('admin_pass',$password)->first();
            if($admin){

                $api_token = Str::random(64);
                $token = new Token();
                $token->user_id = $admin->admin_id;
                $token->token = $api_token;
                $token->token_for="Admin";
                $token->created_at = new DateTime();
                $token->save();
                return $token;

            }

        }

        return "No User Found";

    }

    public function logout(){

        $activeUser=Token::where('expired_at',NULL)->first();
        $activeUser->expired_at=new DateTime();
        $activeUser->save();

        return "Success";

    }

    public function userExistence(){

        $activeUser=Token::where('expired_at',NULL)->first();
        if($activeUser && $activeUser->token_for=="Doctor"){
            return "Doctor";
        }else if($activeUser && $activeUser->token_for=="Patient"){
            return "Patient";
        }
        else if($activeUser && $activeUser->token_for=="Seller"){
            return "Seller";
        }
        else if($activeUser && $activeUser->token_for=="Admin"){
            return "Admin";
        }
        return "No";
    }

    public function doc_register(Request $req){

        $otp =rand(1000,5000);
        setcookie('otp',$otp, time()+120000);
        $u_id=$this->generateID();
        $data=array(
            'otp'=>$otp,
            'u_id'=>$u_id,
        );

        $otps=new OTP();
        $otps->otp=$otp;
        $otps->user_id=$u_id;
        $otps->created_on=new DateTime();
        $otps->save();



        Mail::to($req->email)->send(new UserVerification($data));



        $doctor=new Doctor();
        $doctor->doctor_id = $u_id;
        $doctor->doctor_name=$req->name;
        $doctor->doctor_email=$req->email;
        $doctor->doctor_pass=$req->pass;
        $doctor->doctor_gender=$req->gender;
        $doctor->doctor_dp="DP";
        $doctor->doctor_degree="AA";
        $doctor->doctor_type=$req->type;
        $doctor->doctor_specialty=$req->speciality;
        $doctor->status="Valid";
        $doctor->save();

        return "Registered";


    }

    public function OTP_Verification(Request $req){

        $otp = $req->otp;
        $data = OTP::where('otp', $otp)->where('expired', NULL)->first();
        if($data){
            OTP::where('otp', $data->otp)->update(['expired' => "yes"]);
            return $data;
        }
        return "Otp Invalid";


    }

    public function generateID(){

        $doctor=Doctor::orderBy('doctor_id','desc')->first();
        if(empty($doctor)){
            $Doctor_ID="ASHCS-D-1";
            return $Doctor_ID;
        }else{
            $rec=explode('-',$doctor->doctor_id);
            $new_id=(int)$rec[2];
            $updated_id=$new_id+1;

            $Doctor_ID="ASHCS-D-".str($updated_id);

            return $Doctor_ID;
        }

    }
}
