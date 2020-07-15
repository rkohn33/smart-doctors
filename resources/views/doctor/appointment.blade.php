@extends('main-layout.master')

@section('content')

<div class="s-layout">
@include('doctor.includes.side-nav-bar')
@include('doctor.includes.header')

<div class="content">
    <div class="row m-3">
        <div class="col-md-4">
          <div class="avail-header">Calendar</div>
          <div class="yellow">
            <div id="calendar">
              <div id="toolbar"></div>
              <div id="dates" class="show">
                <div id="lastMt">&lsaquo;</div>
                <div id="nextMt">&rsaquo;</div>
                <div id="months-cont">
                  <div id="months">
                    <span class="active month">January</span><span class="month">February</span><span
                      class="month">March</span><span class="month">April</span><span class="month">May</span><span
                      class="month">June</span><span class="month">July</span><span class="month">August</span><span
                      class="month">September</span><span class="month">October</span><span
                      class="month">November</span><span class="month">December</span>
                  </div>
                </div>
                <div id="daysotweek">
                  <div class="day">S</div>
                  <div class="day">M</div>
                  <div class="day">T</div>
                  <div class="day">W</div>
                  <div class="day">T</div>
                  <div class="day">F</div>
                  <div class="day">S</div>
                </div>
                <div id="days">
                </div>
              </div>
            </div>

          </div>

          <div class="card align">
            <div class="card-header">Next consultation</div>
            <div class="card-body">
              <h6 class="next-name">Peter Thomas</h6>
              <p class="next-time">10:30 AM</p>
              <button class="start-now float-left"><span class="pr-2">Start Now</span>
              <img src="{{ url('img/white-arrow.svg') }}"></button>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="avail-header">June 11, 2020</div>
          <div class="card card-width">
            <div class="card-head py-3 px-3">
              Appointments
              <select class="day-dropdown float-right p-1">
                <option>Today <img src="{{ url('img/dropdown.svg') }}"></option>
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
                <tr class="appoint-info">
                  <td>Shwetha</td>
                  <td>Consultation</td>
                  <td>10/22/2020</td>
                  <td>10AM</td>
                </tr>
              </tbody>

            </table>
            <br><br><br><br><br><br>
            <div class="p-4">
              <button class="next-btn float-right"><span class="pr-2">Next</span><img src="{{ url('img/next.svg') }}"></button>

              <div class="text-center"> <img src="{{ url('img/results.svg') }}">
                <button class="next-btn float-left"><img src="{{ url('img/prev.svg') }}"><span class="pl-2">Previous</span></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection