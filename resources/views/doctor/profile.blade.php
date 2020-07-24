@extends('main-layout.master')
@section('content')
@include('doctor.includes.side-nav-bar')
@include('doctor.includes.header')


<img src="{{ url('img/gradient.png') }}" class="top-bar-profile">
<div class="container-fluid">
    <div class="inner-container profile">
        <div class="row">
            <div class="col-lg-3">
                <img src="{{ url('img/profile.png') }}" class="profile-photo">
                <h4><strong>Profile Completeness</strong></h4>
                <br>
                <div class="progress">
                    <div class="progress-bar" style="width:60%;background: #04C6FF"></div>
                </div>
                <h3 class="text-center font-weight-bold mt-3">
                    60%
                </h3>
                <h4 class="mt-5 mb-4"><strong>Profile Completeness</strong></h4>
                <div class="profile-completeness">
                    <div>
                    <img src="{{ url('img/profile-circle.svg') }}" height="20px"><span
                    class="pl-2">Bio</span>
                    </div>
                    <div>
                    <img src="{{ url('img/profile-circle.svg') }}" height="20px"><span
                    class="pl-2">Hospitals</span>
                    </div>
                    <div>
                    <img src="{{ url('img/profile-circle.svg') }}" height="20px"><span
                    class="pl-2">Education</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="profile-right">
                    <h1 class="profile-heading mt-4">{{$profile['salutation'].' '.$profile['first_name'].' '.$profile['last_name']}}</h1>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <h5 class="speciality-title"><strong>Speciality</strong></h5>
                            <p>{{$profile['speciality']}}</p>
                        </div>
                        <div class="col-md-4">
                            <h5 class="speciality-title"><strong>Consultation Type</strong></h5>
                            <p>{{$profile['consultation_type']}}</p>
                        </div>
                        <div class="col-md-4">
                            <h5 class="speciality-title"><strong>Website</strong></h5>
                            <p>{{$profile['website']}}</p>
                        </div>
                    </div>
                    <div class="bio mt-5">
                        <h6 class="font-weight-bold mb-3">BIO</h6>
                        <p class="mt-3" contenteditable="true">{{$profile['bio']}}</p>
                    </div>
                    <br>
                    <hr>
                    <br>
                    <div class="hosiptals mt-5">
                        <h3 class="font-weight-bold mb-3">Hospitals</h3>
                        <div class="row">
                        @php
            $hospitals = json_decode($profile['employment'],true);
                         @endphp
                        @foreach($hospitals as $hospital)
                            <div class="col-md-4 mb-5">
                                <h5 class="hospital-title" contenteditable="true">{{$hospital['name']}}</h5>
                                <p contenteditable="true">{{$hospital['detail']}}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <br>
                    <hr>
                    <div class="hosiptals mt-5">
                        <h3 class="font-weight-bold mb-3">Education</h3>
                        <div class="row">
                        @php
            $education = json_decode($profile['education'],true);
        @endphp
        @foreach($education as $edu)
                            <div class="col-md-4">
                                <p>University National Mayor</p>
                                <h6 class="font-weight-bold">{{$edu['detail']}}</h6>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

