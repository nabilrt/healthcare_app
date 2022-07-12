@extends('layouts.dash')
@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
                <h5 class="card-header">Notices from Admin</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead class="table-primary">
                        <tr>
                            <th>Notice ID</th>
                            <th>Message</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @foreach ($notices as $not)
                            <tr>
                                <td>{{ $not->notice_id }}</td>
                                <td>{{ $not->message }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
