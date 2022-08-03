<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthenticationAPI;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\MedicalHistoryController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PatientPaymentController;
use App\Http\Controllers\RemunerationController;
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
Route::post('/userExist',[AuthenticationAPI::class,'userExistence']);
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
Route::post('/doctor/payment/profile',[RemunerationController::class,'paymentSetupDoctor']);
Route::post('/doctor/payment/profile/create',[RemunerationController::class,'paySetupDoctor']);
Route::post('/doctor/medical/histories',[MedicalHistoryController::class,'getMedHistAPI']);
Route::get('/doctor/medical/history/{id}',[IssueController::class,'getMedIssuesAPI']);
Route::post('/doctor/profile',[DoctorController::class,'getProfileDetails']);
Route::post('/doctor/profile/update',[DoctorController::class,'updateProfileDetails']);
Route::post('/doctor/notices',[NoticeController::class,'getDocNotices']);
Route::post('/patient/profile',[PatientController::class,'getProfileDetails']);
Route::post('/patient/profile/update',[PatientController::class,'updateProfileDetails']);
Route::post('/patient/inbox',[InboxController::class,'apiInboxFetchPatient']);
Route::get('/patient/convo/{id}',[ConversationController::class,'getMessageAPIPatient']);
Route::post('/patient/convo/reply',[ConversationController::class,'replyMessageAPIPatient']);
Route::post('/patient/convo/message/new',[ConversationController::class,'newMessageAPIPatient']);
Route::post('/patient/notices',[NoticeController::class,'getPatientNotices']);
Route::post('/patient/doctors/normal',[RemunerationController::class,'normalDoctor']);
Route::post('/patient/doctors/all',[RemunerationController::class,'allDoctor']);
Route::post('/patient/status',[RemunerationController::class,'patientStatus']);








