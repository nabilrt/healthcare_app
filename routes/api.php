<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthenticationAPI;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\PatientPaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login',[AuthenticationAPI::class,'login']);
Route::post('/logout',[AuthenticationAPI::class,'logout']);
Route::get('/userExist',[AuthenticationAPI::class,'userExistence']);
Route::post('/register/doctor',[AuthenticationAPI::class,'doc_register']);
Route::post('/user/verification',[AuthenticationAPI::class,'OTP_Verification']);
Route::post('/register/patient',[AuthenticationAPI::class,'patient_register']);
Route::post('/doctor/inbox',[InboxController::class,'apiInboxFetch']);
Route::get('/doctor/convo/{id}',[ConversationController::class,'getMessageAPIDoctor']);
Route::post('/doctor/convo/reply',[ConversationController::class,'replyMessageAPIDoctor']);
Route::post('/doctor/convo/message/new',[ConversationController::class,'newMessageAPIDoctor']);
Route::get('/doctor/appointment/finish/{id}',[InboxController::class,'finishAppointmentAPIDoctor']);
Route::post('/doctor/appointments',[AppointmentController::class,'getAllAppointments']);
Route::post('/doctor/appointment/search',[AppointmentController::class,'searchAppointment']);
Route::post('/doctor/earnings',[PatientPaymentController::class,'earningAPI']);

