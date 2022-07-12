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
                        <h5 class="card-header">Create Expense</h5>

                        @if($errors->any())
                            <div class="alert alert-success">
                                {{$errors->first()}}
                            </div>
                        @endif

                        <div class="card-body demo-vertical-spacing demo-only-element">

                        <form action="{{ route('add_exp') }}" method="post">
                            @csrf
                                <div class="mb-3">
                                    <label for="purpose" class="form-label">Purpose</label>
                                    <select id="purpose" class="form-select" name="purpose">
                                        <option value="">Choose An Option</option>
                                        <option value="Hosting">Hosting</option>
                                        <option value="Security">Security</option>
                                        <option value="Maintenance">Maintenance</option>
                                        <option value="Others">Others</option>
                                    </select><span class="text-danger">
                        @error('purpose'){{$message}}@enderror
                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="Quantity" class="form-label">Amount</label>
                                    <input type="number" name="amount" class="form-control" id="" placeholder="$"> <span class="text-danger">
                        @error('amount'){{$message}}@enderror
                    </span>
                                </div>

                                <input type="submit" value="Create" class="btn btn-primary me-2">
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!--/ Layout Demo -->
    </div>
@endsection
