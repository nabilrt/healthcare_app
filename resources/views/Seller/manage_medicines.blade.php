@extends('layouts.seller_dash')
@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">Manage Medicines</h5>
            @if($errors->any())
            <div class="alert alert-info">
                {{$errors->first()}}
            </div>
            @endif
            <div class="table-responsive text-nowrap">
              <table class="table">
                <thead class="table-primary">
                  <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($medicines as $m)
                  <tr>
                    <td>{{ $m->medicine_name }}</td>
                    <td>{{ $m->medicine_type }}</td>
                    <td>{{ $m->quantity }}</td>
                    <td>{{ $m->medicine_price }}</td>
                    <td><a href="/seller/med/show/{{ $m->medicine_id }}" class="btn btn-sm btn-warning"><i class='bx bxs-edit-alt' ></i></a></td>
                    <td><a href="/seller/med/delete/{{ $m->medicine_id }}" class="btn btn-sm btn-danger"><i class='bx bx-block' ></i></a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table><br>
              {{ $medicines->links() }}
              <br>
            </div> <br>
          </div>
    </div>
</div>
@endsection
