@extends('main-layout.master')

@section('content')
@include('doctor.includes.side-nav-bar')
@include('doctor.includes.header')

<div class="content-wrapper">

    <div class="container mt-4">

      <div class="row">
        <div class="calendar-box col-lg-4">
        <div class="heading-wrap">
            <h5>Calendar</h5>
          </div>
            <div class="card">
              <div id="calendar"></div>
            </div>

            <div class="card consultation mt-4 mb-4">
              <div class="card-header">
                <div class="title-tag">
                  <h5>Next consultation</h5>
                </div>
              </div>
              <div class="card-body">
                <h6><strong>Peter Thomas</strong></h6>
                <h4></strong>{{!empty($next_appointments['appointment']) ? date('H:i:s',strtotime($next_appointments['appointment'])): '00:00'}}</strong></h4>
              @if(!empty($next_appointments))
                <div class="btn-wrap">
                  <a class="btn btn-info" href="">Start now <i class="fa fa-angle-right" aria-hidden="true"></i> </a>
                </div>
              @endif
              </div>
            </div>

        </div>


        <div class="appointments-box col-lg-8">
          <div class="heading-wrap">
            <h5>{{now()->format('F d, Y')}}</h5>
          </div>
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
              <div class="col-sm-10 col-lg-10 title-tag p-0">
                <h5 class="ml-1">Appointments</h5>
              </div>
              <div class="col-sm-2 col-lg-2 day-box p-0">
                <select class="form-control js-special-tags">
                  <option selected="selected">Today</option>
                  <option>select 1</option>
                  <option>select 2</option>
                  <option>select 3</option>
                  <option>select 4</option>
                  <option>select 5</option>
                </select>
              </div>
            </div>
            </div>
            <div style="overflow-x:auto;">
                <table id="myTable" class="table table-hover">
                  <thead>
                    <tr>
                      <th>NAME</th>
                      <th>TYPE</th>
                      <th>DATE</th>
                      <th>TIME</th>
                    </tr>
                  </thead>
                  <tbody>

              @if(isset($appointments) && !empty($appointments))
              @php
                 $lists = collect($appointments->items())->toArray();
              @endphp
              @if(!empty($lists))
              @foreach($lists as $key => $app)

                    <tr>
                      <td>Peter Thomas</td>
                      <td>Consultation</td>
                      <td>10/22/2020</td>
                      <td>10:30 AM</td>
                    </tr>

              @endforeach
              @else

                    <tr>
                      <td>Peter Thomas</td>
                      <td>Consultation</td>
                      <td>10/22/2020</td>
                      <td>10:30 AM</td>
                    </tr>

              @endif
              @else

                    <tr>
                      <td>Peter Thomas</td>
                      <td>Consultation</td>
                      <td>10/22/2020</td>
                      <td>10:30 AM</td>
                    </tr>

            @endif

                  </tbody>
                </table>

            {{$appointments->links()}}

            </div>
          </div>
      </div>
    </div>
  </div>
  </div>
  </div>

@include('doctor.includes.footer')
@endsection
