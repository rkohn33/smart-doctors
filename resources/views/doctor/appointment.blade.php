@extends('main-layout.master')

@section('content')

<div class="s-layout">
@include('doctor.includes.side-nav-bar')
@include('doctor.includes.header')

<div class="container-fluid">


    <div class="inner-container">
        <div class="row">
            <div class="col-xs-12 col-lg-4">
                <h5 class="font-weight-bold mb-5 mt-5">Calendars</h5>
                <div class="card mb-3">
                    <div class="card-body" style="overflow: hidden">
                        <div class="myCalendar"></div>
                    </div>
                </div>
                <div class="card mb-5">
                    <div class="card-header">Next Consultation</div>
                    <div class="card-body">
                        <h6><strong>Peter Thomas</strong></h6>
                        <h3><strong>{{!empty($next_appointments['appointment']) ? date('H:i:s',strtotime($next_appointments['appointment'])): '00:00'}}</strong></h3>
                        @if(!empty($next_appointments))
                        <button class="btn btn-info startnow">Start Now &nbsp;<i class="fa fa-angle-right"></i></button>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-8  col-xs-12">
                <h5 class="font-weight-bold mb-5 mt-5">{{now()->format('F d, Y')}}</h5>
                <div class="card mb-5">
                    <div class="card-header">Appointments
                        <div class="dropdown float-right">
                            <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
                                Today
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Link 1</a>
                                <a class="dropdown-item" href="#">Link 2</a>
                                <a class="dropdown-item" href="#">Link 3</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="padding: 0">
                        <div class="table-responsive" style="min-height: 370px">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>NAME</th>
                                    <th>TYPE</th>
                                    <th>DATE</th>
                                    <th>TIME</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="table-success">
                                    @if(isset($appointments) && !empty($appointments))
                                    @php
                                    $lists = collect($appointments->items())->toArray();
                                    @endphp
                                    @if(!empty($lists))
                                    @foreach($lists as $key => $app)


                                      <td>Mark</td>
                                      <td>Consultation</td>
                                      <td>10/22/2020</td>
                                      <td>10AM</td>

                                    @endforeach
                                    @else
                                    <tr>
                                      <td colspan="4" class="appoint-info text-center"> No Record Found!</td>
                                      </tr>
                                    @endif
                                    @else
                                    <tr>
                                          <td colspan="4" class="appoint-info text-center"> No Record Found!</td>
                                      </tr>
                                    @endif

                                  </tbody>
                            </table>
                            {{$appointments->links()}}
                        </div>
                        <div class="paginate">
                            <div class="row">
                                <div class="col-4">
                                    <button class="btn btn-light disabled">Previous</button>
                                </div>
                                <div class="col-4 text-center">
                                    <strong>3</strong> of 3 results
                                </div>
                                <div class="col-4">
                                    <button class="btn btn-light float-right">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>




 @endsection


