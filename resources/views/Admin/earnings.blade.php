@extends('layouts.admin_dash')
@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
                <h5 class="card-header">Earnings $</h5>
                <p class="mb-4" style="padding-left: 20px">Premium Membership Payments</p>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead class="table-primary">
                        <tr>
                            <th>User ID</th>
                            <th>Amount</th>
                            <th>Payment Method</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @foreach ($p_p as $o)
                            <tr>
                                <td>{{ $o->patient_id  }}</td>
                                <td>{{ $o->amount. '$' }}</td>
                                <td>{{ $o->method }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table><br>
                    {{ $p_p->links() }}
                    <br>
                </div> <br>
                <p class="mb-4" style="padding-left: 20px">Commissions</p>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead class="table-secondary">
                        <tr>
                            <th>Purpose</th>
                            <th>Amount</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @foreach ($com as $o)
                            <tr>
                                <td>{{ $o->purpose  }}</td>
                                <td>{{ $o->amount. '$' }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table> <br>
                    {{ $com->links() }}
                    <br>
                    <h6>&nbsp;&nbsp;&nbsp;Total Earning : {{ $earn . "$" }}</h6>

                </div>
            </div>
        </div>
    </div>
@endsection
