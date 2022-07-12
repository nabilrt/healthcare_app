@extends('layouts.admin_dash')
@section('content')


    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Layout Demo -->
            <div class="row">
                <!-- Basic -->
                <div class="col-md-12">
                    <div class="card mb-12">
                        <h5 class="card-header">Send Remark</h5>



                        <form action="{{route('send_r')}}" method="post">
                            @csrf
                            <input type="hidden" name="d_id" value="{{$doctor->doctor_id}}">
                            <div class="card-body demo-vertical-spacing demo-only-element">

                                <div class="mb-3">

                                    <h6>You are about to block {{$doctor->doctor_name}}</h6>

                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Remark</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="remark" rows="3"></textarea>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="rem" value="" id="defaultCheck2" />
                                    <label class="form-check-label" for="defaultCheck2"> No Remark [No Email will be sent] </label>
                                </div>
                                <input type="submit" value="Block" class="btn btn-danger me-2">
                                <a href="{{route('ma_doc')}}" class="btn btn-outline-dark me-2">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Layout Demo -->
    </div>
@endsection
