@extends('layouts.admin_dash')
@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
                <h5 class="card-header">Manage Notices</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead class="table-success">
                        <tr>
                            <th>Notice For</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @foreach ($notices as $not)
                            <tr>
                                <td>{{ $not->notice_for }}</td>
                                <td>{{ $not->message }}</td>
                                <td><a href="/AN-{{ $not->notice_id }}" class="btn btn-sm btn-danger">Delete</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
