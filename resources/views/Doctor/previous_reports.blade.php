@extends('layouts.dash')
@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
                <h5 class="card-header">Your Previous Reports</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead class="table-success">
                        <tr>
                            <th>Report ID</th>
                            <th>Against</th>
                            <th>Reason</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @foreach ($reports as $rep)
                            <tr>
                                <td>{{ $rep->report_id }}</td>
                                <td>{{ $rep->against }}</td>
                                <td>{{ $rep->reason }}</td>
                                <td><a href="/doctor/report/delete/{{ $rep->report_id }}" class="btn btn-sm btn-danger"><i class='bx bx-block'></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
