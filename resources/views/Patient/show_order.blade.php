@extends('layouts.patient_dash')
@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
                <h5 class="card-header">Order Details</h5>
                <div style="padding-left: 20px">
                    <p class="mb-4">Are you sure to cancel this order?</p>
                </div>

                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead class="table-warning">
                        <tr>
                            <th>Medicine ID</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Total Price</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @foreach ($o_d as $p)
                            <tr>
                                <td>{{ $p->medicine_id }}</td>
                                <td>{{ $p->quantity }}</td>
                                <td>{{ $p->unit_price ."$" }}</td>
                                <td>{{ $p->total_price ."$" }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table><br>
                    <h6>&nbsp;&nbsp;&nbsp;Total Amount : {{ $total ."$" }}</h6> <br>
                    <form action="{{ route('cancel_ord') }}" method="post">
                        @csrf
                        <input type="hidden" name="o_id" value="{{$o_id}}">
                        <div style="padding-left: 20px">
                            <input type="submit" value="Cancel Order" class="btn-outline-danger btn-sm">
                            <a href="{{ route('order_his') }}" class="btn btn-sm btn-outline-dark"><i class='bx bx-arrow-back'></i></a>
                        </div>

                    </form>
                    &nbsp;&nbsp;&nbsp; <br>
                    <br>
                </div> <br>
            </div>
        </div>
    </div>
@endsection
