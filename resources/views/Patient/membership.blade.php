@extends('layouts.patient_dash')
@section('content')


    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Layout Demo -->
            <div class="row">
                <!-- Basic -->
                <div class="col-md-12">
                    <div class="card mb-12">
                        <h5 class="card-header">Membership</h5>
                            <div class="card-body demo-vertical-spacing demo-only-element">
                                <div class="mb-3">

                                    <h5>Your Membership : Premium</h5>
                                    <h6>You are premium member from {{$prem->paid_at}}</h6> <br>
                                    <p>Thanks for supporting us. Enjoy all the benefits!</p>

                                </div> <br>


                    </div>
                </div>
            </div>
        </div>
        <!--/ Layout Demo -->
    </div>
@endsection
