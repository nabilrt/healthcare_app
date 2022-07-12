@extends('layouts.patient_dash')
@section('content')


    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Layout Demo -->
            <div class="row">
                <!-- Basic -->
                <div class="col-md-12">
                    <div class="card mb-12">
                        <h5 class="card-header">Take Appointment</h5>
                        @if($errors->any())
                            <div class="alert alert-danger">
                                {{$errors->first()}}
                            </div>
                        @endif


                        <form action="{{ route('create_app') }}" method="post">
                            @csrf
                            <div class="card-body demo-vertical-spacing demo-only-element">

                                <input type="hidden" name="d_id" value="{{ $t_a->doctor_id}}">
                                <input type="hidden" name="rm" value="{{(int)$rem->visit - (((int)$rem->visit*(int)$rem->discount_per)/100)}}">
                                <input type="hidden" name="rm_b" value="{{ $rem->visit }}">

                                <div class="mb-3">
                                    <h5>Doctor Name : {{$t_a->doctor_name}}</h5>
                                    <h6>Fees : <s>{{$rem->visit.'$'}}</s> {{(int)$rem->visit - (((int)$rem->visit*(int)$rem->discount_per)/100) .'$'}} </h6>
                                </div>


                                <div class="mb-3">
                                    <label for="app_time" class="form-label">Choose Time Slot</label>
                                    <input type="time" name="app_time" id="app_time" class="form-control">
                                   <span class="text-danger">
                                        @error('app_time'){{$message}}@enderror
                                   </span>
                                </div>
                                <div class="mb-3">
                                    <label for="app_date" class="form-label">Date</label>
                                    <input type="date" name="app_date" id="app_date" class="form-control"><span class="text-danger">
                                        @error('app_date'){{$message}}@enderror
                                </span>
                                </div>
                                <br>
                                <h6>Medical Checklist</h6>
                                <div class="form-check">
                                    <input class="form-check-input" name="problems[]" type="checkbox" value="Gastric" id="defaultCheck2"  />
                                    <label class="form-check-label" for="defaultCheck2"> Gastric </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="problems[]" type="checkbox" value="Sour Throat" id="defaultCheck3"  />
                                    <label class="form-check-label" for="defaultCheck3"> Sour Throat </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="problems[]" type="checkbox" value="Allergy" id="defaultCheck4"  />
                                    <label class="form-check-label" for="defaultCheck4"> Allergy </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="problems[]" type="checkbox" value="Fever" id="defaultCheck5"  />
                                    <label class="form-check-label" for="defaultCheck5"> Fever </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="problems[]" type="checkbox" value="Cough" id="defaultCheck6"  />
                                    <label class="form-check-label" for="defaultCheck6"> Cough </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="problems[]" type="checkbox" value="Diabetes" id="defaultCheck7"  />
                                    <label class="form-check-label" for="defaultCheck7"> Diabetes </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="problems[]" type="checkbox" value="Migraine" id="defaultCheck8"  />
                                    <label class="form-check-label" for="defaultCheck8"> Migraine </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="problems[]" type="checkbox" value="Eye Problem" id="defaultCheck9"  />
                                    <label class="form-check-label" for="defaultCheck9"> Eye Problem </label>
                                </div>

                                <input type="submit" value="Make Appointment" class="btn btn-primary me-2">
                                <a href="{{route('docs')}}" class="btn btn-outline-dark me-2"><i class='bx bx-arrow-back'></i></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Layout Demo -->
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script language="javascript">
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        $('#app_date').attr('min',today);

    </script>
@endsection
