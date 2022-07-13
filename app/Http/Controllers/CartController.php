<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Medicine;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Comission;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Models\Patient;
use Illuminate\Http\Request;
use PDF;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $carts=Cart::all();
        $amount=Cart::sum('total_price');
        $patient=Patient::where('patient_id',session('username'))->first();
        return view('Patient.cart')->with('carts',$carts)->with('amount',$amount)->with('patient',$patient);

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

    public function addToCart(Request $req)
    {
        $cart=Cart::where('medicine_id',$req->id)->first();
        $med=Medicine::where('medicine_id',$req->id)->first();

        $name="";

        if(session('username')!=""){

            $name=session('username');

        }

        if($cart){
            $m=Medicine::where('medicine_id',$cart->medicine_id)->first();
            $med_q=$m->quantity;
            if((int)$cart->item_quantity <= $med_q){

                $q=(int)$cart->item_quantity;
                $q=$q+1;
                $cart->item_quantity=str($q);
                $cart->total_price=str(((int)$med->medicine_price)*$q);
                $med->quantity=$med->quantity-1;
                $med->save();
                $cart->save();

            }else{

                return back()->withErrors(['Item is Stocked Out!', 'Cart is Empty!!']);


            }

        }else{
            $m=Medicine::where('medicine_id',$req->id)->first();
            $med_q=$m->quantity;
            if($med_q!=0){

                $newItem=new Cart();
                $newItem->medicine_id=$req->id;
                $newItem->item_name=$med->medicine_name;
                $newItem->item_quantity="1";
                $newItem->unit_price=$med->medicine_price;
                $newItem->total_price=$med->medicine_price;
                $med->quantity=$med->quantity-1;
                $newItem->user_id=$name;
                $med->save();
                $newItem->save();

            }
            else{

                return back()->withErrors(['Item is Stocked Out!', 'Cart is Empty!!']);


            }

        }

        return back()->withErrors(['Added to Cart Successfully!', 'Added to Cart Successfully!']);

    }

    public function generateID(){

        $order=Order::orderBy('order_id','desc')->first();

        if(empty($order)){

            return "O-1";
        }else{

            $rec=explode('-',$order->order_id);
            $new_id=(int)$rec[1];
            $updated_id=$new_id+1;

            return "O-".str($updated_id);

        }


    }

    public function show(Request $req)
    {
        //
        $items=Cart::all();
        $it=Cart::first();
        $tot=Cart::sum('total_price');

        $o_id=$this->generateID();




        if($it){

            $order=new Order();
            $order->order_id=$o_id;
            $order->user_id=session('username');
            $order->total_price=((int)$tot-(((int)$tot*5)/100));
            $order->status=$req->status;
            $order->order_date=date('Y-m-d');
            $order->save();

            foreach ($items as $item){
                $o_d=new OrderDetail();
                $o_d->order_id=$o_id;
                $o_d->medicine_id=$item->medicine_id;
                $o_d->quantity=$item->item_quantity;
                $o_d->unit_price=$item->unit_price;
                $o_d->total_price=$item->total_price;
                $o_d->save();
            }

            foreach ($items as $item){
                $med=Medicine::where('medicine_id',$item->medicine_id)->first();
                $med->quantity=$med->quantity-((int)$item->item_quantity);
                $med->save();
            }

            $com=new Comission();
            $com->commission_id=$this->generateID_C();
            $com->amount=((int)$tot-(((int)$tot*95)/100));
            $com->purpose="Medicine Vat";
            $com->save();



            $amount=Cart::sum('total_price');

            $patient=Patient::where('patient_id',session('username'))->first();

            if($patient->membership_type=="Premium"){

                $discount="10";
                $after_discount=(int)$amount-((int)$amount*(int)$discount)/100;

                $pdf = PDF::loadView('Patient.invoice', compact('items','amount','after_discount','discount','patient'));

                Cart::where('user_id',session('username'))->delete();

                return $pdf->download('invoice.pdf');
            }

            $discount="0";
            $after_discount=(int)$amount-((int)$amount*(int)$discount)/100;

            $pdf = PDF::loadView('Patient.invoice', compact('items','amount','after_discount','discount','patient'));

            Cart::where('user_id',session('username'))->delete();

            return $pdf->download('invoice.pdf');


            // return back()->withErrors(['Order Successful!!', 'Cart is Empty!!']);






        }else if(!$it){

            return back()->withErrors(['Cart is Empty!!', 'Cart is Empty!!']);

        }




    }

    public function generateID_C(){

        $com=Comission::orderBy('commission_id','desc')->first();

        if(empty($com)){

            return "CM-1";
        }
        else{

            $rec=explode('-',$com->commission_id);
            $new_id=(int)$rec[1];
            $updated_id=$new_id+2;

            return "CM-".str($updated_id);

        }


    }

    public function emptyCart(Request $req)
    {
        $items=Cart::where('user_id',$req->u_id)->get();

        foreach ($items as $item){
            $med=Medicine::where('medicine_id',$item->medicine_id)->first();
            $med->quantity=$med->quantity+((int)$item->item_quantity);
            $med->save();
        }

        Cart::where('user_id',$req->u_id)->delete();

        return back()->withErrors(['Items removed successfully', 'Cart is Empty!!']);




    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCartRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCartRequest  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
