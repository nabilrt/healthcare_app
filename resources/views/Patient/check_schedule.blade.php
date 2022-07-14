@extends('layouts.patient_dash')
@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
                <h5 class="card-header">Schedule of Dr.{{ $doctor_name }}</h5>
                <div style="padding-left: 20px">
                    <p>Please check the time to avoid time clash</p> <br>
                </div>

                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead class="table-primary">
                        <tr>
                            <th>Appointment ID</th>
                            <th>Date</th>
                            <th>Time</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @foreach ($apps as $app)
                            <tr>
                                <td>{{ $app->appointment_id }}</td>
                                <td>{{ $app->app_date }}</td>
                                <td>{{ $app->app_time }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <br>
                    <div style="padding-left: 20px">
                        <a href="{{route('docs')}}" class="btn btn-outline-dark btn-sm 2" ><i class='bx bx-arrow-back'></i></a>
                        <br>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection
