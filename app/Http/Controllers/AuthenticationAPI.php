<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Seller;
use App\Models\Token;
use DateTime;
use Illuminate\Http\Request;
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
}
