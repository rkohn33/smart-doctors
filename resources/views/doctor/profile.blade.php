@extends('main-layout.master')

@section('content')

<div class="s-layout">
@include('doctor.includes.side-nav-bar')
@include('doctor.includes.header')

    <div class="content">

<div class="profile-banner">
    <div class="margin-70">
        <div class="row">
            <div class="col col-sm-3 avatar-container">
                <img src="https://420medsthailand.com/wp-content/uploads/2020/05/humberto-chavez-FVh_yqLR9eA-unsplash-881x1024.jpg"
                    class="rounded float-right profile-avatar" alt="User avatar">
            </div>
            <div class="col col-sm-9 avatar-container ">
                <p class="user-name">Dr. Paola Rodriguez</p>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="sub-header">Specialty</div>
                        <div class="profile-text">General Practice Medical School, CMP 245864</div>
                    </div>
                    <div class="col-lg-4">
                        <p class="sub-header">Consultation type</p>
                        <p class="profile-text">Audio, video, In Person</p>

                    </div>
                    <div class="col-lg-4">
                        <p class="sub-header">Website</p>
                        <p class="profile-text">www.smartdoctors.us/paola.com</p>
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
            <p class="profile-text">Lorem Ipsum is simply dummy text of the printing and typesetting
                industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                of type
                and scrambled it to make a type specimen book. It has survived not only five centuries, but
                also the
                leap into electronic typesetting, remaining essentially unchanged. It was popularised in the
                1960s
                with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with
                desktop
                publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            <p class="profile-text">Lorem Ipsum is simply dummy text of the printing and typesetting
                industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                of type
                and scrambled it to make a type specimen book. It has survived not only five centuries, but
                also the
                leap into electronic typesetting, remaining essentially unchanged.</p>
        </div>
    </div>

    <div class="margin-left">
        <hr>
        <p class="profile-title">Hospitals</p>

    </div>
    <div class="row margin-left">
        <div class="col-lg-4">
            <p class="profile-text">Private Office Callao</p>
            <p class="profile-text1">Lorem Ipsum is simply dummy text of the printing.</p>
            <button type="button" class="btn start-now"><span class="pr-4">Call for info</span>
            <img src="{{ url('img/white-arrow.svg') }}"></button>
        </div>
        <div class="col-lg-4">
            <p class="profile-text">Private Office Callao</p>
            <p class="profile-text1">Lorem Ipsum is simply dummy text of the printing.</p>
            <button type="button" class="btn start-now"><span class="pr-4">Call for info</span>
            <img src="{{ url('img/white-arrow.svg') }}"></button>
        </div>
        <div class="col-lg-4">
            <p class="profile-text">Private Office Callao</p>
            <p class="profile-text1">Lorem Ipsum is simply dummy text of the printing.</p>
            <button type="button " class="btn start-now"><span class="pr-4">Call for info</span>
            <img src="{{ url('img/white-arrow.svg') }}"></button>
        </div>
    </div>
    <br>
    <div class="margin-left">
        <hr>
        <div class="profile-title">Education</div>

    </div>
    <div class="row margin-left">
        <div class="col-lg-4">
            <p class="profile-text">university National Mayor De san Marcos, Peru Medical Doctor, 2010</p>
        </div>
        <div class="col-lg-4">
            <p class="profile-text">university National Mayor De san Marcos, Peru Medical Doctor, 2010</p>

        </div>
        <div class="col-lg-4">
            <p class="profile-text">university National Mayor De san Marcos, Peru Medical Doctor, 2010</p>
        </div>
    </div>

</div>
    </div>
  </div>

@endsection