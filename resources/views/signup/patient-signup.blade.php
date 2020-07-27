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
            <div class="signup-wrap text-right">
              <a href="{{url('patient/login')}}" class="btn border border-primary">Patient Login</a>
            </div>
          </div>
        </div>
      </header>
      <div class="bg-light">
        <div class="heading-wrap text-center">
          <h2>New Patient Registration</h2>
          <p>We need a few details to get your first consultation scheduled.</p>
        </div>

        <div class="form-wrap-container mx-auto">
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
            <div class="alert alert-success text-center">
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
              <div class="form-group col-lg-12 pt-3">
                <label for="UserName">Name</label>
                <div class="row">
                    <div class="form-group col-sm-6 col-lg-6">
                      <input type="text" class="form-control" id="fname" value="{{old('first_name')}}" name="first_name" placeholder="First Name">
                    </div>
                    <div class="form-group col-sm-6 col-lg-6">
                      <input type="text" class="form-control" id="lname" value="{{old('last_name')}}" name="last_name" placeholder="Last Name">
                    </div>
                </div>
              </div>

              <div class="form-group col-lg-12">
                <label for="phone">Phone number</label>
                <div class="countries-box">
                  <select id="countries">
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
                  <input type="text" class="form-control" name="phone" id="phone" value="{{old('phone')}}" placeholder="+ 1 786 453 3242">
                </div>
              </div>

              <div class="form-group col-lg-12">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}" placeholder="Enter your email address">
              </div>
              
              <div class="form-group col-lg-12">
                <label for="pwd">Choose Password</label>
                <input type="password" class="form-control" id="pwd" name="password" placeholder="••••••">
              </div>

              <div class="form-group col-lg-12">
                <label for="cpwd">Confirm Password</label>
                <input type="password" class="form-control" id="cpwd" name="password_confirmation" placeholder="••••••">
              </div>
              
              <div class="btn-wrap text-center col-12">
                <button type="submit" class="btn btn-info btn-lg">Register</button>
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
<script>
$(document).ready(function() {
	$("#countries").msDropdown();
});
</script>
@endsection