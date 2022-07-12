@extends('layouts.patient_dash')
@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
                <h5 class="card-header">Conversation with {{ $name }}</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead class="table-dark">
                        <tr>
                            <th>Message</th>
                            <th>Reply</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @foreach ($conversations as $conv)
                            <tr>
                                <td>{{ $conv->message }}</td>
                                <td>{{ $conv->reply }}</td>
                                @if($conv->reply=="")
                                    <td ><a href="/dC-{{ $conv->conv_id }}" class="btn btn-sm btn-success">Reply</a></td>
                                @else
                                    <td ></td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table> <br>
                    {{ $conversations->links() }}
                    <br>
                    &nbsp;&nbsp; <a href="{{ route('p_inbox') }}" class="btn btn-sm btn-primary"><i class='bx bxs-inbox' ></i></a> &nbsp;
                    <a href="/dN-{{ $i_id }}" class="btn btn-sm btn-success"><i class='bx bx-message-add'></i></a> &nbsp;
                </div>
                <br>

            </div>

        </div>
    </div>
@endsection
