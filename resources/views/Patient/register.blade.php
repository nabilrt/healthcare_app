
@extends('layouts.app')
@section('content')


    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register Card -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->


                        <h5><i class='bx bx-plus-medical'></i> AS Health Care Systems</h5>
                        <p class="mb-4">Patient Registration</p>
                        @if(!empty($msg))
                            <div class="alert alert-primary alert-dismissible" role="alert">
                                {{ $msg }}
                            </div>
                        @endif


                        <form id="formAuthentication" class="mb-3" action="{{ route('registerSub') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">

                                <label for="name" class="form-label">Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="name"
                                    name="name"
                                    placeholder="Enter your name"
                                /><span class="text-danger">
                    @error('name'){{$message}}@enderror
                </span>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="mail" placeholder="Enter your email" /><span class="text-danger">
                    @error('mail'){{$message}}@enderror
                </span>
                            </div>

                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">Password</label>
                                <div class="input-group input-group-merge">
                                    <input
                                        type="password"
                                        id="password"
                                        class="form-control"
                                        name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password"
                                    />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                <span class="text-danger">
                    @error('password'){{$message}}@enderror
                </span>
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select id="gender" class="form-select" name="gender">
                                    <option>Choose An Option</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Others">Others</option>
                                </select><span class="text-danger">
                        @error('gender'){{$message}}@enderror
                    </span>
                            </div>
                            <div class="mb-3">
                                <label for="dob" class="form-label">Date of Birth</label>
                                <input type="date" name="dob" id="dob" class="form-control">
                                <span class="text-danger">
                        @error('dob'){{$message}}@enderror
                    </span>
                            </div>
                            <div class="mb-3">
                                <label for="dp" class="form-label">Profile Picture</label>
                                <input class="form-control" type="file" id="dp" name="dp" /><span class="text-danger">
                        @error('dp'){{$message}}@enderror
                    </span>
                            </div>
                            <input type="submit" class="btn btn-primary d-grid w-100" value="Sign up">
                        </form>

                        <p class="text-center">
                            <span>Already have an account?</span>
                            <a href="{{ route('login') }}">
                                <span>Sign in instead</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- Register Card -->
            </div>
        </div>
    </div>
    <script>
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();

        if (dd < 10) {
            dd = '0' + dd;
        }

        if (mm < 10) {
            mm = '0' + mm;
        }

        today = yyyy + '-' + mm + '-' + dd;
        document.getElementById("dob").setAttribute("max", today);
    </script>

@endsection



