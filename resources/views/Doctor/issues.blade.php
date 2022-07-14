@extends('layouts.dash')
@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">Issues</h5>
            <h6 >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Appointment No : {{ $appointment_id }}</h6>

            <h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Patient Name : {{ $patient->patient_name }} </h6>

            <br>


            <div style="padding-left: 20px">

                <h5>Problems</h5>

                @foreach($issues as $issue)
                    <li>{{ $issue->problems }}</li>
                @endforeach

                <br>




                <a href="{{ route('history') }}" class="btn btn-sm btn-primary">Go Back</a> <br> <br>

            </div>


        </div>

    </div>

</div>
@endsection
