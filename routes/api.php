<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthenticationAPI;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\MedicalHistoryController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PatientPaymentController;
use App\Http\Controllers\PremiumPaymentController;
use App\Http\Controllers\RemunerationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SellerController;
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
Route::post('/doctor/inbox',[InboxController::class,'apiInboxFetch'])->middleware("APIAuthentication");
Route::get('/doctor/convo/{id}',[ConversationController::class,'getMessageAPIDoctor'])->middleware("APIAuthentication");
Route::post('/doctor/convo/reply',[ConversationController::class,'replyMessageAPIDoctor'])->middleware("APIAuthentication");
Route::post('/doctor/convo/message/new',[ConversationController::class,'newMessageAPIDoctor'])->middleware("APIAuthentication");
Route::get('/doctor/appointment/finish/{id}',[InboxController::class,'finishAppointmentAPIDoctor'])->middleware("APIAuthentication");
Route::post('/doctor/appointments',[AppointmentController::class,'getAllAppointments'])->middleware("APIAuthentication");
Route::post('/doctor/appointment/search',[AppointmentController::class,'searchAppointment'])->middleware("APIAuthentication");
Route::post('/doctor/earnings',[PatientPaymentController::class,'earningAPI'])->middleware("APIAuthentication");
Route::post('/doctor/payment/profile',[RemunerationController::class,'paymentSetupDoctor'])->middleware("APIAuthentication");
Route::post('/doctor/payment/profile/create',[RemunerationController::class,'paySetupDoctor'])->middleware("APIAuthentication");
Route::post('/doctor/medical/histories',[MedicalHistoryController::class,'getMedHistAPI'])->middleware("APIAuthentication");
Route::get('/doctor/medical/history/{id}',[IssueController::class,'getMedIssuesAPI'])->middleware("APIAuthentication");
Route::post('/doctor/profile',[DoctorController::class,'getProfileDetails'])->middleware("APIAuthentication");
Route::post('/doctor/profile/update',[DoctorController::class,'updateProfileDetails'])->middleware("APIAuthentication");
Route::post('/doctor/notices',[NoticeController::class,'getDocNotices'])->middleware("APIAuthentication");
Route::post('/patient/profile',[PatientController::class,'getProfileDetails'])->middleware("APIAuthentication");
Route::post('/patient/profile/update',[PatientController::class,'updateProfileDetails'])->middleware("APIAuthentication");
Route::post('/patient/inbox',[InboxController::class,'apiInboxFetchPatient'])->middleware("APIAuthentication");
Route::get('/patient/convo/{id}',[ConversationController::class,'getMessageAPIPatient'])->middleware("APIAuthentication");
Route::post('/patient/convo/reply',[ConversationController::class,'replyMessageAPIPatient'])->middleware("APIAuthentication");
Route::post('/patient/convo/message/new',[ConversationController::class,'newMessageAPIPatient'])->middleware("APIAuthentication");
Route::post('/patient/notices',[NoticeController::class,'getPatientNotices'])->middleware("APIAuthentication");
Route::post('/patient/doctors/normal',[RemunerationController::class,'normalDoctor'])->middleware("APIAuthentication");
Route::post('/patient/doctors/all',[RemunerationController::class,'allDoctor'])->middleware("APIAuthentication");
Route::post('/patient/status',[RemunerationController::class,'patientStatus'])->middleware("APIAuthentication");
Route::post('/patient/review/post',[ReviewController::class,'patientReviewAPI'])->middleware("APIAuthentication");
Route::post('/patient/review/all',[ReviewController::class,'allPatientReview'])->middleware("APIAuthentication");
Route::post('/doctor/review/post',[ReviewController::class,'doctorReviewAPI'])->middleware("APIAuthentication");
Route::post('/doctor/review/all',[ReviewController::class,'allDoctorReview'])->middleware("APIAuthentication");
Route::post('/seller/profile',[SellerController::class,'getProfileDetails'])->middleware("APIAuthentication");
Route::post('/seller/profile/update',[SellerController::class,'updateProfileDetails'])->middleware("APIAuthentication");
Route::post('/seller/notices',[NoticeController::class,'getSellerNotices'])->middleware("APIAuthentication");
Route::post('/seller/earnings',[OrderController::class,'getOrdersAPI'])->middleware("APIAuthentication");
Route::get('/seller/order/{id}',[OrderDetailController::class,'getOrderDetailsAPI'])->middleware("APIAuthentication");
Route::get('/seller/order/details/{id}',[OrderController::class,'getOrderStatus'])->middleware("APIAuthentication");
Route::post('/seller/order/update',[OrderController::class,'updateOrderAPI'])->middleware("APIAuthentication");
Route::post('/seller/medicine/add',[MedicineController::class,'addMedicineAPI'])->middleware("APIAuthentication");
Route::post('/seller/medicines/all',[MedicineController::class,'allMedicinesAPI'])->middleware("APIAuthentication");
Route::get('/seller/medicine/details/{id}',[MedicineController::class,'getMedicineQuantity'])->middleware("APIAuthentication");
Route::post('/seller/medicine/update',[MedicineController::class,'updateMedicineQuantity'])->middleware("APIAuthentication");
Route::get('/seller/medicine/delete/{id}',[MedicineController::class,'deleteMedicineAPI'])->middleware("APIAuthentication");
Route::get('/seller/medicine/search/{id}',[MedicineController::class,'searchMedicineAPI'])->middleware("APIAuthentication");
Route::post('/admin/profile',[AdminController::class,'getProfileDetails'])->middleware("APIAuthentication");
Route::post('/admin/profile/update',[AdminController::class,'updateProfileDetails'])->middleware("APIAuthentication");
Route::post('/admin/notice/add',[NoticeController::class,'createNoticeAPI'])->middleware("APIAuthentication");
Route::post('/admin/notices',[NoticeController::class,'fetchNoticesAPI'])->middleware("APIAuthentication");
Route::get('/admin/notice/delete/{id}',[NoticeController::class,'deleteNoticeAPI'])->middleware("APIAuthentication");
Route::post('/admin/expense/add',[ExpenseController::class,'addExpenseAPI'])->middleware("APIAuthentication");
Route::post('/admin/expenses',[ExpenseController::class,'fetchExpensesAPI'])->middleware("APIAuthentication");
Route::get('/admin/expense/delete/{id}',[ExpenseController::class,'deleteExpenseAPI'])->middleware("APIAuthentication");
Route::get('/admin/expense/edit/{id}',[ExpenseController::class,'fetchExpense'])->middleware("APIAuthentication");
Route::post('/admin/expense/update',[ExpenseController::class,'updateExpenseAPI'])->middleware("APIAuthentication");
Route::post('/admin/doctors',[DoctorController::class,'allDoctors'])->middleware("APIAuthentication");
Route::post('/admin/doctors/blocked',[DoctorController::class,'blockedDoctors'])->middleware("APIAuthentication");
Route::post('/admin/doctor/block/remark',[DoctorController::class,'blockDoctor'])->middleware("APIAuthentication");
Route::get('/admin/doctor/unblock/{id}',[DoctorController::class,'unblockDoctor'])->middleware("APIAuthentication");
Route::post('/admin/patients',[PatientController::class,'allPatients'])->middleware("APIAuthentication");
Route::post('/admin/patients/blocked',[PatientController::class,'blockedPatients'])->middleware("APIAuthentication");
Route::post('/admin/patient/block/remark',[PatientController::class,'blockPatient'])->middleware("APIAuthentication");
Route::get('/admin/patient/unblock/{id}',[PatientController::class,'unblockPatient'])->middleware("APIAuthentication");
Route::post('/contact/user',[PageController::class,'unblockRequestAPI'])->middleware("APIAuthentication");
Route::get('/patient/doctors/schedule/{id}',[AppointmentController::class,'docScheduleAPI'])->middleware("APIAuthentication");
Route::post('/patient/membership/pay',[PremiumPaymentController::class,'MembershipAPI'])->middleware("APIAuthentication");
Route::post('/patient/appointment/take',[AppointmentController::class,'takeAppointmentAPI'])->middleware("APIAuthentication");
Route::post('/patient/medicine/add',[CartController::class,'addToCartAPI'])->middleware("APIAuthentication");
Route::post('/patient/cart/all',[CartController::class,'allItemsAPI'])->middleware("APIAuthentication");
Route::post('/patient/cart/checkout',[CartController::class,'checkout'])->middleware("APIAuthentication");
Route::post('/patient/cart/empty',[CartController::class,'emptyCartAPI'])->middleware("APIAuthentication");
Route::post('/patient/orders',[OrderController::class,'patientOrdersAPI'])->middleware("APIAuthentication");








