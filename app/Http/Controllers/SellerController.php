<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use App\Models\Order;
use App\Models\Medicine;
use App\Models\OrderDetail;
use App\Http\Requests\StoreSellerRequest;
use App\Http\Requests\UpdateSellerRequest;
use App\Models\Token;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    public function getProfileDetails(Request $req){

        $userActive=Token::where('token',$req->token)->first();
        return Seller::where('seller_id',$userActive->user_id)->first();
    }

    public function updateProfileDetails(Request $req){
        $userActive=Token::where('token',$req->token)->first();
        $seller=Seller::where('seller_id',$userActive->user_id)->first();
        $seller->seller_name=$req->name;
        $seller->seller_email=$req->email;
        $seller->seller_pass=$req->pass;
        $seller->save();

        return "Saved";

    }

    public function dashboard(){

        $earn=Order::whereNot('status','Cancelled')->sum('total_price');
        $med=Medicine::count('medicine_id');
        $quant=OrderDetail::sum('quantity');

        $seller=Seller::where('seller_id',session('username'))->first();
        return view('Seller.dashboard')->with('seller',$seller)
        ->with('quantity',$quant)
        ->with('earn',$earn)
        ->with('med',$med);
    }

    public function loadProfile(Request $req) {

        $seller=Seller::where('seller_id',session('username'))->first();

        return view('Seller.profile')->with('seller',$seller);


    }

    public function updateProfile(Request $req) {

        $req->validate([
            'password'=>'required|max:15|alpha_num',
            'email'=>'required|email:rfc',
            'name'=>'required',
            'dp'=>'required|mimes:jpg,png'

        ]);

        $seller=Seller::where('seller_id',$req->s_id)->first();
        $seller->seller_name=$req->name;
        $seller->seller_email=$req->email;
        $seller->seller_dp=$req->dp->hashName();
        $req->dp->store('dp', 'public');
        $seller->seller_pass=$req->password;
        $seller->save();

        return redirect()->route('s_profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSellerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSellerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function show(Seller $seller)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function edit(Seller $seller)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSellerRequest  $request
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSellerRequest $request, Seller $seller)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seller $seller)
    {
        //
    }
}
