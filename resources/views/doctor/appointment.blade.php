@extends('main-layout.master')

@section('content')
@include('doctor.includes.header')
@include('doctor.includes.side-nav-bar')


<div class="container-fluid">
    <div class="content-wrapper">
        <div class="page-header">
            <div class="container">
              <h1>Appointments</h1>
            </div>
          </div>
        <div class="container">
          
          <div class="row">
            <div class="calendar-box col-lg-4">
               <div class="heading-wrap">
                <h5>Calendar</h5>
              </div>
                <div class="card">
                  <div id="calendar"></div>
                </div>
                <div class="card consultation">
                  <div class="card-header">
                    <div class="title-tag">
                      <h5>Next consultation</h5>
                    </div>
                  </div>
                  <div class="card-body">
                    <p>Peter Thomas</p>
                    <h4>10:30 AM</h4>
                    <div class="btn-wrap">
                      <a class="btn btn-info" href="">start now <i class="fa fa-angle-right" aria-hidden="true"></i> </a>
                    </div>
                  </div>
                </div>
            </div>
                
           
            
    
            <div class="appointments-box col-lg-8">
              <div class="heading-wrap">
                <h5>June 11, 2020</h5>
              </div>
              <div class="card">
                <div class="card-header">
                  <div class="row align-items-center">
                  <div class="col-sm-10 col-lg-10 title-tag p-0">
                    <h5>Appointments</h5>
                  </div>
                  <div class="col-sm-2 col-lg-2 day-box p-0">
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
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="myTable" class="table table-hover table-responsive">  
                      <thead>  
                        <tr>  
                          <th>NAME</th>  
                          <th>TYPE</th>  
                          <th>DATE</th>  
                          <th>TIME</th>  
                        </tr>  
                      </thead>  
                      <tbody>  
                        <tr>  
                          <td>Peter Thomas</td>  
                          <td>Consultation</td>  
                          <td>10/22/2020</td>  
                          <td>10:30 AM</td>  
                        </tr>
                        <tr>  
                          <td>Peter Thomas</td>  
                          <td>Consultation</td>  
                          <td>10/22/2020</td>  
                          <td>10:30 AM</td>  
                        </tr> 
                        <tr>  
                          <td>Peter Thomas</td>  
                          <td>Consultation</td>  
                          <td>10/22/2020</td>  
                          <td>10:30 AM</td>  
                        </tr> 
                        <tr>  
                          <td>Peter Thomas</td>  
                          <td>Consultation</td>  
                          <td>10/22/2020</td>  
                          <td>10:30 AM</td>  
                        </tr>
                        <tr>  
                          <td>Peter Thomas</td>  
                          <td>Consultation</td>  
                          <td>10/22/2020</td>  
                          <td>10:30 AM</td>  
                        </tr> 
                        <tr>  
                          <td>Peter Thomas</td>  
                          <td>Consultation</td>  
                          <td>10/22/2020</td>  
                          <td>10:30 AM</td>  
                        </tr>
                        <tr>  
                          <td>Peter Thomas</td>  
                          <td>Consultation</td>  
                          <td>10/22/2020</td>  
                          <td>10:30 AM</td>  
                        </tr>
                        <tr>  
                          <td>Peter Thomas</td>  
                          <td>Consultation</td>  
                          <td>10/22/2020</td>  
                          <td>10:30 AM</td>  
                        </tr> 
                        <tr>  
                          <td>Peter Thomas</td>  
                          <td>Consultation</td>  
                          <td>10/22/2020</td>  
                          <td>10:30 AM</td>  
                        </tr>
                        <tr>  
                          <td>Peter Thomas</td>  
                          <td>Consultation</td>  
                          <td>10/22/2020</td>  
                          <td>10:30 AM</td>  
                        </tr>
                        <tr>  
                          <td>Peter Thomas</td>  
                          <td>Consultation</td>  
                          <td>10/22/2020</td>  
                          <td>10:30 AM</td>  
                        </tr> 
                        <tr>  
                          <td>Peter Thomas</td>  
                          <td>Consultation</td>  
                          <td>10/22/2020</td>  
                          <td>10:30 AM</td>  
                        </tr>
                      </tbody>  
                    </table>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
    {{-- <div class="inner-container">
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
              @if(isset($appointments) && !empty($appointments))
              @php
                 $lists = collect($appointments->items())->toArray();
              @endphp
              @if(!empty($lists))
              @foreach($lists as $key => $app)
                                <tr class="table-success">
                                    <td>Peter Thomas</td>
                                    <td>Consultation</td>
                                    <td>10/22/2020</td>
                                    <td>10:30AM</td>
                                </tr>
              @endforeach
              @else
                                <tr>
                                    <td>Enrique Loss</td>
                                    <td>Follow-up</td>
                                    <td>10/22/2020</td>
                                    <td>11:30AM</td>
                                </tr>
              @endif
              @else
                                <tr>
                                    <td>Marissa Laos</td>
                                    <td>Follow-up</td>
                                    <td>10/22/2020</td>
                                    <td>03:00PM</td>
                                </tr>
              @endif
                                </tbody>
                            </table>

              {{$appointments->links()}}

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

        </div>
    </div> --}}
</div>


@include('doctor.includes.footer')
@endsection


@section('js')

<script src="{{ asset('js/iCalendar.js') }}"></script>
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
@endsection