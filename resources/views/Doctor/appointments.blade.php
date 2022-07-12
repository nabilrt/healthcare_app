@extends('layouts.dash')
@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">All Appointments</h5>
            <div class="table-responsive text-nowrap">
              <table class="table">
                <thead class="table-info">
                  <tr>
                    <th>Appointment ID</th>
                    <th>Patient ID</th>
                    <th>Date</th>
                    <th>Time</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($appointments as $app)
                  <tr>
                    <td>{{ $app->appointment_id }}</td>
                    <td>{{ $app->patient_id }}</td>
                    <td>{{ $app->app_date }}</td>
                    <td>{{ $app->app_time }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table><br>
              {{ $appointments->links() }}
              <br>
              &nbsp;&nbsp;&nbsp;<a href="{{ route('cr') }}" class="btn btn-sm btn-success"><i class='bx bxs-spreadsheet' ></i></a> <br>
            </div> <br>
          </div>
    </div>
</div>
@endsection
