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
                        <h5 class="card-header">Edit Expense</h5>

                        <div class="card-body demo-vertical-spacing demo-only-element">

                            <form action="{{ route('edit_exp') }}" method="post">
                                @csrf
                                <input type="hidden" name="e_id" value="{{$expense->expense_id}}">
                                <div class="mb-3">
                                    <label for="purpose" class="form-label">Purpose</label>
                                    <select id="purpose" class="form-select" name="purpose">
                                        <option value="">Choose An Option</option>
                                        <option value="Hosting" <?php if($expense->purpose == 'Hosting' ) echo 'selected = "selected"'; ?>>Hosting</option>
                                        <option value="Security" <?php if($expense->purpose == 'Security' ) echo 'selected = "selected"'; ?>>Security</option>
                                        <option value="Maintenance" <?php if($expense->purpose == 'Maintenance' ) echo 'selected = "selected"'; ?>>Maintenance</option>
                                        <option value="Others" <?php if($expense->purpose == 'Others' ) echo 'selected = "selected"'; ?>>Others</option>
                                    </select><span class="text-danger">
                        @error('purpose'){{$message}}@enderror
                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="Quantity" class="form-label">Amount</label>
                                    <input type="number" name="amount" class="form-control" id="" placeholder="$" value="{{$expense->amount}}">
                                </div>

                                <input type="submit" value="Save Changes" class="btn btn-primary me-2">
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!--/ Layout Demo -->
        </div>
@endsection
