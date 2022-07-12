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
                        <h5 class="card-header">Report Malicious Activity</h5>

                        @if($errors->any())
                            <div class="alert alert-success">
                                {{$errors->first()}}
                            </div>
                        @endif

                        <form action="{{route('rep')}}" method="post">
                            @csrf
                            <div class="card-body demo-vertical-spacing demo-only-element">

                                <div class="mb-3">
                                    <label for="notice_for" class="form-label">Against</label>
                                    <select id="notice_for" class="form-select" name="against">
                                        <option value="">Choose An Option</option>
                                        @foreach($inbox as $i)
                                        <option value="{{$i->patient_id}}">{{$i->patient_id}}</option>
                                        @endforeach
                                    </select><span class="text-danger">
                        @error('against'){{$message}}@enderror
                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Reason</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="reason" rows="3"></textarea><span class="text-danger">
                        @error('reason'){{$message}}@enderror
                    </span>
                                </div>
                                <input type="submit" value="Report" class="btn btn-info me-2">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Layout Demo -->
    </div>
@endsection
