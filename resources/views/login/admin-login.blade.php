@extends('main-layout.master')

@section('content')
@include('doctor.includes.header')

<div class="container login-container">
  <div class="row d-flex justify-content-center">
     <div class="col-sm-10 col-md-6 login-form-1" style="background-color: #F5F8FF;">
        <h3>Admin Login</h3>
        <form method="POST" id='registration_form' action="{{ url('admin/login') }}">
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
           <div class="form-row">
              <div class="form-group col-md-12">
                 <label for="email">Email</label>
                 <input type="email" class="form-control" name="email" placeholder="Email" autofocus>
              </div>
              <div class="form-group col-md-12">
                 <label for="password">Password</label>
                 <input type="password" class="form-control" name="password" placeholder="Password">
              </div>
              <input type="hidden" name="user_type" value="admin">
           </div>
           <br>
           <input type="submit" class="btnSubmit" value="Login" />
           <br>
           <br>
        </form>
     </div>
  </div>
</div>
@endsection


@section('css')
  <style>
body {
	background-color: #fff;
}

.login-container {
	margin-top: 5%;
	margin-bottom: 5%;
}

.login-form-1 {
	padding: 5%;
	box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}

.login-form-1 h3 {
	text-align: center;
	color: #333;
}

.login-container form {
	padding-top: 10%;
	padding-bottom: 10%;
}

.btnSubmit {
	width: 100%;
	border-radius: 1rem;
	padding: 1.5%;
	border: none;
	cursor: pointer;
}

.login-form-1 .btnSubmit {
	font-weight: 600;
	color: #fff;
	background-color: #0062cc;
}

.login-form-1 .ForgetPwd {
	color: #0062cc;
	font-weight: 600;
	text-decoration: none;
}
  </style>    
@endsection
