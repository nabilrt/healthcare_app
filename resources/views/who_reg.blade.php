@extends('layouts.app')
@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <!-- /Logo -->
                        <h4 class="mb-2">Welcome to ASHCS! 👋</h4>
                        <p class="mb-4">Please choose your preferred option</p>
                            <div class="mb-3">
                                <a href="{{route('register')}}" class="btn btn-lg btn-dark">Join as Doctor</a>
                            </div>
                            <div class="mb-3">
                                <a href="{{route('p_register')}}" class="btn btn-lg btn-dark">Join as User</a>
                            </div>
                        <br>
                        <div class="mb-3">
                            <a href="{{route('login')}}" class="btn btn-outline-dark">Sign in</a> <br><br>
                            ASHCS &copy; {{date('Y')}}
                        </div>
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>
@endsection
