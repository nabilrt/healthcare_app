@extends('layouts.seller_dash')
@section('content')


<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <!-- Layout Demo -->
      <div class="row">
        <!-- Basic -->
        <div class="col-md-12">
          <div class="card mb-12">
            <h5 class="card-header">Add Medicines</h5>

        @if($errors->any())
        <div class="alert alert-success">
            {{$errors->first()}}
        </div>
        @endif

            <form action="{{ route('add_med') }}" method="post">
                @csrf
            <div class="card-body demo-vertical-spacing demo-only-element">
                <div class="mb-3">
                    <label for="name" class="form-label">Medicine Name</label>
                    <input type="text" name="med_name" id="" value="" class="form-control" placeholder="Medicine Name"><span class="text-danger">
                        @error('med_name'){{$message}}@enderror
                    </span>
                </div>
                  <div class="mb-3">
                    <label for="med_type" class="form-label">Medicine Type</label>
                    <select id="med_type" class="form-select" name="med_type">
                        <option value="">Choose An Option</option>
                        <option value="Tablet">Tablet</option>
                        <option value="Injection">Injection</option>
                        <option value="Capsule">Capsule</option>
                        <option value="Saline">Saline</option>
                        <option value="Dispencer">Dispencer</option>
                        <option value="Syrup">Syrup</option>
                    </select><span class="text-danger">
                        @error('med_type'){{$message}}@enderror
                    </span>
                  </div>
                  <div class="mb-3">
                    <label for="Quantity" class="form-label">Quantity</label>
                    <input type="number" name="quantity" class="form-control" id=""> <span class="text-danger">
                        @error('quantity'){{$message}}@enderror
                    </span>
                  </div>
                  <div class="mb-3">
                    <label for="unit_price" class="form-label">Unit Price</label>
                    <input type="text" name="unit_price" id="" class="form-control"><span class="text-danger">
                        @error('unit_price'){{$message}}@enderror
                    </span>
                  </div>
                  <input type="submit" value="Add Medicine" class="btn btn-info me-2">
            </form>
            </div>
          </div>
        </div>
      </div>
      <!--/ Layout Demo -->
    </div>
@endsection
