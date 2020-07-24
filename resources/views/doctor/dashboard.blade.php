
@extends('main-layout.master')
@section('content')
@include('doctor.includes.side-nav-bar')
@include('doctor.includes.header')


<div class="container-fluid">
    <div class="inner-container hompage">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <div class="row">
            <div class="col-lg-8 col-xs-12">
                <br>
                <h1 class="top-heading">Welcome Back, Dr John</h1>
                <p class="sub-heading">Here is your account at a glance.</p>
            </div>
            <div class="col-lg-4  col-xs-12">
                <img src="{{ url('img/doctor.jpg') }}" style="width: 100%;height: 100%">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8  col-xs-12">
                <div class="card mb-5">
                    <div class="card-header">Appointments
                        <div class="dropdown float-right ">
                            <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
                                Today
                            </button>
                            <img >
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Link 1</a>
                                <a class="dropdown-item" href="#">Link 2</a>
                                <a class="dropdown-item" href="#">Link 3</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="padding: 0;">
                        <div class="table-responsive" style="min-height: 450px;">
                            <table class="table">
                                <thead>
                                <tr>
                                <th scope="col">NAME</th>
                                <th scope="col">TYPE</th>
                                <th scope="col">DATE</th>
                                <th scope="col">TIME</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="table-success">
                                    <td>Peter Thomas</td>
                                    <td>Consultation</td>
                                    <td>10/22/2020</td>
                                    <td>10:30AM</td>
                                </tr>
                                <tr>
                                    <td>Enrique Loss</td>
                                    <td>Follow-up</td>
                                    <td>10/22/2020</td>
                                    <td>11:30AM</td>
                                </tr>
                                <tr>
                                    <td>Marissa Laos</td>
                                    <td>Follow-up</td>
                                    <td>10/22/2020</td>
                                    <td>03:00PM</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="paginate">
                            <div class="row">
                                <div class="col-4">
                                    <button class="btn btn-light disabled"><img src="{{ url('img/prev.svg') }}">Previous</button>
                                </div>
                                <div class="col-4 text-center">
                                    <strong>3</strong> of 3 results
                                </div>
                                <div class="col-4">
                                    <button class="btn btn-light float-right">Next<img src="{{ url('img/next.svg') }}"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-lg-4">
                <div class="card mb-5">
                    <div class="card-header">Next Consultation</div>
                    <div class="card-body">
                        <h6><strong>Peter Thomas</strong></h6>
                        <h3><strong>10:30 AM</strong></h3>
                        <button class="btn btn-info startnow">Start Now &nbsp;<i class="fa fa-angle-right" aria-hidden="true"></i></button>
                    </div>
                </div>
                <div class="card mb-5" style="margin-top: 20px;background: ">
                    <div class="chart-data">
                        <div class="row">
                            <div class="col-8">
                                <span class="revenue"><strong>$2,503</strong></span>
                                <i class="revenue-arrow fa fa-arrow-up"></i>
                                <span class="revenue-percentage"><strong>2%</strong></span>
                                <h5>Earning this week</h5>
                            </div>
                            <div class="col-4">
                                <div class="dropdown float-right mt-3">
                                    <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
                                        Week
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Link 1</a>
                                        <a class="dropdown-item" href="#">Link 2</a>
                                        <a class="dropdown-item" href="#">Link 3</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" id="curve_chart" style="width: 100%; height: 200px;padding: 0">
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@include('doctor.includes.footer')
@endsection
