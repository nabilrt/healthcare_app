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
                        <h5 class="card-header">Buy Premium Membership</h5>
                        <form action="{{ route('setup_membership') }}" method="post">
                            @csrf


                            <input type="hidden" name="p_id" id="d_id" value="{{ session('username') }}">
                            <div class="card-body demo-vertical-spacing demo-only-element">
                                <p>There is {{$cr->discount.'%'}} discount going on membership charge so <s>{{$cr->charge.'$'}}</s> is now {{$charge.'$'}}</p>
                                <label for="" class="form-label">Membership Price</label>
                                <div class="input-group">

                                    <span class="input-group-text" id="basic-addon11">$</span> <br>
                                    <input
                                        type="number"
                                        class="form-control"
                                        placeholder="Remuneration Amount"
                                        aria-label="Username"
                                        aria-describedby="basic-addon11"
                                        name="amount"
                                        value="{{$charge}}"
                                        readonly
                                    /><span class="text-danger">
                        @error('amount'){{$message}}@enderror
                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="disc_per" class="form-label">Payment Method</label>
                                    <select id="disc_per" class="form-select" name="met">
                                        <option>Choose an Option</option>
                                        <option value="Bkash">Bkash</option>
                                        <option value="Rocket">Rocket</option>
                                        <option value="Nagad">Nagad</option>
                                    </select>
                                    <span class="text-danger">
                        @error('met'){{$message}}@enderror
                    </span>
                                </div> <br>

                                <input type="submit" value="Buy Membership" class="btn btn-info me-2">

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Layout Demo -->
    </div>
@endsection
