
@extends('main-layout.patient.master')

@section('content')
@include('patient.includes.header')
@include('patient.includes.side-nav-bar')

<div style="background-color:#f5f5f5">

<div class="container">
    <div class="row">
      <div class="col-lg-8 col-12">
        <div class="mt-5 float-left">
          <div class="col-12 p-0 col-lg-12 float-left">
            <h1 class="">Hello,Jhon!</h1>
            <p class="">we are happy to help you stay healthy</p>
          </div>
        </div>
        <div class="col-lg-12 pr-0 row col-12 float-left ">


          <span class="col-lg-6 p-0  mt-3">
            <div class="custom_row">
              <i class="fa fa-search ml-3 mt-3" aria-hidden="true"></i>

              <input type="text" style="border: none; height: 49px; width: 77%; " class="mr-lg-2 form-control search_bar" placeholder="Doctor,Speciality,etc"
                aria-label="Username">
              <div class=" round_circle">
                <i class="fa fa-angle-right fa-2x color" style="margin-left: 11px; margin-top: 1px;" aria-hidden="true"></i>

              </div>
            </div>
          </span>

          <span class="col-lg-3 col-12 p-0 ml-lg-3 mt-3">
            <input class="date_and_time" type="date">
          </span>

          <span class="col-lg-2 col-12  pl-0 ml-lg-3 pr-0 mt-3">
            <input class="date_and_time" type="time">
          </span>
          <div>


          </div>
          <h4 class="provider_style">Providers Found <a class="provider_code_style" style="color: gray;">(15)</a></h4>
        </div>
        <table class="col-12 p-0 mt-4 float-left table tablebordered">
          <!-- <thead>
             <tr>
              <th class="appointment_heading">Appointement</th>
            </tr>
          </thead> -->
          <tbody>
            <tr>
              <td>
                <div class="row ">
                  <div class="col-lg-8 col-12 p-lg-0 p-0 ml-lg-3 ml-2 row">
                    <img src="{{ url('img/profile.png') }}" class="col-md-2 p-0 ml-lg-0 ml-2 dr_image">
                    <div class="pl-lg-4 p-2 col-md-10 col-12   mt-2">
                      <div class="row col-12 p-0 ml-md-0 ml-0">
                        <h5 class="text_one p-0 m-0">Dr.Jonne </h5>
                        <div class="varification_status ml-3 row mt-1 pt-0">
                          <i class="fa fa-check ml-1 " style="margin-top: 2px; color: green;" aria-hidden="true"></i>
                          <h6 class="ml-1" style="font-size: 14px;font-weight: 600;color: green; margin-top: 2px;">
                            VERIFID</h6>
                        </div>
                      </div>
                      <div class="row  col-12 pl-lg-3 mt-2 mb-2">
                        <div class="col-6 p-0">
                          <p class="text_two">Qualification </p>
                          <p class="text_two"> Speciality</p>
                          <p class="text_two">Experence </p>
                          <p class="text_two">Language </p>
                        </div>
                        <div class=" col-6 p-0">
                          <p class="text_two">BDS, MDS, PHD </p>
                          <p class="text_two"> Dentist</p>
                          <p class="text_two">2+ year </p>
                          <p class="text_two">English, hindi </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class=" col-lg-3 ml-lg-5 pl-lg-5">

                    <button class="btn btn-info mb-3 col-lg-12 col-md-12 col-12 " href="">Join Now <i
                        class="fa fa-angle-right" aria-hidden="true"></i>
                    </button>
                    <button style="border: 2px solid #07d1ff;"  class="col-12 col-lg-12 col-md-12  btn btn-light mb-3 "
                      href="">Availability <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </button>
                    <button style="border: 2px solid #07d1ff;"
                      class=" col-12 col-lg-12 col-md-12  btn btn-light mb-3 mb-lg-0 " href="">view profile <i
                        class="fa fa-angle-right" aria-hidden="true"></i>
                    </button>

                  </div>
                </div>
      </div>
      </td>
      </tr>

      <tr>
        <td>
          <div class="row ">
            <div class="col-lg-8 col-12 p-lg-0 p-0 ml-lg-3 ml-2 row">
              <img src="{{ url('img/profile.png') }}" class="col-md-2 p-0 ml-lg-0 ml-2 dr_image">
              <div class="pl-lg-4 p-2 col-md-10 col-12   mt-2">
                <div class="row col-12 p-0 ml-md-0 ml-0">
                  <h5 class="text_one p-0 m-0">Dr.Jonne </h5>
                  <div class="varification_status ml-3 row mt-1 pt-0">
                    <i class="fa fa-check ml-1 " style="margin-top: 2px; color: green;" aria-hidden="true"></i>
                    <h6 class="ml-1" style="font-size: 14px;font-weight: 600;color: green; margin-top: 2px;">
                      VERIFID</h6>
                  </div>
                </div>
                <div class="row  col-12 pl-lg-3 mt-2 mb-2">
                  <div class="col-6 p-0">
                    <p class="text_two">Qualification </p>
                    <p class="text_two"> Speciality</p>
                    <p class="text_two">Experence </p>
                    <p class="text_two">Language </p>
                  </div>
                  <div class=" col-6 p-0">
                    <p class="text_two">BDS, MDS, PHD </p>
                    <p class="text_two"> Dentist</p>
                    <p class="text_two">2+ year </p>
                    <p class="text_two">English, hindi </p>
                  </div>
                </div>
              </div>
            </div>
            <div class=" col-lg-3 ml-lg-5 pl-lg-5">

              <button class="btn btn-info mb-3 col-lg-12 col-md-12 col-12 " href="">Join Now <i
                  class="fa fa-angle-right" aria-hidden="true"></i>
              </button>
              <button style="border: 2px solid #07d1ff;" class="col-12 col-lg-12 col-md-12  btn btn-light mb-3 "
                href="">Availability <i class="fa fa-angle-right" aria-hidden="true"></i>
              </button>
              <button style="border: 2px solid #07d1ff;"
                class=" col-12 col-lg-12 col-md-12  btn btn-light mb-3 mb-lg-0 " href="">view profile <i
                  class="fa fa-angle-right" aria-hidden="true"></i>
              </button>

            </div>
          </div>
    </div>
    </td>
    </tr>





    </tbody>
    </table>
    <div class="mt-5">

    </div>

  </div>






  <div class="col-lg-4 col-12">
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
    <div class="your_doctors" style="height:auto;">
      <h4 class="your_doctors_heading">
        Your doctor
      </h4>
      <h4 class="doctor_heading">
        Dr.Joanne Baptiste<i class="fa fa-ellipsis-h doctor_edit" aria-hidden="true"></i>
      </h4>
      <p class="doctor_subheading">
        General Practitioner
      </p>
      <div class="bottombar">
        <h4 class="doctor_heading1">
          Dr.Joanne Baptiste<i class="fa fa-ellipsis-h doctor_edit" aria-hidden="true"></i>
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

