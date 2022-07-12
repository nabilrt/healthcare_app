@extends('layouts.admin_dash')
@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
                <h5 class="card-header">Malicious Activity Reports</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead class="table-dark">
                        <tr>
                            <th>Against</th>
                            <th>Reason</th>
                            <th>Reported By</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @foreach ($reports as $rep)
                            <tr>
                                <td>{{ $rep->against }}</td>
                                <td>{{ $rep->reason }}</td>
                                <td>{{ $rep->rep_by }}</td>
                                <td><a href="/rD-{{ $rep->report_id }}" class="btn btn-sm btn-danger"><i class='bx bx-block'></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
