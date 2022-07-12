@extends('layouts.dash')
@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">Earnings $</h5>
            <div class="table-responsive text-nowrap">
              <table class="table">
                <thead class="table-primary">
                  <tr>
                    <th>Payment ID</th>
                    <th>Patient ID</th>
                    <th>Amount</th>
                    <th>Appointment ID</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($payments as $pay)
                  <tr>
                    <td>{{ $pay->payment_id }}</td>
                    <td>{{ $pay->patient_id }}</td>
                    <td>{{ $pay->paid_amount .'$' }}</td>
                    <td>{{ $pay->appointment_id }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table> <br>
              &nbsp;&nbsp;Total Earning : {{ $earned. '$' }} <br> <br>
              &nbsp;&nbsp;<a href="{{ route('ar') }}" class="btn btn-sm btn-primary"><i class='bx bxs-report' ></i></a> <br>
              {{ $payments->links() }} <br>

            </div><br>
          </div>
    </div>
</div>
@endsection
