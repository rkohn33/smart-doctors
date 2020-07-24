@extends('main-layout.master')

@section('content')
@include('doctor.includes.side-nav-bar')
@include('doctor.includes.header')

<div class="content-wrapper">
    <div class="page-header">
        <div class="container">
          <h1>Availability</h1>
        </div>
      </div>
    <div class="container">

      <div class="row">
        <div class="calendar-box col-lg-4">
           <div class="heading-wrap">
            <h5>Calendar</h5>
          </div>
            <div class="card">
              <div id="calendar"></div>
            </div>
        </div>

        <div class="appointments-box col-lg-8">
          <div class="heading-wrap">
            <h5>June 11, 2020</h5>
          </div>
          <div class="card">
            <div class="time-slice day">
              <div class="card-header">
                  <h1><span></span>Morning</h1>
                  <a href="#">+ ADD SLOT </a>
                  <p>9:00 AM to 12:00 PM</p>
              </div>
              <div class="card-body">
                <div class="tags">
                    <a href="#" class="success"><i class="fa fa-angle-right" aria-hidden="true"></i> 9:00 AM</a>
                    <a href="#" class="success"><i class="fa fa-angle-right" aria-hidden="true"></i> 9:10 AM</a>
                    <a href="#" class="success"><i class="fa fa-angle-right" aria-hidden="true"></i> 9:20 AM</a>
                    <a href="#" class="success"><i class="fa fa-angle-right" aria-hidden="true"></i> 9:30 AM</a>
                    <a href="#" class="success"><i class="fa fa-angle-right" aria-hidden="true"></i> 9:40 AM</a>
                    <a href="#" class="success"><i class="fa fa-angle-right" aria-hidden="true"></i> 9:50 AM</a>
                    <a href="#" class="success"><i class="fa fa-angle-right" aria-hidden="true"></i> 10:00 AM</a>
                    <a href="#" class="success"><i class="fa fa-angle-right" aria-hidden="true"></i> 10:10 AM</a>
                    <a href="#" class="success"><i class="fa fa-angle-right" aria-hidden="true"></i> 10:20 AM</a>
                    <a href="#" class="success"><i class="fa fa-angle-right" aria-hidden="true"></i> 10:30 AM</a>
                </div>
              </div>
            </div>

            <div class="time-slice night">
              <div class="card-header">
                  <h1><span></span>evening</h1>
                  <a href="#">+ ADD SLOT </a>
                  <p>9:00 AM to 12:00 PM</p>
              </div>
              <div class="card-body">
                <div class="tags">
                    <a href="#" class="success"><i class="fa fa-angle-right" aria-hidden="true"></i> 5:00 AM</a>
                    <a href="#" class="success"><i class="fa fa-angle-right" aria-hidden="true"></i> 5:10 AM</a>
                    <a href="#" class="success"><i class="fa fa-angle-right" aria-hidden="true"></i> 5:20 AM</a>
                    <a href="#" class="success"><i class="fa fa-angle-right" aria-hidden="true"></i> 5:30 AM</a>
                    <a href="#" class="success"><i class="fa fa-angle-right" aria-hidden="true"></i> 5:40 AM</a>
                    <a href="#" class="success"><i class="fa fa-angle-right" aria-hidden="true"></i> 5:50 AM</a>
                    <a href="#" class="success"><i class="fa fa-angle-right" aria-hidden="true"></i> 6:00 PM</a>
                    <a href="#" class="success"><i class="fa fa-angle-right" aria-hidden="true"></i> 6:10 PM</a>
                    <a href="#" class="success"><i class="fa fa-angle-right" aria-hidden="true"></i> 6:20 PM</a>
                </div>
              </div>
            </div>
            <div class="card-footer small text-muted">
              <div class="row align-items-center">
                <div class="col-sm-6 col-lg-6">
                  <p><i class="fa fa-clock-o"></i> Waiting List</p>
                </div>
                <div class="col-sm-6 col-lg-6">
                  <a class="btn btn-info" href="">Add to waitlist <i class="fa fa-angle-right" aria-hidden="true"></i> </a>
                </div>
              </div>

          </div>
      </div>
    </div>
  </div>

@include('doctor.includes.footer')
@endsection
