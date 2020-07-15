@extends('main-layout.master')

@section('content')

<div class="s-layout">
@include('doctor.includes.side-nav-bar')
@include('doctor.includes.header')

    <div class="content">
      <div class="row">
        <div class="col col-md-8">
          <div class="welcome pt-5">Welcome Back, Dr John</div>
          <div class="side-header">Here is your account at a glance.</div>
          <div class="card card-width card-top">
            <div class="card-head py-3 px-3">
              Appointments
                  <select class="day-dropdown float-right p-1">
                    <option>Today<img src="{{ url('img/dropdown.svg') }}"></option>
                    <option>July 1st</option>
                    <option>July 2nd</option>
                    <option>July 3rd</option>
                    <option>July 4th</option>
                    <option>July 5th</option>
                  </select>
            </div>

            <table class="card-table table">
              <thead>
                <tr class="table-title">
                  <th scope="col">NAME</th>
                  <th scope="col">TYPE</th>
                  <th scope="col">DATE</th>
                  <th scope="col">TIME</th>
                </tr>
              </thead>
              <tbody class="table-rows">
                <tr class="appoint-info">
                  <td>Mark</td>
                  <td>Consultation</td>
                  <td>10/22/2020</td>
                  <td>10AM</td>
                </tr>
                <tr class="appoint-info">
                  <td>Jacob</td>
                  <td>Consultation</td>
                  <td>10/22/2020</td>
                  <td>10AM</td>
                </tr>
                <tr class="appoint-info">
                  <td>Larry</td>
                  <td>Consultation</td>
                  <td>10/22/2020</td>
                  <td>10AM</td>
                </tr>

              </tbody>

            </table>
            <br><br><br><br>
            <div class="p-4">
              <button class="next-btn float-right"><span class="pr-2">Next</span><img src="{{ url('img/next.svg') }}"></button>

              <div class="text-center"> <img src="{{ url('img/results.svg') }}">
                <button class="next-btn float-left"><img src="{{ url('img/prev.svg') }}"><span class="pl-2">Previous</span></button>
              </div>
            </div>
          </div>
        </div>
        <div class="col col-md-4 doc-img">
          <div class="mt-200">
            <div class="card w-18">
              <div class="card-header">Next consultation</div>
              <div class="card-body">
                <h6 class="next-name">Peter Thomas</h6>
                <p class="next-time">10:30 AM</p>
                <button class="start-now float-left"><span class="pr-2">Start Now</span>
                <img src="{{ url('img/white-arrow.svg') }}"></button>
              </div>
            </div>

            <div class="card wallet-card">
              <div class="p-3">
                <select class="earnings-btn float-right p-1">
                  <option>Week <img src="{{ url('img/dropdown.svg') }}"></option>
                  <option>Month</option>
                  <option>Quarter</option>
                </select>
                <div class="earnings">$2,503</div>
                <div class="earnings-font">Earnings this week</div>
              </div>
              <img src="{{ url('img/card.svg') }}">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection