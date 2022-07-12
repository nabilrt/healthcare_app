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
            <h5 class="card-header">Update Order</h5>
            <form action="{{ route('order') }}" method="post">
                @csrf
                <input type="hidden" name="o_id" value="{{ $order->order_id }}">
            <div class="card-body demo-vertical-spacing demo-only-element">
                  <div class="mb-3">
                    <select name="order_status" id="" class="form-select">
                        <option value="Ordered" <?php if($order->status == 'Ordered') echo 'selected = "selected"'; ?> >Ordered</option>
                        <option value="Shipped" <?php if($order->status == 'Shipped') echo 'selected = "selected"'; ?> >Shipped</option>
                        <option value="Delivered" <?php if($order->status == 'Delivered') echo 'selected = "selected"'; ?> >Delivered</option>
                        <option value="Cancelled" <?php if($order->status == 'Cancelled') echo 'selected = "selected"'; ?> >Cancelled</option>
                    </select> <br>
                  </div>
                  <input type="submit" value="Update Status" class="btn btn-info me-2">
            </form>
            </div>
          </div>
        </div>
      </div>
      <!--/ Layout Demo -->
    </div>
@endsection
