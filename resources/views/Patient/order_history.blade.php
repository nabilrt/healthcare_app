@extends('layouts.patient_dash')
@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
                <h5 class="card-header">Order History</h5>
                <p class="mb-4" style="padding-left: 20px">Your Orders</p>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead class="table-primary">
                        <tr>
                            <th>Order ID</th>
                            <th>Status</th>
                            <th>Total Price</th>
                            <th>Order Date</th>
                            <th>Cancel</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @foreach ($p_p as $o)
                            <tr>
                                <td>{{ $o->order_id  }}</td>
                                @if($o->status=="Ordered")
                                <td><span class="badge bg-label-warning me-1">{{ $o->status }}</span></td>
                                @elseif($o->status=="Shipped")
                                    <td><span class="badge bg-label-info me-1">{{ $o->status }}</span></td>
                                @elseif($o->status=="Delivered")
                                    <td><span class="badge bg-label-success me-1">{{ $o->status }}</span></td>
                                @else
                                    <td><span class="badge bg-label-danger me-1">{{ $o->status }}</span></td>
                                @endif
                                <td>{{ $o->total_price. '$' }}</td>
                                <td>{{ $o->order_date }}</td>
                                @if($o->status=="Ordered")
                                <td><a href="/patient/orders/{{$o->order_id}}" class="btn-outline-danger btn-sm"><i class='bx bx-folder-minus' ></i></a></td>
                                @else
                                <td></td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table><br>
                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection
