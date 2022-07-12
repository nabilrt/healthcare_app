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
                        <h5 class="card-header">Reply to Message</h5>
                        <form action="{{ route('reply_msg_p') }}" method="post">
                            @csrf


                            <input type="hidden" name="i_id" value="{{ $conversation->inbox_id }}">
                            <input type="hidden" name="c_id" value="{{ $c_id }}">
                            <input type="hidden" name="d_id" value="{{ $conversation->doctor_id }}">
                            <input type="hidden" name="p_id" value="{{ $conversation->patient_id }}">
                            <input type="hidden" name="msg" value="{{ $conversation->message }}">


                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Message : {{ $conversation->message }}




                            <div class="card-body">
                                <div>
                                    <label for="defaultFormControlInput" class="form-label">Reply</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        placeholder="Reply"
                                        aria-describedby="defaultFormControlHelp"
                                        name="reply"
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
