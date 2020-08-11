
@extends('main-layout.patient.master')

@section('content')
@include('patient.includes.header')
@include('patient.includes.side-nav-bar')

<div style="background-color:#f5f5f5">
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-12">
        <div class="float-left mt-5">
          <div class="float-left col-12 col-lg-12">
            <h1 class="">Hello,Jhon!</h1>
            <p class="">we are happy to help you stay healthy</p>
          </div>
        </div>
        <div class="float-left p-0 col-12 col-lg-12 ">
          <div class="p-0 input-group col-lg-9 col-12">

            <span class="p-0 mt-3 col-lg-9 m-md-0">
            <div class="custom_row">
              <i class="mt-3 ml-3 fa fa-search" aria-hidden="true"></i>

              <input type="text" style="border: none; height: 49px; width: 77%; " class="mr-lg-2 form-control search_bar" placeholder="Doctor,Speciality,etc"
                aria-label="Username">
              <div class=" round_circle">
                <i class="fa fa-angle-right fa-2x custom_margen color" aria-hidden="true"></i>

              </div>
            </div>
          </span>
        </div>
        <table class="table float-left p-0 mt-4 col-lg-12 col-12 tablebordered">
          <thead>
            <tr>
              <th class="appointment_heading">Appointement</th>
            </tr>
          </thead>
          <tbody>
            <tr class="hov">
              <td>
                <div class="row ">
                  <div class="ml-3 col-lg-7 col-md-6">
                    <h5 class="m-0 text_one">Gernal Appointement </h5>
                    <p class="text_two"> Dr.Jonne baptisite</p>
                  </div>
                  <div class="pl-4 col-lg-5 col-md-6 row ">
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
            <div class="ml-3 col-lg-6 col-md-6">
              <h5 class="text_one">COVID Assessement </h5>
              <h6 class="text_two"> Dr.Jonne baptisite</h6>
            </div>
            <div class="float-right pr-5 col-lg-5 col-md-6">
              <div class="float-right box_style">
                <h5 class="text_five">07/07/2020 <i class="ml-1 fa fa-calendar" style="color: #07d1ff;"
                    aria-hidden="true"></i> </h5>
                <h6 class="text_six">3:00 PM <i class="ml-4 fa fa-clock-o" style="color: #07d1ff;"
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
          <div class="m-4 ">
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
          <div class="progree_get" style="width: 0;"></div>
          <p class="progress_value">0%</p>
        </div>
      </div>
      <div class="your_doctors">
        <h4 class="your_doctors_heading">Your doctor</h4>
        <div id="your-doctor-list-container"></div>
      </div>
    </div>
  </div>
  </div>
  </div>
  </div>
  </div>
<p id="asset-url" data-asset="{{ asset('') }}" hidden></p>
@endsection
@include('patient.includes.footer')
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js" integrity="sha512-rmZcZsyhe0/MAjquhTgiUcb4d9knaFc7b5xAfju483gbEXTkeJRUMIPk6s3ySZMYUHEcjKbjLjyddGWMrNEvZg==" crossorigin="anonymous"></script>
<script src="{{ asset('js/patient.data.js') }}" type="text/javascript"></script>
<script>
jQuery(document).ready(async function($){
    let assetUrl = $('#asset-url').data('asset');
    let patientData = PatientData();

    // render profile progress
    patientData.getProfileCompletion().catch(error=>console.log(error)).then(progress=>populateProgress(progress));

    // render my doctor
    patientData.getMyDoctors().catch(error=>console.log(error)).then(doctors=>patientData.populateYourDoctor(doctors, $('#your-doctor-list-container')));    

    function populateProgress(progress){
      $('.process_block .progree_get').attr('style', `width: ${progress};`);
      $('.process_block .progress_value').text(progress);
    }    
}) // End jQuery block
</script>
@endsection