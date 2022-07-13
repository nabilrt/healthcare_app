@extends('layouts.patient_dash')
@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
                <h5 class="card-header">Cart</h5>
                @if($errors->any())
                    <div class="alert alert-info alert-dismissible">
                        {{$errors->first()}}
                    </div>
                @endif
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead class="table-dark">
                        <tr>
                            <th>Medicine ID</th>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Total Price</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @foreach($carts as $cart)
                            <tr>
                                <td >{{ $cart->medicine_id }}</td>
                                <td >{{ $cart->item_name }}</td>
                                <td >{{ $cart->item_quantity }}</td>
                                <td >{{ $cart->unit_price.'$' }}</td>
                                <td >{{ $cart->total_price.'$' }}</td>
                                <td></td>
                            </tr>
                        @endforeach
                            <tr>
                                <td></td><td></td><td></td><td></td><td>Grand Total</td>
                                <td>{{ $amount.'$' }}</td>
                            </tr>

                        </tbody>
                    </table><br>
                    <form action="{{ route('checkout') }}" method="post">
                        @csrf
                        <input type="hidden" name="status" value="Ordered">
                        <div style="padding-left: 20px">

                            <input type="submit" value="Checkout" class="btn btn-outline-dark btn-sm ">
                            <a href="/patient/cart/{{ session('username') }}" class="btn btn-outline-primary btn-sm"><i class='bx bxs-cart-download' ></i></a> <br>

                        </div>

                    </form>
                    <br>
                </div> <br>
            </div>
        </div>
    </div>
@endsection
