@extends('layouts.admin_dash')
@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
                <h5 class="card-header">User Feedbacks</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead class="table-dark">
                        <tr>
                            <th>Review ID</th>
                            <th>Comment</th>
                            <th>Given By</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @foreach ($reviews as $rev)
                            <tr>
                                <td>{{ $rev->r_id }}</td>
                                <td>{{ $rev->comment }}</td>
                                <td>{{ $rev->given_by }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <br>
                    {{$reviews->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
