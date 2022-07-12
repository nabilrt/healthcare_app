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
            <h5 class="card-header">Setup your Remuneration Profile</h5>
            <form action="{{ route('setup_pay') }}" method="post">
                @csrf


            <input type="hidden" name="d_id" id="d_id" value="{{ session('username') }}">
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
                    /><span class="text-danger">
                        @error('amount'){{$message}}@enderror
                    </span>
                  </div>
                  <div class="mb-3">
                    <label for="disc_per" class="form-label">Discount Percentage</label>
                    <select id="disc_per" class="form-select" name="disc_per">
                      <option>Choose an Option</option>
                      <option value="5">5%</option>
                      <option value="15">10%</option>
                      <option value="30">15%</option>
                      <option value="50">50%</option>
                      <option value="70">70%</option>
                    </select>
                    <span class="text-danger">
                        @error('disc_per'){{$message}}@enderror
                    </span>
                  </div> <br>

                  <input type="submit" value="Setup Profile" class="btn btn-info me-2">

            </form>
            </div>
          </div>
        </div>
      </div>
      <!--/ Layout Demo -->
    </div>
@endsection
