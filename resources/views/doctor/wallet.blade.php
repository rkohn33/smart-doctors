@extends('main-layout.master')

@section('content')

<div class="s-layout">
@include('doctor.includes.side-nav-bar')
@include('doctor.includes.header')

    <div class="content">
    <div class="row">
        <div class="col-md-8 p-0">
          <div class="welcome pt-5">Welcome to your wallet.</div>
          <div class="side-header">Here is your account at a glance.</div>
          <div class="card big-wallet-card">
            <div class="p-3">
              <select class="earnings-btn float-right p-1">
                <option>Week<img src="{{ url('img/dropdown.svg') }}"></option>
                <option>Month</option>
                <option>Quarter</option>
              </select>
              <div class="earnings">$2,503</div>
              <div class="earnings-font">Earnings this week</div>
            </div>
            <img src="{{ url('img/wallet-graph.svg') }}">
          </div>
        </div>
        <div class="col-md-3 p-0">
          <div class="bank">
            <img src="{{ url('img/bank.svg') }}">
            <button type="button" class="btn start-now"><span class="pr-2">Request Payout</span>
            <img src="{{ url('img/white-arrow.svg') }}"></button>
          </div>
          <div class="card total-stats">
            <div class="p-2">
              <div class="wallet-header p-1">Total Bookings</div>
              <div class="float-right">
                <img src="{{ url('img/green-up.svg') }}"><span class="wallet-per">5%</span>
              </div>
              <div class="wallet-header p-1">125</div>

            </div>
            <hr>
            <div class="p-2">
              <div class="wallet-header p-1">Total Earnings</div>
              <div class="float-right">
                <img src="{{ url('img/green-up.svg') }}"><span class="wallet-per">5%</span>
              </div>
              <div class="wallet-header p-1">$200,33</div>
            </div>
            <hr>
            <div class="p-2">
              <div class="wallet-header p-1">Total Paients</div>
              <div class="float-right">
                <img src="{{ url('img/green-up.svg') }}"><span class="wallet-per">5%</span>
              </div>
              <div class="wallet-header p-1">120</div>
            </div>
            <hr>
            <div class="p-2">
              <div class="wallet-header p-1">Total Cancellations</div>
              <div class="float-right">
                <img src="{{ url('img/green-up.svg') }}"><span class="wallet-per">5%</span>
              </div>
              <div class="wallet-header p-1">5</div>
            </div>
            <div>
            </div>
          </div>

        </div>


      </div>
    </div>
  </div>

@endsection