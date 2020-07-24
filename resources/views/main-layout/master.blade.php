<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Smart Doctors - @yield('title')</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <!-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/wallet.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
        <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/availability.css') }}" rel="stylesheet">
        <link href="{{ asset('css/iCalendar.css') }}" rel="stylesheet">
        @yield('css')


        <!-- Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



    </head>
    <body>
        @yield('content')
        <!-- Scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('vendor/calendar/jquery-pseudo-ripple.js') }}"></script>
        <script src="{{ asset('vendor/calendar/jquery-nao-calendar.js') }}"></script>
        <script src="{{ url('/js/jquery.dd.min.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>
        <script src="{{ asset('js/iCalendar.js') }}"></script>
        <script src="{{ asset('js/Chart.min.js') }}"></script>


        <script type="text/javascript">
  var iCal = new iCalendar('calendar');
    iCal.render();

  document.addEventListener('iCalendarDateSelected', function(event) {
  console.log(iCal.selectedDate);
  });


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
    $('#myTable').dataTable();
});

$(document).ready(function(){
  $('#hamburger').click(function(){
    $(this).toggleClass('open');
  });
});

</script>

<script>
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

        @yield('js')
    </body>
</html>
