@extends('main-layout.master')

@section('css')
@endsection

@section('content')
@include('doctor.includes.side-nav-bar')
@include('doctor.includes.header')

<div class="container-fluid">
  <div class="inner-container">
        <div class="title-wrap">
          <div class="container">
            <div class="row">
                <div class="title-header col-lg-6">
                    <h1>Welcome to your wallet.</h1>
                    <p>Here is your account at a glance.</p>
                </div>
                <div class="user-edit">
                  <a href="#">JP Morgan Chase..... (4253) <i class="fas fa-pen"></i></a>
                  <div class="btn-wrap">
                    <a class="btn btn-info" href="">request payout <i class="fa fa-angle-right" aria-hidden="true"></i> </a>
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
                                      <option selected="selected">today</option>
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
  </div>

@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

<script type="text/javascript">

  $(document).ready(function(){
      $('#data').after('<div id="nav"></div>');
      var rowsShown = 4;
      var rowsTotal = $('#data tbody tr').length;
      var numPages = rowsTotal/rowsShown;
      for(i = 0;i < numPages;i++) {
          var pageNum = i + 1;
          $('#nav').append('<a href="#" rel="'+i+'">'+pageNum+'</a> ');
      }
      $('#data tbody tr').hide();
      $('#data tbody tr').slice(0, rowsShown).show();
      $('#nav a:first').addClass('active');
      $('#nav a').bind('click', function(){
  
          $('#nav a').removeClass('active');
          $(this).addClass('active');
          var currPage = $(this).attr('rel');
          var startItem = currPage * rowsShown;
          var endItem = startItem + rowsShown;
          $('#data tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).
          css('display','table-row').animate({opacity:1}, 300);
      });
  });
  
  $(document).ready(function(){
    $('#hamburger').click(function(){
      $(this).toggleClass('open');
    });
  });
  
  // ============================================
  // As of Chart.js v2.5.0
  // http://www.chartjs.org/docs
  // ============================================
  
  var chart    = document.getElementById('earning_chart').getContext('2d'),
      gradient = chart.createLinearGradient(0, 0, 0, 450);
      gradient.addColorStop(0, '#2A6348');
      gradient.addColorStop(1, '#005BC1');
      gradient.addColorStop(1, '#005BC1');
  
  
  
  var data  = {
      labels: [ 'January', 'February', 'March', 'April', 'May', 'June', 'July' ],
      datasets: [{
        label: 'Custom Label Name',
        backgroundColor: gradient,
        pointBackgroundColor: '#06BEF6',
        borderWidth: 1,
        borderColor: 'blue',
        data: [50, 55, 80, 81, 54, 50, 20]
      }]
  };
  
  
  var options = {
    responsive: true,
    maintainAspectRatio: true,
    animation: {
      easing: 'easeInOutQuad',
      duration: 520
    },
    scales: {
      xAxes: [{
        gridLines: {
          color: 'rgba(72, 84, 107, 1)',
          lineWidth: 1,
  
        }
      }],
      yAxes: [{
        gridLines: {
          display: false
        }
      }]
    },
    elements: {
      line: {
        tension: 0
      }
    },
    legend: {
      display: false
    },
    point: {
      backgroundColor: 'white'
    },
    options: {
          chartArea: {
            backgroundColor: 'rgba(255, 255, 255, 1)'
          }
        },
    tooltips: {
      titleFontFamily: 'Open Sans',
      backgroundColor: 'rgba(0,0,0,0.3)',
      titleFontColor: 'red',
      caretSize: 5,
      cornerRadius: 2,
      xPadding: 10,
      yPadding: 10
    }
  };
  
  
  var chartInstance = new Chart(chart, {
      type: 'line',
      data: data,
      options: options
  });
  </script>
@endsection