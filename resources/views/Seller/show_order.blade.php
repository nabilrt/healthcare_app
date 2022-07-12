@extends('layouts.seller_dash')
@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">Order Details</h5>
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
              &nbsp;&nbsp;&nbsp;<a href="{{ route('earn') }}" class="btn btn-sm btn-dark">Go Back</a> <br>
              <br>
            </div> <br>
          </div>
    </div>
</div>
@endsection
