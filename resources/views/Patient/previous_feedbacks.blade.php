@extends('layouts.patient_dash')
@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
                <h5 class="card-header">Your Previous Feedbacks</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead class="table-success">
                        <tr>
                            <th>Review ID</th>
                            <th>Comment</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @foreach ($reviews as $rev)
                            <tr>
                                <td>{{ $rev->r_id }}</td>
                                <td>{{ $rev->comment }}</td>
                                <td><a href="/patient/review/delete/{{ $rev->r_id }}" class="btn btn-sm btn-danger">Delete Feedback</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
