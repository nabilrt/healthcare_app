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
                        <h5 class="card-header">Give Feedback about our system</h5>
                        <form action="{{  route('p_reviews')  }}" method="post">
                            @csrf


                            <input type="hidden" name="p_id" id="d_id" value="{{ session('username') }}">
                            <div class="card-body demo-vertical-spacing demo-only-element">
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Feedback</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="review" rows="3"></textarea>
                                    <span class="text-danger">
                        @error('review'){{$message}}@enderror
                    </span>
                                </div> <br>

                                <input type="submit" value="Provide Feedback" class="btn btn-success me-2">

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Layout Demo -->
    </div>
@endsection
