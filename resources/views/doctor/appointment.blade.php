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
        <div class="container fluid-child-container">
          
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
                    <p id="next-patient"></p>
                    <h4 id="next-appointment"></h4>
                    <div class="btn-wrap">
                     @if(!empty($next_appointments))
                        <a id="next-appointment-link" class="btn btn-info startnow" href="consultation/{{base64_encode($next_appointments['patient_id'])}}" hidden>
                          Start Now &nbsp;<i class="fa fa-angle-right"></i>
                        </a>
                    @endif                    
                    </div>
                  </div>
                </div>
            </div>
                
           
            
    
            <div class="appointments-box col-lg-8">
              <div class="heading-wrap">
                <h5 id="date-display">{{now()->format('F d, Y')}}</h5>
              </div>
              <div class="card">
                <div class="card-header">
                  <div class="row align-items-center">
                  <div class="p-0 col-sm-10 col-lg-10 title-tag">
                    <h5>Appointments</h5>
                  </div>
                  <div class="p-0 col-sm-2 col-lg-2 day-box">
                    <select class="form-control js-special-tags" id="select-day">
                      <option value="0">Today</option>
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
                      <tbody id="table-appointments">
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
                          <td>{{date('H:i A',strtotime($app['appointment']))}}</td>  
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
                  </div>
                  <div class="paginate">
                      <div class="row">
                          <div class="col-4">
                              <button class="btn btn-light" disabled id="paginate-prev"><img src="{{ url('img/prev.svg') }}">Previous</button>
                          </div>
                          <div class="col-4 text-center">
                              <strong><span id="paginate-current-total"></span></strong> of <span id="paginate-total"></span> results
                          </div>
                          <div class="col-4">
                              <button class="btn btn-light float-right" disabled id="paginate-next">Next<img src="{{ url('img/next.svg') }}"></button>
                          </div>
                      </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js" integrity="sha512-rmZcZsyhe0/MAjquhTgiUcb4d9knaFc7b5xAfju483gbEXTkeJRUMIPk6s3ySZMYUHEcjKbjLjyddGWMrNEvZg==" crossorigin="anonymous"></script>
<script src="{{ asset('js/doctor.data.js') }}" type="text/javascript"></script>
<script type="text/javascript">
  

  /* document.addEventListener('iCalendarDateSelected', function(event) {
  console.log(iCal.selectedDate);
  }); */
jQuery(document).ready(async function($){ 

  let momentToday = moment();
  let momentSelected = moment();
  let responseTimeFormat = 'YYYY-MM-DD HH:mm:ss'; 

  var iCal = new iCalendar('calendar');
  iCal.render();

  let tableAppointments = $('#table-appointments');
  let doctorData = DoctorData(tableAppointments);

  $('#hamburger').click(function(){
    $(this).toggleClass('open');
  }); 

  $selectDay = $('#select-day');
  for(let i=1; i<6; i++){
    if( i == 1 ) {
      $selectDay.append(
        `<option value="${i}">Tomorrow</option>`
      )
    } else {
      $selectDay.append(
        `<option value="${i}">${moment().add(i, 'days').format('dddd')}</option>`
      )
    }
  }

  // Set Date display at top
  let dateDisplay = $('#date-display');
  changeDisplayDate(moment());

  // Initialize doctordata and store Todays appointment
  let appointments = await doctorData.getAppointments(momentToday, null, true);
  doctorData.appointmentsToday = appointments.data[0];

  // doctorData.updateAppointmentsTable(doctorData.appointmentsToday);
  doctorData.updateNextConsultation($('#next-patient'), $('#next-appointment'), $('#next-appointment-link'));
  // doctorData.updatePaginate(appointments.data[0]);

  doctorData.prepareAppointment(moment());
 
  $(document).on('iCalendarDateSelected', function(e){
      momentSelected = moment(iCal.selectedDate, 'YYYY-MM-DD');
      doctorData.prepareAppointment(momentSelected.clone());
      
      changeDisplayDate(moment(iCal.selectedDate, 'YYYY-MM-DD'));   
    })
    
    $selectDay.on('change', function(e){
      momentSelected = moment().add($(this).val(), 'days');
      doctorData.prepareAppointment(momentSelected.clone());

    changeDisplayDate(momentSelected); 
  }) 

  // click handler on Paginate button
  $('#paginate-prev').on('click', function(e){
        $(this).attr('disabled', '');
        doctorData.prepareAppointment(momentSelected, $(this).data('page'));
    })
    $('#paginate-next').on('click', function(e){
        $(this).attr('disabled', '');
        doctorData.prepareAppointment(momentSelected, $(this).data('page'));
    }) 

  function changeDisplayDate(dateMoment) {
    dateDisplay.text(dateMoment.format('MMMM D, YYYY'));
  }


}) // End Ajsx on ready

</script>
@endsection