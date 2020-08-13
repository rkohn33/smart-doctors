@extends('main-layout.master')

@section('css')
<style>
  #ct-indicator.fa-long-arrow-alt-down {
    color: #E07979;
  }
</style>
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
                                  <h1><span id="ct-last-amount"></span>
                                      <span><i class="fas" aria-hidden="true" id="ct-indicator"></i></span>
                                      <span id="ct-percent-change"></span>
                                    </h1>
                                  <p id="ct-message"></p>
                                </div>
                                
                                <div class="col-4 col-sm-2 col-lg-2 day-box p-0">
                                    <select class="form-control js-special-tags" id="report-group">
                                      <option selected="selected" value="day">By Day</option>
                                      <option value="week">By Week</option>
                                      <option value="month">By Month</option>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js" integrity="sha512-rmZcZsyhe0/MAjquhTgiUcb4d9knaFc7b5xAfju483gbEXTkeJRUMIPk6s3ySZMYUHEcjKbjLjyddGWMrNEvZg==" crossorigin="anonymous"></script>
<script src="{{asset('js/doctor.data.js')}}"></script>
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
      labels: ['', '', '', '', '', '', ''  ],
      datasets: [{
        label: 'Earning',
        backgroundColor: gradient,
        pointBackgroundColor: '#06BEF6',
        borderWidth: 1,
        borderColor: 'blue',
        data: [0, 0, 0, 0, 0, 0, 0]
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

  function addData(chart, label, data) {
      chart.data.labels.push(label);
      // console.log(chart.data.datasets);
      chart.data.datasets[0].data = [100, 200, 150, 250, 400, 500, 550];
      /* chart.data.datasets.forEach((dataset) => {
          dataset.data.push(data);
      }); */
      chart.update();
  }
  $(document).ready(function($){
    let doctorData = DoctorData(null);
    updateChart();
    $('#report-group').on('change', function(e){
      updateChart(e.target.value);
    })

    function updateChart(group = 'day') {      
      doctorData.getEarnings(group)
        .catch(e=>console.log(e))
        .then(processedData=>{
          //console.log('chart data ..........................');
          //console.log(data);
          console.log(processedData);
          $('#ct-indicator').removeClass('fa-long-arrow-alt-up');
          $('#ct-indicator').removeClass('fa-long-arrow-alt-down');
          let iconClass = processedData.extra.icon != -1 ? 'fa-long-arrow-alt-up' : 'fa-long-arrow-alt-down';

          $('#ct-last-amount').text('$' + processedData.extra.current);
          $('#ct-indicator').addClass(iconClass);
          $('#ct-percent-change').text(processedData.extra.change);
          $('#ct-message').text(processedData.extra.message);
  
          chartInstance.data.labels = [];
          chartInstance.data.datasets[0].data = [];
          processedData.data.forEach(dataPair=>{
            chartInstance.data.labels.push(dataPair.label);
            chartInstance.data.datasets[0].data.push(dataPair.amount);
          })
          
          chartInstance.update();
        });// End then block
    }

  })
  </script>
@endsection