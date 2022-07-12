@extends('layouts.seller_dash')
@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">Earnings $</h5>
            <div class="table-responsive text-nowrap">
              <table class="table">
                <thead class="table-secondary">
                  <tr>
                    <th>Order ID</th>
                    <th>Ordered By</th>
                    <th>Order Details</th>
                    <th>Total Amount</th>
                    <th>Date</th>
                      <th>Status</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($orders as $o)
                  <tr>
                    <td>{{ $o->order_id }}</td>
                    <td>{{ $o->user_id  }}</td>
                    <td><a href="/oD-{{ $o->order_id }}" class="btn btn-sm btn-info"><i class='bx bx-info-square' ></i></a></td>
                    <td>{{ $o->total_price .'$' }}</td>
                    <td>{{ $o->order_date }}</td>
                      <td>{{ $o->status }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table><br>
              <h6>&nbsp;&nbsp;&nbsp;Total Earning : {{ $total_amount . "$" }}</h6> <br>
              &nbsp;&nbsp;&nbsp;<a href="{{ route('report') }}" class="btn btn-sm btn-secondary"><i class='bx bxs-report' ></i></a>
              <br>
              {{ $orders->links() }}
              <br>
            </div> <br>
          </div>
    </div>
</div>
@endsection
