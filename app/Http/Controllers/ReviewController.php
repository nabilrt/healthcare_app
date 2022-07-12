<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Patient;
use App\Models\Review;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;

class ReviewController extends Controller
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
        return view('Doctor.give_feedback')->with('doctor',$doctor);
    }

    public function ind(){

        $patient=Patient::where('patient_id',session('username'))->first();
        return view('Patient.give_feedback')->with('patient',$patient);
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
            'review'=>'required',

        ]);

        $review=new Review();
        $review->r_id=$this->generateID();
        $review->comment=$req->review;
        $review->given_by=session('username');
        $review->save();

        return redirect()->route('old_review');
    }

    public function p_create(Request $req){

        $req->validate([
            'review'=>'required',

        ]);

        $review=new Review();
        $review->r_id=$this->generateID();
        $review->comment=$req->review;
        $review->given_by=session('username');
        $review->save();

        return redirect()->route('old_fd');

    }

    public function old_fed(){
        $reviews=Review::where('given_by',session('username'))->get();
        $doctor=Doctor::where('doctor_id',session('username'))->first();
        return view('Doctor.old_feedbacks')->with('reviews',$reviews)->with('doctor',$doctor);
    }

    public function old_fedb(){
        $reviews=Review::where('given_by',session('username'))->get();
        $patient=Patient::where('patient_id',session('username'))->first();
        return view('Patient.previous_feedbacks')->with('reviews',$reviews)->with('patient',$patient);
    }

    public function generateID(){
        $review=Review::orderBy('r_id','desc')->first();

        if(empty($review)){

            return "R-1";
        }
        else{

            $rec=explode('-',$review->r_id);
            $new_id=(int)$rec[1];
            $updated_id=$new_id+1;

            return "R-".str($updated_id);

        }


     }

     public function delete(Request $req){
        $review = Review::where('r_id',$req->r_id)->first();
        $review->delete();
        return redirect()->route('old_review');
    }

    public function p_delete(Request $req){

        $review = Review::where('r_id',$req->r_id)->first();
        $review->delete();
        return redirect()->route('old_fd');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReviewRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReviewRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
        $review=Review::paginate(5);
        $admin=Admin::where('admin_id',session('username'))->first();
        return view('Admin.check_feedbacks')->with('admin',$admin)->with('reviews',$review);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReviewRequest  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReviewRequest $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
