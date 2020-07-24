@extends('main-layout.master')

@section('content')

<div class="s-layout">
@include('doctor.includes.side-nav-bar')
@include('doctor.includes.header')

    <div class="content">
    <div class="card mt-5 mb-3 patient-card">
                <div class="row">
                    <div class="col-md-6">
                        <div class="sub-header pt-2 pl-4">PATIENT INFORMATION</div>
                        <hr>
                            <div class="row pl-4">
                                <div class="col col-md-6">
                                    <div class="profile-text2">Patient</div>
                                    <div class="profile-text">Betta Della Cruz</div>
                                    <div class="profile-text2">Age</div>
                                    <div class="profile-text">25 Years</div>
                                    <div class="profile-text2">Sex</div>
                                    <div class="profile-text">Male</div>
                                </div>
                                <div class="col col-md-6">
                                    <div class="profile-text2">Seeking Speciality</div>
                                    <div class="profile-text">Phychology</div>
                                    <div class="profile-text2">Consultation Reason</div>
                                    <div class="profile-text">Regular fever at night from last few days, cough, headache
                                    </div>
                                </div>
                            </div>
                    </div>


                    <div class="col-md-6 vital-signs">

                        <div class="sub-header pt-2 pl-2">VITAL SIGNS</div>
                        <hr>
                        <div class="col col-md-12">
                        <div class="row">
                            <div class="col col-md-6">
                                <div class="my-2">
                                    <label class="profile-text2">Weight(kg)</label>
                                    <input class="float-right box" type="text" id="" name="" size="9"><br>
                                </div>
                                <div class="my-2">
                                    <label class="profile-text2">Temprature</label>
                                    <input class="float-right box" type="text" id="" name="" size="9"><br>
                                </div>
                                <div class="my-2">
                                    <label class="profile-text2">Hate rate</label>
                                    <input class="float-right box" type="text" id="" name="" size="9"><br>
                                </div>
                            </div>
                            <div class="col col-md-6">
                                <div class="my-2">
                                    <label class="profile-text2">Height(mt)</label>
                                    <input class="float-right box" type="text" id="" name="" size="9"><br>
                                </div>
                                <div class="my-2">
                                    <label class="profile-text2">Pressure</label>
                                    <input class="float-right box" type="text" id="" name="" size="9"><br>
                                </div>
                                <div class="my-2">
                                    <label class="profile-text2">Others</label>
                                    <input class="float-right box" type="text" id="" name="" size="9"><br>
                                </div>

                                <button class="start-now float-right px-4">Save</button>
                            </div>

                        </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="card mt-5 mb-3 contact-header">
                <div class="row">
                    <img class="pl-2" src="{{ url('img/phone.svg') }}">
                    <div class="patient-name pl-1 pt-2">Betta Della Cruz</div>
                    <button type="button" class="mt-2 btn start-now padding-left"><span class="pr-2">Send
                            Report</span><img src="{{ url('img/white-arrow.svg') }}"></button>
                </div>
                <img src="{{ url('img/chatandvideo.png') }}" height="500px">
            </div>


    </div>
  </div>
  
  @include('doctor.includes.footer')
@endsection@endsection
