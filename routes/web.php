<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\RemunerationController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\PatientPaymentController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\MedicalHistoryController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PremiumChargeController;
use App\Http\Controllers\ComissionController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PremiumPaymentController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Common Pages
Route::get('/',[PageController::class,'index'])->name('home');
Route::get('/who_registers',[PageController::class,'reg'])->name('w_r');
Route::get('/login',[PageController::class,'login'])->name('login');
Route::post('/loginSubmit',[PageController::class,'loginSubmit'])->name('loginSubmitted');
Route::get('/logout',[PageController::class,'logout'])->name('logout');
Route::get('/forgot_pass',[PageController::class,'forgot'])->name('forgot');
Route::post('/send_otp',[PageController::class,'sendOTP'])->name('send_otp')->middleware('AccessRequest');
Route::get('/reset_otp',[PageController::class,'res_otp'])->name('reset_otp')->middleware('AccessRequest');
Route::get('/reset_pass',[PageController::class,'res_pass'])->name('reset_pass')->middleware('AccessRequest');
Route::post('/reset',[PageController::class,'matchOTP'])->name('matchOTP')->middleware('AccessRequest');
Route::post('/rs',[PageController::class,'changePass'])->name('changePass')->middleware('AccessRequest');
Route::get('/conf',[PageController::class,'change_confirm'])->name('change_confirm')->middleware('AccessRequest');
Route::get('/unblock_req',[PageController::class,'unblockForm'])->name('unblock_re');
Route::post('/unblock_req',[PageController::class,'unblockRequest'])->name('send_m');
Route::get('/about_us',[PageController::class,'aboutUs'])->name('about_Us');


//Doctor Pages
Route::get('/register',[DoctorController::class,'index'])->name('register');
Route::post('/registerSubmitted',[DoctorController::class,'create'])->name('registerSubmitted');
Route::get('/d_dashboard',[DoctorController::class,'dashboard'])->name('doc_dashboard')->middleware('ValidDoctor');
Route::get('/profile',[DoctorController::class,'loadProfile'])->name('profile')->middleware('ValidDoctor');
Route::post('/profile',[DoctorController::class,'updateProfile'])->name('profileUpdate')->middleware('ValidDoctor');
Route::get('/payment',[RemunerationController::class,'index'])->name('pay_setup')->middleware('ValidDoctor');
Route::post('/payment',[RemunerationController::class,'create'])->name('setup_pay')->middleware('ValidDoctor');
Route::post('/edit_payment',[RemunerationController::class,'update_rm'])->name('edit_pay')->middleware('ValidDoctor');
Route::get('/inbox',[InboxController::class,'index'])->name('inbox')->middleware('ValidDoctor');
Route::get('/p-{i_id}',[ConversationController::class,'index'])->name('goConversation')->middleware('ValidDoctor');
Route::get('/pC-{c_id}',[ConversationController::class,'replyMessage'])->name('goReply')->middleware('ValidDoctor');
Route::post('/reply',[ConversationController::class,'reply'])->name('reply_msg')->middleware('ValidDoctor');
Route::get('/pN-{i_id}',[ConversationController::class,'createMessage'])->name('goConv')->middleware('ValidDoctor');
Route::post('/sends',[ConversationController::class,'create'])->name('sender')->middleware('ValidDoctor');
Route::get('/pID-{i_id}',[InboxController::class,'finish'])->name('finish')->middleware('ValidDoctor');
Route::get('/earning',[PatientPaymentController::class,'index'])->name('earning')->middleware('ValidDoctor');
Route::get('/appointments',[AppointmentController::class,'store'])->name('appointments')->middleware('ValidDoctor');
Route::get('/search_a',[AppointmentController::class,'index'])->name('search_a')->middleware('ValidDoctor');
Route::get('/med_history',[MedicalHistoryController::class,'index'])->name('history')->middleware('ValidDoctor');
Route::get('/pH-{h_id}',[IssueController::class,'index'])->name('issue')->middleware('ValidDoctor');
Route::get('/review',[ReviewController::class,'index'])->name('review')->middleware('ValidDoctor');
Route::post('/review',[ReviewController::class,'create'])->name('reviews')->middleware('ValidDoctor');
Route::get('/old_review',[ReviewController::class,'old_fed'])->name('old_review')->middleware('ValidDoctor');
Route::get('/pD-{r_id}',[ReviewController::class,'delete'])->name('removeReview')->middleware('ValidDoctor');
Route::get('/appointment',[AppointmentController::class,'create'])->name('cr')->middleware('ValidDoctor');
Route::get('/earn',[DoctorController::class,'dpdf'])->name('ar')->middleware('ValidDoctor');
Route::get('/pM-{id}',[DoctorController::class,'pres'])->name('pr')->middleware('ValidDoctor');
Route::post('/send',[DoctorController::class,'sendMail'])->name('send')->middleware('ValidDoctor');
Route::get('/doc_notices',[NoticeController::class,'doctorNotices'])->name('doc_notice')->middleware('ValidDoctor');
Route::get('/report_activity',[ReportController::class,'index'])->name('rep_ac')->middleware('ValidDoctor');
Route::post('/report_activity',[ReportController::class,'create'])->name('rep')->middleware('ValidDoctor');
Route::get('/previous_reports',[ReportController::class,'show'])->name('prev_rep')->middleware('ValidDoctor');
Route::get('/rD-{r_id}',[ReportController::class,'destroy'])->name('delete_rep')->middleware('ValidDoctor');

//Seller Pages
Route::get('/s_dashboard',[SellerController::class,'dashboard'])->name('s_dashboard')->middleware('ValidSeller');
Route::get('/s_profile',[SellerController::class,'loadProfile'])->name('s_profile')->middleware('ValidSeller');
Route::post('/s_profile',[SellerController::class,'updateProfile'])->name('s_profileUpdate')->middleware('ValidSeller');
Route::get('/add_medicine',[MedicineController::class,'add'])->name('add_medicine')->middleware('ValidSeller');
Route::post('/add_medicine',[MedicineController::class,'create'])->name('add_med')->middleware('ValidSeller');
Route::get('/manage_meds',[MedicineController::class,'index'])->name('manage_med')->middleware('ValidSeller');
Route::get('/mC-{m_id}',[MedicineController::class,'showMed'])->middleware('ValidSeller');
Route::post('/med',[MedicineController::class,'updateMed'])->name('update_med')->middleware('ValidSeller');
Route::get('/aR-{m_id}',[MedicineController::class,'deleteMed'])->middleware('ValidSeller');
Route::get('/search',[MedicineController::class,'store'])->name('search')->middleware('ValidSeller');
Route::get('/orders',[OrderController::class,'index'])->name('orders')->middleware('ValidSeller');
Route::get('/oC-{o_id}',[OrderController::class,'showOrder'])->middleware('ValidSeller');
Route::post('/order_update',[OrderController::class,'updateOrder'])->name('order')->middleware('ValidSeller');
Route::get('/order',[OrderController::class,'create'])->name('or')->middleware('ValidSeller');
Route::get('/earnings',[OrderController::class,'earn'])->name('earn')->middleware('ValidSeller');
Route::get('/oD-{o_id}',[OrderDetailController::class,'index'])->middleware('ValidSeller');
Route::get('/report',[OrderController::class,'show'])->name('report')->middleware('ValidSeller');
Route::get('s_notices',[NoticeController::class,'sellerNotices'])->name('s_notice')->middleware('ValidSeller');

//Admin Pages
Route::get('/admin/dashboard',[AdminController::class,'index'])->name('a_dashboard')->middleware('ValidAdmin');
Route::get('/admin/profile',[AdminController::class,'loadProfile'])->name('a_profile')->middleware('ValidAdmin');
Route::post('/admin/profile',[AdminController::class,'updateProfile'])->name('a_profileUpdate')->middleware('ValidAdmin');
Route::get('/admin/membership',[PremiumChargeController::class,'index'])->name('memb')->middleware('ValidAdmin');
Route::post('/admin/membership',[PremiumChargeController::class,'update_c'])->name('membership')->middleware('ValidAdmin');
Route::get('/admin/user_feedbacks',[ReviewController::class,'show'])->name('feedbacks')->middleware('ValidAdmin');
Route::get('/admin/earnings',[ComissionController::class,'index'])->name('tot_earn')->middleware('ValidAdmin');
Route::get('/admin/post_notice',[NoticeController::class,'index'])->name('notice')->middleware('ValidAdmin');
Route::post('/admin/post_notice',[NoticeController::class,'create'])->name('add_not')->middleware('ValidAdmin');
Route::get('/admin/manage_notices',[NoticeController::class,'show'])->name('manage_notices')->middleware('ValidAdmin');
Route::get('/admin/create_expense',[ExpenseController::class,'index'])->name('create_exp')->middleware('ValidAdmin');
Route::post('/admin/create_expense',[ExpenseController::class,'create'])->name('add_exp')->middleware('ValidAdmin');
Route::get('/admin/manage_expenses',[ExpenseController::class,'show'])->name('manage_expenses')->middleware('ValidAdmin');
Route::get('/admin/expense/edit/{c_id}',[ExpenseController::class,'edit'])->name('ed_ex')->middleware('ValidAdmin');
Route::post('/admin/expense/update_exp',[ExpenseController::class,'update'])->name('edit_exp')->middleware('ValidAdmin');
Route::get('/admin/expense/delete/{e_id}',[ExpenseController::class,'destroy'])->name('del_ex')->middleware('ValidAdmin');
Route::get('/admin/patient/valid',[AdminController::class,'validPatients'])->name('ma_pa')->middleware('ValidAdmin');
Route::get('/admin/block/patient/{p_id}',[AdminController::class,'blockPatient'])->name('block_patient')->middleware('ValidAdmin');
Route::post('/admin/block/patient/send_remark',[AdminController::class,'blockUser'])->name('send_remark')->middleware('ValidAdmin');
Route::get('/admin/patient/blocked',[AdminController::class,'blockedPatients'])->name('bl_pa')->middleware('ValidAdmin');
Route::get('/admin/unblock/patient/{p_id}',[AdminController::class,'unblockPatient'])->name('unblock')->middleware('ValidAdmin');
Route::get('/admin/doctors/valid',[AdminController::class,'validDoctors'])->name('ma_doc')->middleware('ValidAdmin');
Route::get('/admin/block/doctor/{d_id}',[AdminController::class,'blockDoctor'])->name('block_doctor')->middleware('ValidAdmin');
Route::post('/admin/block/doctor/send_remark',[AdminController::class,'block_doc'])->name('send_r')->middleware('ValidAdmin');
Route::get('/admin/doctor/blocked',[AdminController::class,'blockedDoctors'])->name('bl_doc')->middleware('ValidAdmin');
Route::get('/admin/unblock/doctor/{d_id}',[AdminController::class,'unblockDoctor'])->name('unblock_doctor')->middleware('ValidAdmin');
Route::get('/admin/malicious_reports',[ReportController::class,'adminShow'])->name('malicious_activities')->middleware('ValidAdmin');

//Patient Pages
Route::get('/patient/register',[PatientController::class,'index'])->name('p_register');
Route::post('/patient/register',[PatientController::class,'create'])->name('registerSub');
Route::get('/patient/dashboard',[PatientController::class,'dashboard'])->name('p_dashboard');
Route::get('/patient/profile',[PatientController::class,'loadProfile'])->name('p_profile');
Route::post('/patient/profile',[PatientController::class,'updateProfile'])->name('p_profileUpdate');
Route::get('/patient/notices',[NoticeController::class,'patientNotices'])->name('p_notice');
Route::get('/patient/feedback',[ReviewController::class,'ind'])->name('cr_fd');
Route::post('/patient/feedback',[ReviewController::class,'p_create'])->name('p_reviews');
Route::get('/patient/feedback/previous',[ReviewController::class,'old_fedb'])->name('old_fd');
Route::get('/patient/review/delete/{r_id}',[ReviewController::class,'p_delete'])->name('fd_dlt');
Route::get('/patient/report',[ReportController::class,'ind'])->name('rep_act');
Route::post('/patient/report',[ReportController::class,'cr'])->name('rep_doc');
Route::get('/patient/report/previous',[ReportController::class,'patientShow'])->name('ck_rep');
Route::get('/patient/report/delete/{r_id}',[ReportController::class,'p_delete'])->name('dlt_rep');
Route::get('/patient/membership',[PremiumPaymentController::class,'index'])->name('member');
Route::post('/patient/membership',[PremiumPaymentController::class,'create'])->name('setup_membership');
Route::get('/patient/doctors',[RemunerationController::class,'show'])->name('docs');
Route::get('/patient/take_appointment/{d_id}',[AppointmentController::class,'take_appointment'])->name('take');
Route::post('/patient/take_appointment',[AppointmentController::class,'bookAppointment'])->name('create_app');
Route::get('/patient/inbox',[InboxController::class,'ind'])->name('p_inbox');
Route::get('/patient/inbox/{i_id}',[ConversationController::class,'ind'])->name('s_m');
Route::get('/patient/new_message/{i_id}',[ConversationController::class,'p_createMessage'])->name('p_cm');
Route::post('/patient/send_message',[ConversationController::class,'p_create'])->name('p_sender');
Route::get('/patient/reply/{c_id}',[ConversationController::class,'p_replyMessage'])->name('p_rm');
Route::post('/patient/reply_message',[ConversationController::class,'p_reply'])->name('reply_msg_p');
Route::get('/patient/med_shop',[MedicineController::class,'ind'])->name('med_shop');
Route::get('/patient/add_to_cart/{id}',[CartController::class,'addToCart'])->name('a_cart');
Route::get('/patient/cart', [CartController::class,'index'])->name('cart');
Route::post('/patient/checkout', [CartController::class,'show'])->name('checkout');
Route::get('/patient/cart/{u_id}',[CartController::class,'emptyCart'])->name('p');
Route::get('/patient/med_search',[MedicineController::class,'p_store'])->name('p_search');
Route::get('/patient/order_history',[OrderController::class,'ind'])->name('order_his');
Route::get('/patient/orders/{id}',[OrderController::class,'showDetail'])->name('s_d');
Route::post('/patient/cancel_order',[OrderController::class,'p_cancelOrder'])->name('cancel_ord');
Route::get('/doctors/schedule/{id}',[AppointmentController::class,'checkSchedule'])->name('check_schedule');

