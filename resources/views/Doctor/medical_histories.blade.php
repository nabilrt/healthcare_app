@extends('layouts.dash')
@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">Medical Histories</h5>
            <div class="table-responsive text-nowrap">
              <table class="table">
                <thead class="table-danger">
                  <tr>
                    <th>History ID</th>
                    <th>Issues</th>
                    <th>Patient ID</th>
                    <th>Appointment ID</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($medhist as $med)
                  <tr>
                    <td>{{ $med->his_id }}</td>
                    <td><a href="/doctor/patient/issues/{{ $med->his_id }}" class="btn btn-sm btn-info">Check Issues</a></td>
                    <td>{{ $med->patient_id }}</td>
                    <td>{{ $med->appointment_id }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table> <br>
            </div>
          </div>
    </div>
</div>
@endsection
