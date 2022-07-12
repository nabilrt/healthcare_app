@extends('layouts.app')
@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-4">
                <!-- Forgot Password -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-2">About Us</h4>
                        <p class="mb-4">We are proud AIUBIANS</p>
                        <figure class="figure">

                            <img src="images/team.jpg" class="rounded float-start" alt="..." height="300" width="175">
                            <figcaption class="figure-caption">Nabil, Arpita & Adhir</figcaption>
                        </figure>
                        <br>
                        <p class="text-center">

                            <a href="{{route('home')}}">
                                <span><i class='bx bx-arrow-back'></i> Return Home</span>
                            </a>
                        </p>





                    </div>
                </div>
                <!-- /Forgot Password -->
            </div>
        </div>
    </div>
@endsection
