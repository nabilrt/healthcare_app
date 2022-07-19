@extends('layouts.patient_dash')
@section('content')


    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Layout Demo -->
            <div class="row">
                <!-- Basic -->
                <div class="col-md-12">
                    <div class="card mb-12">
                        <h5 class="card-header">Search Medicine <i class='bx bx-search-alt-2' ></i></h5>
                        <form action="{{ route('p_search') }}" method="GET">
                            @csrf
                            <div class="card-body demo-vertical-spacing demo-only-element">
                                <div class="mb-6">
                                    <label for="type" class="form-label">Type</label>
                                    <select id="med_type" class="form-select" name="med_type">
                                        <option value="">Choose An Option</option>
                                        <option value="Tablet">Tablet</option>
                                        <option value="Injection">Injection</option>
                                        <option value="Capsule">Capsule</option>
                                        <option value="Saline">Saline</option>
                                        <option value="Dispencer">Dispencer</option>
                                        <option value="Syrup">Syrup</option>
                                    </select>
                                </div>
                                <div class="mb-6">
                                    <label for="unit_price" class="form-label">Medicine Name</label>
                                    <input type="text" name="name" id="" class="form-control">
                                </div>
                                <input type="submit" value="Find" class="btn btn-info me-2">
                            </div>

                        </form> <br>

                        <div class="table-responsive text-nowrap">
                            @if($medicines->isNotEmpty())
                                <table class="table">
                                    <thead class="table-info">
                                    <tr>
                                        <th>Medicine ID</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">

                                    @foreach ($medicines as $p)
                                        <tr>
                                            <td>{{ $p->medicine_id }}</td>
                                            <td>{{ $p->medicine_name }}</td>
                                            <td>{{ $p->medicine_type }}</td>
                                            <td>{{ $p->medicine_price }}</td>
                                            <td>{{ $p->quantity }}</td>
                                            <td><a href="/patient/add_to_cart/{{ $p->medicine_id }}" class="btn btn-sm btn-outline-dark"><i class='bx bx-cart'></i></a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table> <br>
                            @else
                                <div>
                                    <h6 class="card-header">No Medicine Found</h6>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
            <!--/ Layout Demo -->
        </div>
@endsection
