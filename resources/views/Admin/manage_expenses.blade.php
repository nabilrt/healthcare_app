@extends('layouts.admin_dash')
@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
                <h5 class="card-header">Manage Expenses</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead class="table-primary">
                        <tr>
                            <th>Purpose</th>
                            <th>Amount</th>
                            <th>Created</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @foreach ($expenses as $exp)
                            <tr>
                                <td>{{ $exp->purpose }}</td>
                                <td>{{ $exp->amount .'$' }}</td>
                                <td>{{ $exp->created }}</td>
                                <td><a href="/eE-{{ $exp->expense_id }}" class="btn btn-sm btn-warning"><i class='bx bx-edit-alt' ></i></a></td>
                                <td><a href="/eD-{{ $exp->expense_id }}" class="btn btn-sm btn-danger"><i class='bx bx-block' ></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <br>
                <div style="padding-left: 20px">
                    {{"Total Expense : " .$total .'$'}}
                </div>

                <br>
            </div>
        </div>
    </div>
@endsection
