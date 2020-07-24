@extends('main-layout.master')

@section('content')
@include('doctor.includes.side-nav-bar')
@include('doctor.includes.header')

<div class="content-wrapper">

      <div class="title-wrap">
        <div class="container">
          <div class="row">
              <div class="title-header col-lg-8">
                  <h1>Welcome to your wallet.</h1>
                  <p>Here is your account at a glance.</p>
              </div>
              <div class="user-edit">
                <a href="#">JP Morgan Chase..... (4253) <i class="fas fa-pen"></i></a>
                <div class="btn-wrap">
                  <a class="btn btn-info" href="">request payout  <i class="fa fa-angle-right" aria-hidden="true"></i> </a>
                </div>
              </div>
          </div>
        </div>
      </div>
        <div class="earning-box">
            <div class="container">
              <div class="row">
                  <div class="earning-wrap col-sm-12 col-lg-8">
                      <div class="earning-chart">
                        <div class="line-chart">
                          <div class="aspect-ratio">
                            <div class="chart-caption">
                              <div class="row">
                              <div class="col-7 col-sm-10 col-lg-10 ">
                                <h1>$2,503 <span><i class="fas fa-long-arrow-alt-up" aria-hidden="true"></i> 2%</span></h1>
                                <p>Earnings this week</p>
                              </div>

                              <div class="col-4 col-sm-2 col-lg-2 day-box p-0">
                                  <select class="form-control js-special-tags">
                                    <option selected="selected">Today </option>
                                    <option>select 1</option>
                                    <option>select 2</option>
                                    <option>select 3</option>
                                    <option>select 4</option>
                                    <option>select 5</option>
                                  </select>
                                </div>
                            </div>
                            </div>
                            <canvas id="earning_chart"></canvas>
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="earning-details col-sm-12 col-lg-4 ">
                    <ul class="earning-list card">
                      <li>
                        <p>Chart Metric Heading</p>
                        <div class="d-flex justify-content-between">
                          <h5>125</h5>
                          <span><i class="fas fa-long-arrow-alt-up"></i> 3%</span>
                        </div>
                      </li>
                      <li>
                        <p>Chart Metric Heading</p>
                        <div class="d-flex justify-content-between">
                          <h5>125</h5>
                          <span><i class="fas fa-long-arrow-alt-up"></i> 3%</span>
                        </div>
                      </li>
                      <li>
                        <p>Chart Metric Heading</p>
                        <div class="d-flex justify-content-between">
                          <h5>125</h5>
                          <span><i class="fas fa-long-arrow-alt-up"></i> 3%</span>
                        </div>
                      </li>
                      <li>
                        <p>Chart Metric Heading</p>
                        <div class="d-flex justify-content-between">
                          <h5>125</h5>
                          <span><i class="fas fa-long-arrow-alt-down"></i> 3%</span>
                        </div>
                      </li>
                    </ul>

                  </div>
              </div>
            </div>
        </div>
      </div>

  @include('doctor.includes.footer')
@endsection




