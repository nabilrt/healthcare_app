@extends('layouts.seller_dash')
@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">Manage Orders</h5>
            @if($errors->any())
            <div class="alert alert-info">
                {{$errors->first()}}
            </div>
            @endif
            <div class="table-responsive text-nowrap">
              <table class="table">
                <thead class="table-dark">
                  <tr>
                    <th>Ordered By</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($orders as $o)
                  <tr>
                    <td>{{ $o->user_id }}</td>
                    <td>{{ $o->total_price.'$' }}</td>
                    <td>{{ $o->status }}</td>
                    <td>{{ $o->order_date }}</td>
                      @if($o->status!="Cancelled")
                    <td><a href="/oC-{{ $o->order_id }}" class="btn btn-sm btn-dark"><i class='bx bx-up-arrow-circle'></i></a></td>
                      @else
                      <td></td>
                      @endif
                  </tr>
                  @endforeach
                </tbody>
              </table><br>
              &nbsp;&nbsp;&nbsp;<a href="{{ route('or') }}" class="btn btn-sm btn-success"><i class='bx bx-spreadsheet' ></i></a>
              <br>
              {{ $orders->links() }}
              <br>
            </div> <br>
          </div>
    </div>
</div>
@endsection
