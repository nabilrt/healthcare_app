@extends('layouts.dash')
@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">Inbox</h5>
            <div class="table-responsive text-nowrap">
              <table class="table">
                <thead class="table-dark">
                  <tr>
                    <th>Inbox ID</th>
                    <th>Patient ID</th>
                    <th>Appointment ID</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($inboxes as $inbox)
                  <tr>
                    <td>{{ $inbox->inbox_id }}</td>
                    <td>{{ $inbox->patient_id }}</td>
                    <td>{{ $inbox->appointment_id }}</td>
                    <td><a href="/doctor/inbox/{{ $inbox->inbox_id }}" class="btn btn-sm btn-primary"><i class='bx bx-message-rounded-dots' ></i></a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
    </div>
</div>
@endsection
