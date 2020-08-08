@extends('main-layout.master')

@section('content')
<div class="form-box registration-page">
    <div class="container">
      <header>
        <div class="row">
        <div class="col-3 col-lg-3">
          <div class="logo-wrap">
            <img src="/img/logo.png">
          </div>
        </div>
        <div class="col-9 col-lg-9">
          <div class="signup-wrap text-right">
            <a href="#" class="btn border border-primary">Patient Signup</a>
          </div>
        </div>
      </div>
      </header>
      <div class="bg-transparent">
        <div class="heading-wrap text-center">
          <h1>Welcome back</h1>
        </div>

      
        <div class="form-wrap-container mx-auto">
        <form method="POST" id='registration_form' action="{{ url('patient/login') }}">
         @csrf
            <div class="row">
              <div class="form-group col-lg-12">
                <label for="UserName">Email / User ID</label>
                <div class="row">
                    <div class="form-group col-12">
                      <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address or user ID">
                    </div>
                </div>
              </div>

              <input type="hidden" name="user_type" value="patient">
              <div class="form-group col-lg-12">
                <label for="pwd">Choose Password</label>
                <input type="password" class="form-control" id="pwd" name="password"  placeholder="Enter your password">
              </div>
              
              <div class="btn-wrap text-center col-12">
                <button type="submit" class="btn btn-info btn-lg">login</button>
              </div>

              <div class="form-group col-lg-12 text-right fpass">
                <a href="#">Forgot Password?</a>
              </div>
            </div>
          </form>
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
        </div>
        </div>
      </div>
    </div>
  </div>

@endsection