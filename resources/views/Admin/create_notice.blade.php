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
                        <h5 class="card-header">Send Notice</h5>

                        @if($errors->any())
                            <div class="alert alert-success">
                                {{$errors->first()}}
                            </div>
                        @endif

                        <form action="{{ route('add_not') }}" method="post">
                            @csrf
                            <div class="card-body demo-vertical-spacing demo-only-element">

                                <div class="mb-3">
                                    <label for="notice_for" class="form-label">Notice For</label>
                                    <select id="notice_for" class="form-select" name="n_f">
                                        <option value="">Choose An Option</option>
                                        <option value="Doctor">Doctor</option>
                                        <option value="Patient">Patient</option>
                                        <option value="Seller">Seller</option>
                                    </select><span class="text-danger">
                        @error('n_f'){{$message}}@enderror
                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Notice</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="notice" rows="3"></textarea><span class="text-danger">
                        @error('notice'){{$message}}@enderror
                    </span>
                                </div>
                                <input type="submit" value="Send" class="btn btn-info me-2">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Layout Demo -->
    </div>
@endsection
