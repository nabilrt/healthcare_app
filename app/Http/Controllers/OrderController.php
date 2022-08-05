<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Order;
use App\Models\Seller;
use App\Models\Patient;
use App\Models\OrderDetail;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;
use PDF;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orders=Order::paginate(5);
        $seller=Seller::where('seller_id',session('username'))->first();
        return view('Seller.manage_orders')->with('orders',$orders)->with('seller',$seller);
    }

    public function getOrdersAPI(){

        return Order::all();
    }

    public function getOrderStatus(Request $req){
        $order=Order::where('order_id',$req->id)->first();

        return $order->status;
    }

    public function updateOrderAPI(Request $req){

        $order=Order::where('order_id',$req->id)->first();
        $order->status=$req->status;
        $order->save();

        return "Updated";

    }

    public function ind(){

        $orders=Order::where('user_id',session('username'))->get();
        $patient=Patient::where('patient_id',session('username'))->first();

        return view('Patient.order_history')->with('patient',$patient)->with('p_p',$orders);
    }

    public function showOrder(Request $req){

        $order=Order::where('order_id',$req->o_id)->first();
        $seller=Seller::where('seller_id',session('username'))->first();
        return view('Seller.update_order')->with('order',$order)->with('seller',$seller);

    }

    public function updateOrder(Request $req){

        if($req->order_status=="Cancelled"){

            $order=Order::where('order_id',$req->o_id)->first();
            $order->status=$req->order_status;
            $order->save();

            $items=OrderDetail::where('order_id',$req->o_id)->get();

            foreach($items as $item){

                $med=Medicine::where('medicine_id',$item->medicine_id)->first();
                $med->quantity=$med->quantity+$item->quantity;
                $med->save();
            }

            return redirect()->route('orders');

        }

        $order=Order::where('order_id',$req->o_id)->first();
        $order->status=$req->order_status;
        $order->save();

        return redirect()->route('orders');
    }

    public function showDetail(Request $req){

        $o_d=OrderDetail::where('order_id',$req->id)->get();
        $total=Order::where('order_id',$req->id)->first();
        $patient=Patient::where('patient_id',session('username'))->first();

        return view('Patient.show_order')->with('patient',$patient)
            ->with('o_d',$o_d)
            ->with('total',$total->total_price)
            ->with('o_id',$req->id);

    }

    public function p_cancelOrder(Request $req){

        $order=Order::where('order_id',$req->o_id)->first();
        $order->status="Cancelled";
        $order->save();

        $items=OrderDetail::where('order_id',$req->o_id)->get();

        foreach($items as $item){

            $med=Medicine::where('medicine_id',$item->medicine_id)->first();
            $med->quantity=$med->quantity+$item->quantity;
            $med->save();
        }

       // return $items;

       return redirect()->route('order_his');


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $orders=Order::all();
        (new FastExcel($orders))->export('order.xlsx');


        //return (new FastExcel($appointments))->headerStyle($header_style)->rowsStyle($rows_style)->download('appointments.xlsx');

        return (new FastExcel($orders))->download('orders '.session('username').'.xlsx');
    }

    public function earn()
    {
        $orders=Order::paginate(5);
        $seller=Seller::where('seller_id',session('username'))->first();
        $total_amount=Order::whereNot('status','Cancelled')->sum('total_price');
        return view('Seller.earnings')->with('orders',$orders)->with('total_amount',$total_amount)->with('seller',$seller);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
        $orders=Order::all();
        $amount=Order::sum('total_price');
        $seller=Seller::where('seller_id',session('username'))->first();


        $pdf = PDF::loadView('Seller.earn_report', compact('orders','amount','seller'));


            return $pdf->download('sale_report.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
