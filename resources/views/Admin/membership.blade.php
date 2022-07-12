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
                        <h5 class="card-header">Premium Membership Charge</h5>
                        <form action="{{route('membership')}}" method="post">
                            @csrf
                            <input type="hidden" name="c_id" id="d_id" value="{{ "C-1" }}">
                            <div class="card-body demo-vertical-spacing demo-only-element">
                                <div class="input-group">

                                    <span class="input-group-text" id="basic-addon11">$</span>
                                    <input
                                        type="number"
                                        class="form-control"
                                        placeholder="Remuneration Amount"
                                        aria-label="Username"
                                        aria-describedby="basic-addon11"
                                        name="amount"
                                        value="{{ $p_c->charge }}"
                                    /><span class="text-danger">
                        @error('amount'){{$message}}@enderror
                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="disc_per" class="form-label">Discount Percentage</label>
                                    <select class="form-select" name="disc_per" value="{{ $p_c->discount }}">
                                        <option>Choose an Option</option>
                                        <option value="0"<?php if($p_c->discount == '0' ) echo 'selected = "selected"'; ?> >0%</option>
                                        <option value="5"<?php if($p_c->discount == '5' ) echo 'selected = "selected"'; ?> >5%</option>
                                        <option value="10"<?php if($p_c->discount == '10' ) echo 'selected = "selected"'; ?> >10%</option>
                                        <option value="15" <?php if($p_c->discount == '15' ) echo 'selected = "selected"'; ?>>15%</option>
                                        <option value="30" <?php if($p_c->discount == '30' ) echo 'selected = "selected"'; ?>>15%</option>
                                        <option value="50" <?php if($p_c->discount == '50' ) echo 'selected = "selected"'; ?>>50%</option>
                                        <option value="70" <?php if($p_c->discount == '70' ) echo 'selected = "selected"'; ?>>70%</option>
                                    </select>
                                    <span class="text-danger">
                        @error('disc_per'){{$message}}@enderror
                    </span>
                                </div> <br>

                                <input type="submit" value="Save Changes" class="btn btn-info me-2">

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Layout Demo -->
    </div>
@endsection
