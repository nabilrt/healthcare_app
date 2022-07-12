@extends('layouts.admin_dash')
@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
                <h5 class="card-header">Blocked Patient List</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead class="table-danger">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Membership</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @foreach ($patients as $pat)
                            <tr>
                                <td>{{ $pat->patient_id }}</td>
                                <td>{{ $pat->patient_name }}</td>
                                <td>{{ $pat->patient_gender }}</td>
                                <td>{{ $pat->membership_type }}</td>
                                <td><span class="badge bg-label-danger me-1">{{$pat->status}}</span></td>
                                <td><a href="/pU-{{ $pat->patient_id }}" class="btn btn-sm btn-success"><i class='bx bx-check' ></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <br>
                <br>
            </div>
        </div>
    </div>
@endsection
