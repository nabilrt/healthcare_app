@extends('layouts.dash')
@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-12">
            <h5 class="card-header">Search Appointments</h5>
            <div class="row">
                <form action="{{ route('search_a') }}" method="GET">
                    @csrf
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <div class="col-md-6">
                    <label for="" class="form-label">Date</label>
                    <input type="date" name="app_d" class="form-control"> <br>
                        </div>
                    <input type="submit" value="Find" class="btn btn-sm btn-primary">
                    </div>
                </form>
                </div>



 <br>
            <div class="table-responsive text-nowrap">
                @if($appointments->isNotEmpty())
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
              </table> <br>
            </div>
              @else
    <div>
        <h6 class="card-header">No Appointment Found</h6>
    </div>
@endif
            </div>
          </div>
    </div>
</div>
@endsection
