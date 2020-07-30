
@extends('main-layout.patient.master')

@section('content')
@include('patient.includes.header')
@include('patient.includes.side-nav-bar')

<div style="background-color:#f5f5f5">
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-12">
        <div class="mt-5 float-left">
          <div class="col-12 col-lg-12 float-left">
            <h1 class="">Hello,Jhon!</h1>
            <p class="">we are happy to help you stay healthy</p>
          </div>
        </div>
        <div class="col-12 col-lg-12 p-0 float-left ">
          <div class="input-group p-0 col-lg-9 col-12">

            <span class="col-lg-9 p-0 m-md-0 mt-3">
            <div class="custom_row">
              <i class="fa fa-search ml-3 mt-3" aria-hidden="true"></i>

              <input type="text" style="border: none; height: 49px; width: 77%; " class="mr-lg-2 form-control search_bar" placeholder="Doctor,Speciality,etc"
                aria-label="Username">
              <div class=" round_circle">
                <i class="fa fa-angle-right fa-2x custom_margen color" aria-hidden="true"></i>

              </div>
            </div>
          </span>
        </div>
        <table class="col-lg-12 col-12 p-0 mt-4 float-left table tablebordered">
          <thead>
            <tr>
              <th class="appointment_heading">Appointement</th>
            </tr>
          </thead>
          <tbody>
            <tr class="hov">
              <td>
                <div class="row ">
                  <div class="col-lg-7 col-md-6 ml-3">
                    <h5 class="text_one m-0">Gernal Appointement </h5>
                    <p class="text_two"> Dr.Jonne baptisite</p>
                  </div>
                  <div class="col-lg-5 col-md-6  pl-4 row ">
                    <div class=" now_dot"></div>
                    <h5 class="now_style">Now</h5>
                    <div class="btn-wrap">
                      <button class="btn btn-info button_margin" href="">Join Now <i class="fa fa-angle-right"
                          aria-hidden="true"></i> </button></div>
                  </div>
                </div>
      </div>
      </td>
      </tr>
      <tr class="hov">
        <td>
          <div class="row ">
            <div class="col-lg-6 col-md-6  ml-3">
              <h5 class="text_one">COVID Assessement </h5>
              <h6 class="text_two"> Dr.Jonne baptisite</h6>
            </div>
            <div class="col-lg-5 col-md-6 pr-5 float-right">
              <div class="box_style float-right">
                <h5 class="text_five">07/07/2020 <i class="fa fa-calendar ml-1" style="color: #07d1ff;"
                    aria-hidden="true"></i> </h5>
                <h6 class="text_six">3:00 PM <i class="fa fa-clock-o ml-4" style="color: #07d1ff;"
                    aria-hidden="true"></i> </h6>
                <!-- <i class="fas fa-clock"></i> -->
                <i class="far fa-clock"></i>
              </div>
            </div>
          </div>
        </td>
      </tr>
      </tbody>
      </table>
      <div class="col-lg-12">
        <h2 class="all_doctor_heading">
          See a doctor now
        </h2>
        <div class="row">
          <div class="m-md-4 m-lg-3">
            <img src="{{ url('img/profile.png') }}" class="image_box">
            <h5 class="image_box_name">
              Cardiologist
            </h5>
          </div>
          <div class="m-md-4 m-lg-3">
            <img src="{{ url('img/profile.png') }}" class="image_box">
            <h5 class="image_box_name">
              Cardiologist
            </h5>
          </div>
          <div class="m-md-4 m-lg-3">
            <img src="{{ url('img/profile.png') }}" class="image_box">
            <h5 class="image_box_name">
              Cardiologist
            </h5>
          </div>
          <div class="m-md-4 m-lg-3">
            <img src="{{ url('img/profile.png') }}" class="image_box">
            <h5 class="image_box_name">
              Cardiologist
            </h5>
          </div>
          <div class="  m-4  ">
            <img src="{{ url('img/profile.png') }}" class="image_box">
            <h5 class="image_box_name">
              Cardiologist
            </h5>
          </div>
          <div class="m-md-4 m-lg-3">
            <img src="{{ url('img/profile.png') }}" class="image_box">
            <h5 class="image_box_name">
              Cardiologist
            </h5>
          </div>
          <div class="m-md-4 m-lg-3">
            <img src="{{ url('img/profile.png') }}" class="image_box">
            <h5 class="image_box_name">
              Cardiologist
            </h5>
          </div>
          <div class="m-md-4 m-lg-3">
            <img src="{{ url('img/profile.png') }}" class="image_box">
            <h5 class="image_box_name">
              Cardiologist
            </h5>
          </div>
        </div>
      </div>
    </div>
  </div>

    <div class="col-lg-4 col-md-12">
      <img style="width: 100%;" src="{{ url('img/doctor.jpg') }}">
      <div class="col-lg-12 process_block">
        <p class="process_block_heading">
          Complete Signup Process <i class="fa fa-angle-right" aria-hidden="true"></i>
        </p>
        <div class="unprogress">
          <div class="progree_get">
          </div>
          <p class="progress_value">
            55%
          </p>
        </div>
      </div>
      <div class="your_doctors">
        <h4 class="your_doctors_heading">
          Your doctor
        </h4>
        <div>
          <h4 class="doctor_heading1">
            Dr.Joanne Baptiste<i class="fa fa-ellipsis-h doctor_edit float-right" aria-hidden="true"></i>
          </h4>
          <p class="doctor_subheading">
            General Practitioner
          </p>
        </div>

        <div class="bottombar">
          <h4 class="doctor_heading1">
            Dr.Joanne Baptiste<i class="fa fa-ellipsis-h doctor_edit float-right" aria-hidden="true"></i>
          </h4>
          <p class="doctor_subheading">
            General Practitioner
          </p>
        </div>

      </div>
    </div>
  </div>
  </div>
  </div>
  </div>
  </div>

@endsection
@include('patient.includes.footer')