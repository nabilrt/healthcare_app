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
            <p class="mb-4">Please sign-in with your Organizational ID</p>
            @if($errors->any())
            <div class="alert alert-primary" role="alert">


                {{$errors->first()}}



            </div>
            @endif

            <form id="formAuthentication" class="mb-3" action="{{ route('loginSubmitted') }}" method="POST">
                @csrf
              <div class="mb-3">
                <label for="username" class="form-label">User ID</label>
                <input
                  type="text"
                  class="form-control"
                  id="email"
                  name="username"
                  placeholder="Enter your User ID"
                  value="<?php if(isset($_COOKIE['uname'])) {echo $_COOKIE['uname'];} ?>"
                />
                <span class="text-danger">
                    @error('username'){{$message}}@enderror
                </span>
              </div>
              <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                  <label class="form-label" for="password">Password</label>
                  <a href="{{route('forgot')}}">
                    <small>Forgot Password?</small>
                  </a>
                </div>
                <div class="input-group input-group-merge">
                  <input
                    type="password"
                    id="password"
                    class="form-control"
                    name="pass"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password"
                    value="<?php if(isset($_COOKIE['pass'])) {echo $_COOKIE['pass'];} ?>"
                  />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
                <span class="text-danger">
                    @error('pass'){{$message}}@enderror
                    </span><br>
              </div>
              <div class="mb-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="remember-me" name="remember" />
                  <label class="form-check-label" for="remember-me"> Remember Me </label>
                </div>
              </div>
              <div class="mb-3">
                <input class="btn btn-primary d-grid w-100" type="submit" value="Sign in">
              </div>
            </form>

            <p class="text-center">
              <span>New on our platform?</span>
              <a href="{{ route('w_r') }}">
                <span>Create an account</span>
              </a>
            </p>
              <p class="text-center">

                  <a href="{{route('unblock_re')}}">
                      <span>Contact Support</span>
                  </a>
              </p>
          </div>
        </div>
        <!-- /Register -->
      </div>
    </div>
  </div>
@endsection
