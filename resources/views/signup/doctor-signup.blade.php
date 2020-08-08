@extends('main-layout.master')

@section('content')
<div class="form-box registration-page">
    <div class="container">
      <header>
        <div class="row">
        <div class="col-3 col-lg-3">
          <div class="logo-wrap">
            <img src="{{ url('img/logo.png') }}">
          </div>
        </div>
        <div class="col-9 col-lg-9">
          <div class="text-right signup-wrap">
            <a href="{{url('doctor/login')}}" class="border btn border-primary">Doctor Login</a>
          </div>
        </div>
      </div>
      </header>
      <div class="bg-light">
        <div class="text-center heading-wrap">
          <h2>Doctor Registration</h2>
          <p>Lorem Ipsum is simply dummy text of the typesetting industry.</p>
        </div>
        <div class="mx-auto form-wrap-container">
          <form name="doc_registration_form" id='registration_form' method="POST" action="{{url('doctor/signup')}}" enctype="multipart/form-data">
             @csrf
             @if($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{!! $error !!}</li>  
                  @endforeach
                </ul>
                </div>
            @endif
            @if(session()->has('success'))
              <div class="text-center alert alert-success">
                   {{ session()->get('success') }}
                </div>
            @endif
            <div class="row">
              <div class="form-group col-lg-12">
                <label for="UserName">Name</label>
                <div class="row">
                    <div class="form-group col-sm-6 col-lg-6">
                      <input type="text" class="form-control" id="fname" name="first_name" value="{{old('first_name')}}" placeholder="first name" required 
                        data-parsley-required="true" data-parsley-pattern="/^[A-Za-z]+$/" data-parsley-trigger="change" data-parsley-minlength="2">
                    </div>
                    <div class="form-group col-sm-6 col-lg-6">
                      <input type="text" class="form-control" id="lname" name="last_name" value="{{old('last_name')}}" placeholder="last name" required 
                        data-parsley-required="true"data-parsley-pattern="/^[A-Za-z]+$/" data-parsley-trigger="change" data-parsley-minlength="2">
                    </div>
                </div>
              </div>

              <div class="form-group col-sm-6 col-lg-6">
                <label for="phone">Phone number</label>
                <div class="countries-box">
                  <select name="countries" id="countries">
                    <option value='ad' data-image="/img/blank.gif" data-imagecss="flag ad" data-title="Andorra">Andorra</option>
                    <option value='ae' data-image="/img/blank.gif" data-imagecss="flag ae" data-title="United Arab Emirates">United Arab Emirates</option>
                    <option value='af' data-image="/img/blank.gif" data-imagecss="flag af" data-title="Afghanistan">Afghanistan</option>
                    <option value='ag' data-image="/img/blank.gif" data-imagecss="flag ag" data-title="Antigua and Barbuda">Antigua and Barbuda</option>
                    <option value='ai' data-image="/img/blank.gif" data-imagecss="flag ai" data-title="Anguilla">Anguilla</option>
                    <option value='al' data-image="/img/blank.gif" data-imagecss="flag al" data-title="Albania">Albania</option>
                    <option value='am' data-image="/img/blank.gif" data-imagecss="flag am" data-title="Armenia">Armenia</option>
                    <option value='an' data-image="/img/blank.gif" data-imagecss="flag an" data-title="Netherlands Antilles">Netherlands Antilles</option>
                    <option value='ao' data-image="/img/blank.gif" data-imagecss="flag ao" data-title="Angola">Angola</option>
                    <option value='aq' data-image="/img/blank.gif" data-imagecss="flag aq" data-title="Antarctica">Antarctica</option>
                    <option value='ar' data-image="/img/blank.gif" data-imagecss="flag ar" data-title="Argentina">Argentina</option>
                    <option value='in' data-image="/img/blank.gif" data-imagecss="flag in" data-title="India" selected="selected">India</option>
                  </select>
                  <input type="tel" class="form-control" id="phone" name ="phone" value="{{old('phone')}}" placeholder="+ 1 786 453 3242" required
                  data-parsley-required="true" data-parsley-type="tel" data-parsley-trigger="change" data-parsley-pattern="^[\d\+\-\.\(\)\/\s]*$">
                </div>
              </div>

              <div class="form-group col-sm-6 col-lg-6">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="Email Address" required
                    data-parsley-required="true" data-parsley-type="email" data-parsley-trigger="change">
              </div>

              <div class="form-group col-lg-12">
                <label for="hadd">Home Address</label>
                <input type="text" class="form-control" id="hadd" name="address" value="{{old('address')}}" placeholder="Home Address" minlength="3"
                    data-parsley-required="true" data-parsley-trigger="change" data-parsley-minlength="3">
              </div>

              <div class="form-group col-sm-6 col-lg-4">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" name="city" value="{{old('city')}}" placeholder="City" minlength="3"
                    data-parsley-required="true" data-parsley-trigger="change" data-parsley-minlength="3">
              </div>

              <div class="form-group col-sm-6 col-lg-4">
                <label for="state">State</label>
                <input type="text" class="form-control" id="state" name="state" value="{{old('state')}}" placeholder="State" minlength="3"
                    data-parsley-required="true" data-parsley-trigger="change" data-parsley-minlength="3">
              </div>

              <div class="form-group col-sm-12 col-lg-4">
                <label for="post">Post/ZIP Code</label>
                <input type="text" class="form-control" id="post" name="postal_code" value="{{old('postal_code')}}" placeholder="Post/ZIP Code"
                    data-parsley-required="true" data-parsley-type="digits" data-parsley-trigger="change">
              </div>

              <div class="form-group col-lg-12">
                <label for="spe">Specialization</label>
                <select class="form-control js-special-tags" id="speciality" name="speciality" required="" data-parsley-required="true">
                  <option value="" selected="selected">Choose one...</option>
                  <option value="1">select 1</option>
                  <option value="2">select 2</option>
                  <option value="3">select 3</option>
                  <option value="4">select 4</option>
                  <option value="5">select 5</option>
                </select>
              </div>
              
              <div class="form-group col-lg-12">
                <label for="pwd">Enter Password</label>
                <input type="password" class="form-control" id="pwd" name="password" placeholder="" minlength="6" required
                    data-parsley-required="true" data-parsley-minlength="6" data-parsley-trigger="change">
              </div>

              <div class="form-group col-lg-12">
                <label for="cpwd">Confirm Password</label>
                <input type="password" class="form-control" id="cpwd" name="password_confirmation" placeholder=""
                    data-parsley-equalto="#pwd" data-parsley-trigger="change">
              </div>


              <div class="text-center verification-wrap">
                <div class="title"><h5>Verification</h5></div>
                <p>We're delighted to have you on board and can't wait for you to get started with Smart Doctors. Simply upload your medical credentials (photo of degree, medical registration number if applicable) and a government issued photo ID.</p>
              </div>

              <div class="file-upload-wrap form-group col-lg-12">
                <div class="file-upload">
                  <div class="file-select">
                    <div class="file-select-name" id="noFile">Medical Registration Proof</div> 
                    <div class="file-select-button" id="medical_registration">Choose File...</div>
                    <input type="file" name="medical_registration" >
                  </div>
                </div>

                <div class="file-upload">
                  <div class="file-select">
                    <div class="file-select-name" id="noFile">Medical Degree Certification Proof</div> 
                    <div class="file-select-button" id="medical_degree">Choose File...</div>
                    <input type="file" name="medical_degree" required
                    data-parsley-required="true" data-parsley-type="file" data-parsley-trigger="change">
                  </div>
                </div>

                <div class="file-upload">
                  <div class="file-select">
                    <div class="file-select-name" id="noFile">Government-Issued Photo ID Proof</div> 
                    <div class="file-select-button" id="medical_proof">Choose File...</div>
                    <input type="file" name="medical_proof" >
                  </div>
                </div>
              </div>
              <div class="text-center btn-wrap col-12">
                <button type="submit" class="btn btn-info btn-lg">Submit Registration</button>
              </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
<script src="{{ asset('js/parsley.min.js') }}"></script>
<script>
$(document).ready(function($) {
  $("#countries").msDropdown();  

  $('#registration_form').parsley().on('field:validated', function() {
    var ok = $('.parsley-error').length === 0;
  });

  $('#chooseFile').bind('change', function () {
    var filename = $("#chooseFile").val();
    if (/^\s*$/.test(filename)) {
      $(".file-upload").removeClass('active');
      $("#noFile").text("No file chosen..."); 
    }
    else {
      $(".file-upload").addClass('active');
      $("#noFile").text(filename.replace("C:\\fakepath\\", "")); 
    }
  });
});



</script>
@endsection