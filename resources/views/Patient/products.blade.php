@extends('layouts.patient_dash')
@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
                <h5 class="card-header">Pharmacy</h5>
                @if($errors->any())
                    <div class="alert alert-info alert-dismissible">
                        {{$errors->first()}}
                    </div>
                @endif
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead class="table-danger">
                        <tr>
                            <th>Medicine Name</th>
                            <th>Type</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @foreach ($medicines as $m)
                            <tr>
                                <td>{{ $m->medicine_name }}</td>
                                <td>{{ $m->medicine_type }}</td>
                                <td>{{ $m->quantity }}</td>
                                <td>{{ $m->medicine_price.'$' }}</td>
                                <td><a href="/patient/add_to_cart/{{ $m->medicine_id }}" class="btn btn-sm btn-outline-dark"><i class='bx bx-cart'></i></a></td>
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
