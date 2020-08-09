@extends('main-layout.master')
@section('css')
<link rel="stylesheet" href="{{ asset('itel/css/intlTelInput.css') }}">
@endsection
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
              <a href="{{url('patient/login')}}" class="border btn border-primary">Patient Login</a>
            </div>
          </div>
        </div>
      </header>
      <div class="bg-light">
        <div class="text-center heading-wrap">
          <h2>New Patient Registration</h2>
          <p>We need a few details to get your first consultation scheduled.</p>
        </div>

        <div class="mx-auto form-wrap-container">
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
          <div class="social-login"> 
            <div class="row">
              <div class="col-sm-6 col-lg-6 social-link">
              <a class="btn btn-lg btn-google btn-block text-uppercase btn-outline" href="#">
                <img src="/img/google-icon.png">Sign up with Google</a>
              </div>
              <div class="col-sm-6 col-lg-6 social-link">
                <a class="btn btn-lg btn-google btn-block text-uppercase btn-outline" href="#">
                <img src="/img/facebook-icon.png"> Sign up with Facebook</a> </div>
            </div>
          <form name="patient_registration_form" method="POST" id='registration_form' action="{{url('patient/signup')}}" post="#">
            @csrf
            <div class="row">
              <div class="pt-3 form-group col-lg-12">
                <label for="UserName">Name</label>
                <div class="row">
                    <div class="form-group col-sm-6 col-lg-6">
                      <input tabindex="1" type="text" class="form-control" id="fname" value="{{old('first_name')}}" name="first_name" placeholder="First Name" minlength="2" required 
                          data-parsley-required="true" data-parsley-pattern="/^[A-Za-z]+$/" data-parsley-trigger="change" data-parsley-minlength="2">
                    </div>
                    <div class="form-group col-sm-6 col-lg-6">
                      <input tabindex="2" type="text" class="form-control" id="lname" value="{{old('last_name')}}" name="last_name" placeholder="Last Name" minlength="2" required 
                          data-parsley-required="true" data-parsley-pattern="/^[A-Za-z]+$/" data-parsley-trigger="change" data-parsley-minlength="2">
                    </div>
                </div>
              </div>

              <div class="form-group col-lg-12">
                <label for="phone">Phone number</label>
                <input tabindex="3" type="tel" class="form-control" id="phone" name ="phone" value="{{old('phone')}}" required 
                  data-parsley-phone="" data-parsley-trigger="change" data-parsley-required="true">
              </div>

              <div class="form-group col-lg-12">
                <label for="email">Email Address</label>
                <input tabindex="4" type="email" class="form-control" name="email" id="email" value="{{old('email')}}" placeholder="Enter your email address" required 
                    data-parsley-required="true" data-parsley-type="email" data-parsley-trigger="change">
              </div>
              
              <div class="form-group col-lg-12">
                <label for="pwd">Choose Password</label>
                <input tabindex="5" type="password" class="form-control" id="pwd" name="password" placeholder="At least 6 character." required minlength="6"
                    data-parsley-required="true" data-parsley-trigger="change" data-parsley-minlength="2">
              </div>

              <div class="form-group col-lg-12">
                <label for="cpwd">Confirm Password</label>
                <input tabindex="6" type="password" class="form-control" id="cpwd" name="password_confirmation" placeholder="Retype password."
                    data-parsley-equalto="#pwd" data-parsley-trigger="change">
              </div>
              
              <div class="text-center btn-wrap col-12">
                <button tabindex="7" type="submit" class="btn btn-info btn-lg">Register</button>
              </div>
          </div>
        </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
<script src="{{ asset('itel/js/intlTelInput.js') }}"></script>
<script src="{{ asset('js/parsley.min.js') }}"></script>
<script>
  var input = document.querySelector("#phone");
  var iti = intlTelInput(input, {
    initialCountry: "auto",
    utilsScript: "{{ asset('itel/js/utils.js') }}",
  });

  $(document).ready(function($) {
    Parsley.addValidator('phone', {
      validateString: function(value) {
        return iti.isValidNumber();
      },
      messages: {en: 'Provide number with country code.'},
    });
    
    $('#registration_form').parsley().on('field:validated', function() {
      var ok = $('.parsley-error').length === 0;
    }).on('field:submit', function(){
      console.log('submit form');
      return false;
    });
  });

</script>
@endsection