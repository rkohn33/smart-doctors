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
        </div>
        <div class="col-md-8">
          <div class="avail-header">June 11, 2020</div>
          <div class="card timings p-4">

            <div class="inline">

              <div class="inline">
                <img class="time-img" src="{{ url('img/Morning.svg') }}">
                <div class="time-heading">Morning</div>

              </div>
              <div class="float-right inline">
                <img class="inline" src="{{ url('img/add.svg') }}">
                <div class="add-slot">Add Slot</div>
              </div>
            </div>
            <div class="time">9:00 AM to 12:00 PM</div>
            <br>

            <div class="mx-auto">
              <div>
                <button class="time-btn"><span><img src="{{ url('img/arrow-next.svg') }}"></span>9:00AM</button>
                <button class="time-btn"><span><img src="{{ url('img/arrow-next.svg') }}"></span>9:00AM</button>
                <button class="time-btn"><span><img src="{{ url('img/arrow-next.svg') }}"></span>9:00AM</button>
                <button class="time-btn"><span><img src="{{ url('img/arrow-next.svg') }}"></span>9:00AM</button>
                <button class="time-btn"><span><img src="{{ url('img/arrow-next.svg') }}"></span>9:00AM</button>
              </div>
              <br>

              <div>
                <button class="time-btn"><span><img src="{{ url('img/arrow-next.svg') }}"></span>9:00AM</button>
                <button class="time-btn"><span><img src="{{ url('img/arrow-next.svg') }}"></span>9:00AM</button>
                <button class="time-btn"><span><img src="{{ url('img/arrow-next.svg') }}"></span>9:00AM</button>
                <button class="time-btn"><span><img src="{{ url('img/arrow-next.svg') }}"></span>9:00AM</button>
                <button class="time-btn"><span><img src="{{ url('img/arrow-next.svg') }}"></span>9:00AM</button>
              </div>
            </div>
            <br>
            <hr>
            <br>
            <div class="inline">

              <div class="inline">
                <img class="time-img" src="{{ url('img/Evening.svg') }}">
                <div class="time-heading">Evening</div>

              </div>
              <div class="float-right inline">
                <img class="inline" src="{{ url('img/add.svg') }}">
                <div class="add-slot">Add Slot</div>
              </div>
            </div>
            <div class="time">5:00 PM to 09:00 PM</div>
            <br>
            <div class="mx-auto">
              <div>
                <button class="time-btn"><span><img src="{{ url('img/arrow-next.svg') }}"></span>9:00AM</button>
                <button class="time-btn"><span><img src="{{ url('img/arrow-next.svg') }}"></span>9:00AM</button>
                <button class="time-btn"><span><img src="{{ url('img/arrow-next.svg') }}"></span>9:00AM</button>
                <button class="time-btn"><span><img src="{{ url('img/arrow-next.svg') }}"></span>9:00AM</button>
                <button class="time-btn"><span><img src="{{ url('img/arrow-next.svg') }}"></span>9:00AM</button>
              </div>

              <br>
              <div>
                <button class="time-btn"><span><img src="{{ url('img/arrow-next.svg') }}"></span>9:00AM</button>
                <button class="time-btn"><span><img src="{{ url('img/arrow-next.svg') }}"></span>9:00AM</button>
                <button class="time-btn"><span><img src="{{ url('img/arrow-next.svg') }}"></span>9:00AM</button>
                <button class="time-btn"><span><img src="{{ url('img/arrow-next.svg') }}"></span>9:00AM</button>
                <button class="time-btn"><span><img src="{{ url('img/arrow-next.svg') }}"></span>9:00AM</button>
              </div>
            </div>
            <br>
          </div>



        </div>

      </div>
    </div>
  </div>

@endsection