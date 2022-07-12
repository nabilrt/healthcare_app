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
            <h5 class="card-header">Update Medicine</h5>
            <form action="{{ route('update_med') }}" method="post">
                @csrf
                <input type="hidden" name="m_id" value="{{ $medicine->medicine_id }}">
            <div class="card-body demo-vertical-spacing demo-only-element">
                  <div class="mb-3">
                    <label for="Quantity" class="form-label">Quantity</label>
                    <input type="number" name="quantity" class="form-control" id="" value="{{ $medicine->quantity }}"> <span class="text-danger">
                        @error('quantity'){{$message}}@enderror
                    </span>
                  </div>
                  <div class="mb-3">
                    <label for="unit_price" class="form-label">Unit Price</label>
                    <input type="text" name="unit_price" id="" class="form-control" value="{{ $medicine->medicine_price }}"><span class="text-danger">
                        @error('unit_price'){{$message}}@enderror
                    </span>
                  </div>
                  <input type="submit" value="Save Changes" class="btn btn-info me-2">
            </form>
            </div>
          </div>
        </div>
      </div>
      <!--/ Layout Demo -->
    </div>
@endsection
