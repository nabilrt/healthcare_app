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
                        <h5 class="card-header">Send New Message</h5>
                        <form action="{{ route('p_sender') }}" method="post">
                            @csrf



                            <input type="hidden" name="i_id" value="{{ $i_id }}">
                            <input type="hidden" name="d_id" value="{{ $inbox->doctor_id }}">
                            <input type="hidden" name="p_id" value="{{ $inbox->patient_id }}">






                            <div class="card-body">
                                <div>
                                    <label for="defaultFormControlInput" class="form-label">Message</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        placeholder="New Message"
                                        aria-describedby="defaultFormControlHelp"
                                        name="msg"
                                    />
                                    <br>



                                    <input type="submit" value="Send" class="btn btn-info me-2">

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Layout Demo -->
    </div>
@endsection
