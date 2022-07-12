@extends('layouts.dash')
@section('content')


    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Layout Demo -->
            <div class="row">
                <!-- Basic -->
                <div class="col-md-12">
                    <div class="card mb-12">
                        <h5 class="card-header">Prescription</h5>
                        <form action="{{  route('send')  }}" method="post">
                            @csrf


                            <input type="hidden" name="mail" value="{{ $patient->patient_email }}">
                            <input type="hidden" name="name" value="{{ $patient->patient_name }}">

                            <div class="card-body demo-vertical-spacing demo-only-element">
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Medicine Name with Timing</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="meds" rows="3"></textarea>
                                </div> <br>

                                <input type="submit" value="Send Prescription" class="btn btn-success me-2">

                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Layout Demo -->
    </div>
@endsection
