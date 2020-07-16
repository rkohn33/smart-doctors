@extends('main-layout.master')

@section('content')

<div class="s-layout">
@include('doctor.includes.side-nav-bar')
@include('doctor.includes.header')
<div class="pl-200">
<div class="profile-banner">
    <div class="margin-70">
        <div class="row">
            <div class="col col-sm-3 avatar-container">
                <img src="https://420medsthailand.com/wp-content/uploads/2020/05/humberto-chavez-FVh_yqLR9eA-unsplash-881x1024.jpg"
                    class="rounded float-right profile-avatar" alt="User avatar">
            </div>
            <div class="col col-sm-9 avatar-container ">
                <p class="user-name">{{$profile['salutation'].' '.$profile['first_name'].' '.$profile['last_name']}}</p>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="sub-header">Specialty</div>
                        <div class="profile-text">{{$profile['speciality']}}</div>
                    </div>
                    <div class="col-lg-4">
                        <p class="sub-header">Consultation type</p>
                        <p class="profile-text">{{$profile['consultation_type']}}</p>

                    </div>
                    <div class="col-lg-4">
                        <p class="sub-header">Website</p>
                        <p class="profile-text">{{$profile['website']}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row pt-3 margin-70">
        <div class="col-lg-3 inline">
            <p class="profile-text1">Profile Completeness</p>
            <img src="{{ url('img/profile-line.svg') }}" width="200px">
            <p class="profile-text text-center">60%</p>
            <p class="profile-text1">Completed Steps</p>
            <p class="profile-text"> <img src="{{ url('img/profile-circle.svg') }}" height="20px"><span
                    class="pl-2">Bio</span></p>
            <p class="profile-text"> <img src="{{ url('img/profile-circle.svg') }}" height="20px"><span
                    class="pl-2">Hospitals</span>
            </p>
            <p class="profile-text"> <img src="{{ url('img/profile-circle.svg') }}" height="20px"><span
                    class="pl-2">Education</span>
            </p>
        </div>
        <div class="col-lg-9 inline">
            <p class="sub-header">Bio</p>
            <p class="profile-text">{{$profile['bio']}}</p>
        </div>
    </div>

    <div class="margin-left">
        <hr>
        <p class="profile-title">Hospitals</p>

    </div>
    <div class="row margin-left">
        @php
            $hospitals = json_decode($profile['employment'],true);
        @endphp
        @foreach($hospitals as $hospital)
         <div class="col-lg-4">
             <p class="profile-text">{{$hospital['name']}}</p>
             <p class="profile-text1">{{$hospital['detail']}}</p>
             <button type="button" class="btn start-now"><span class="pr-4">Call for info</span>
             <img src="{{ url('img/white-arrow.svg') }}"></button>
        </div>
        @endforeach
    </div>
    <br>
    <div class="margin-left">
        <hr>
        <div class="profile-title">Education</div>

    </div>
    <div class="row margin-left">
       @php
            $education = json_decode($profile['education'],true);
        @endphp
        @foreach($education as $edu)
        <div class="col-lg-4">
            <p class="profile-text">{{$edu['detail']}}</p>
        </div>
        @endforeach
    </div>

</div>
    </div>
  </div>

@endsection