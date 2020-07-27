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
            <a href="#" class="btn border border-primary">Doctor Signup</a>
          </div>
        </div>
      </div>
      </header>
      <div class="bg-transparent">
        <div class="heading-wrap text-center">
          <h1>Doctor Login</h1>
        </div>

      
        <div class="form-wrap-container mx-auto">
          <form name="user_registration_form" id='registration_form' post="#">
            <div class="row">
              <div class="form-group col-lg-12">
                <label for="UserName">Email / User ID</label>
                <div class="row">
                    <div class="form-group col-12">
                      <input type="email" class="form-control" id="email" value="{{old('email')}}" placeholder="Enter your email address or user ID">
                    </div>
                </div>
              </div>

              
              <div class="form-group col-lg-12">
                <label for="pwd">Password</label>
                <input type="text" class="form-control" id="pwd" placeholder="Enter your password">
              </div>
              
              <div class="btn-wrap text-center col-12">
                <button type="submit" class="btn btn-info btn-lg">login</button>
              </div>

              <div class="form-group col-lg-12 fpass">
                <span> Not a doctor yet? <a href="#">Sign up</a></span>
                <a href="#">Forgot Password?</a>
              </div>
            </div>
          </form>
          
        </div>
      </div>
    </div>
  </div>
@endsection