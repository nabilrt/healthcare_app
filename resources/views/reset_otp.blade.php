@extends('layouts.app')
@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-4">
                <!-- Forgot Password -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-2">Change Password 🔒</h4>
                        <p class="mb-4">Check your email for the OTP</p>
                        <p class="mb-4">Your OTP will expire in 2 Minutes</p>
                        @if($errors->any())
                            <div class="alert alert-danger" role="alert">
                                {{$errors->first()}}
                            </div>
                        @endif
                        <form id="formAuthentication" class="mb-3" action="{{route('matchOTP')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="pass" class="form-label">OTP</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="email"
                                    name="otp"
                                    placeholder="Enter the otp"
                                    autofocus
                                />
                            </div>
                            <input type="submit" value="Next" class="btn btn-primary d-grid w-100">
                        </form>
                        <div class="text-center">
                            <a href="{{route('login')}}" class="d-flex align-items-center justify-content-center">
                                <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                                Back to login
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /Forgot Password -->
            </div>
        </div>
    </div>
@endsection
