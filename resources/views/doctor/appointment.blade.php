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
                    <p>{{!empty($next_appointments['appointment']) ?  $next_appointments['firstname']." ".$next_appointments['lastname']  : 'No Further Appointment'}}</p>
                    <h4>{{!empty($next_appointments['appointment']) ? date('H:i:s',strtotime($next_appointments['appointment'])): '00:00'}}</h4>
                    <div class="btn-wrap">
                     @if(!empty($next_appointments))
                        <a class="btn btn-info startnow" href="consultation/{{base64_encode($next_appointments['patient_id'])}}">
                          Start Now &nbsp;<i class="fa fa-angle-right"></i>
                        </a>
                    @endif                    
                    </div>
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
              @if(isset($appointments) && !empty($appointments))
              @php
                 $lists = collect($appointments->items())->toArray();
              @endphp
              @if(!empty($lists))
              @foreach($lists as $key => $app)
                        <tr>  
                          <td>{{$app['firstname']." ".$app['lastname']}}</td>  
                          <td>Consultation</td>  
                          <td>{{date('d-m-Y',strtotime($app['appointment']))}}</td>  
                          <td>{{date('H:i:s',strtotime($app['appointment']))}}</td>  
                        </tr>
                        @endforeach
              @else
                        <tr>
                            <td colspan=4 class="text-center">No Record Found!</td>
                        </tr>
              @endif
              @else
                        <tr>
                            <td colspan=4 class="text-center">No Record Found!</td>
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
</div>


@include('doctor.includes.footer')
@endsection


@section('js')
<script type="text/javascript">
  var iCal = new iCalendar('calendar');
  iCal.render();

  document.addEventListener('iCalendarDateSelected', function(event) {
  console.log(iCal.selectedDate);
  });

$(document).ready(function(){
  $('#hamburger').click(function(){
    $(this).toggleClass('open');
  });
});



</script>
@endsection