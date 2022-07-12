@extends('layouts.dash')
@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
                <h5 class="card-header">Email Confirmation</h5>
                <h6>Prescription sent successfully</h6>

            </div>
            <a href="{{ route('inbox') }}" class="btn btn-sm btn-primary">Inbox</a> <br> <br>
        </div>

    </div>
@endsection
