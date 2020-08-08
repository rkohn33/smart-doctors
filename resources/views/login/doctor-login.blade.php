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
            <a href="{{ url('doctor/signup') }}" class="btn border border-primary">Doctor Signup</a>
          </div>
        </div>
      </div>
      </header>
      <div class="bg-transparent">
        <div class="heading-wrap text-center">
          <h1>Doctor Login</h1>
        </div>
      
        <div class="form-wrap-container mx-auto">
        <form method="POST" id='registration_form' action="{{ url('doctor/login') }}">
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
            <div class="row">
              <div class="form-group col-lg-12">
                <label for="UserName">Email / User ID</label>
                <div class="row">
                    <div class="form-group col-12">
                      <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="Enter your email address or user ID">
                    
                    </div>
                </div>
              </div>

              <input type="hidden" name="user_type" value="doctor">
              <div class="form-group col-lg-12">
                <label for="pwd">Password</label>
                <input type="password" class="form-control" id="pwd" name="password" placeholder="Enter your password">
              </div>
              
              <div class="btn-wrap text-center col-12">
                <button type="submit" class="btn btn-info btn-lg">login</button>
              </div>

              <div class="form-group col-lg-12 fpass">
                <span> Not a doctor yet? <a href="{{ url('doctor/signup') }}">Sign up</a></span>
                <a href="#">Forgot Password?</a>
              </div>
            </div>
          </form>
          
        </div>
      </div>
    </div>
  </div>
@endsection