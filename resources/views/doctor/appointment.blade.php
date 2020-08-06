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
                    <p id="next-patient"></p>
                    <h4 id="next-appointment"></h4>
                    <div class="btn-wrap">
                     @if(!empty($next_appointments))
                        <a id="next-appointment-link" class="btn btn-info startnow" href="consultation/{{base64_encode($next_appointments['patient_id'])}}">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js" integrity="sha512-rmZcZsyhe0/MAjquhTgiUcb4d9knaFc7b5xAfju483gbEXTkeJRUMIPk6s3ySZMYUHEcjKbjLjyddGWMrNEvZg==" crossorigin="anonymous"></script>
<script type="text/javascript">
  

  /* document.addEventListener('iCalendarDateSelected', function(event) {
  console.log(iCal.selectedDate);
  }); */
jQuery(document).ready(async function($){ 

  let momentToday = moment();
  let responseTimeFormat = 'YYYY-MM-DD HH:mm:ss'; 

  var iCal = new iCalendar('calendar');
  iCal.render();

  let tableAppointments = $('#table-appointments');

  $('#hamburger').click(function(){
    $(this).toggleClass('open');
  }); 

  $selectDay = $('#select-day');
  for(let i=1; i<6; i++){
    $selectDay.append(
      `<option value="${i}">${moment().add(i, 'days').format('dddd')}</option>`
    )
  }

  // Set Date display at top
  let dateDisplay = $('#date-display');
  changeDisplayDate(moment());

  // Next cosultation 
  let appointmentsToday = await getAppointments(momentToday.format('YYYY-MM-DD'));
  // appointmentsToday = appointmentsToday.filter
  displayNextConsultation(nextConsultation());

  function displayNextConsultation(nextData) {
    if(nextData == null) {
      $('#next-patient').text('No Further Appointment');
      $('#next-appointment').text();
      $('#next-appointment-link').attr('href', '');
      return;
    }

    $('#next-patient').text(nextData.firstname + ' ' + nextData.lastname);
    $('#next-appointment').text(moment(nextData.appointment, responseTimeFormat).format('h:mm A'));
    $('#next-appointment-link').attr('href', `consultation/${nextData.patient_id}`);
  }
  
  function nextConsultation() {
    console.log('appointments Today: ' + appointmentsToday);
    for(let i=0; i < appointmentsToday.length; i++) {
      if(moment().isSameOrBefore(moment(appointmentsToday[i].appointment, responseTimeFormat))) {
        return appointmentsToday[i];
      }
      return null;
    }
  }

  
  $(document).on('iCalendarDateSelected', function(e){
      console.log('Date picked: ' + iCal.selectedDate);
      // fetchAppointmentByDate(iCal.selectedDate); 
      getAppointments(iCal.selectedDate)
          .catch(error=>{
            console.info('Rejection: ' + error.msg);
          })
          .then(appointments=>{
            updateAppointmentDataRow(appointments);
          })

      changeDisplayDate(moment(iCal.selectedDate, 'YYYY-MM-DD'));   
  })

  $selectDay.on('change', function(e){
    let upcomingDay = moment().add($(this).val(), 'days');
    getAppointments(upcomingDay.format('YYYY-MM-DD'))
          .catch(error=>{
            console.info('Rejection: ' + error.msg);
          })
          .then(appointments=>{
            updateAppointmentDataRow(appointments);
          })

    changeDisplayDate(upcomingDay); 
  })  

  

  async function getAppointments(date) {
      return new Promise((resolve, reject)=>{
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          // $('#submit-spinner').show();

          $.ajax({
              type: "GET",
              url: `/doctor/get/appointment`,
              cache: false,
              contentType: 'application/json',
              data: { date },
              success: (response) => {
                  // let appointmentData = response[0];
                  let appointments = response.data[0].data;
                  if(response.code == 1000) {
                    resolve(appointments);
                  }
              },
              error: () => {
                  // $('#submit-spinner').hide();
                  reject({msg: 'connection error'});
              },
              dataType: "json",
          }); //End Ajax
      })
  }
  

  function updateAppointmentDataRow(dataObjectArray) {    
    tableAppointments.empty();
    if(dataObjectArray.length > 0){
      $.each(dataObjectArray, function(index, dataRow){
        //appointment format 2020-08-07 08:00:00
        console.log('appointment time: ' + dataRow.appointment);
        const dateTime = moment(dataRow.appointment, 'YYYY-MM-DD HH:mm:ss');
        console.log(dateTime);
        tableAppointments.append(
          `
          <tr>  
            <td>${dataRow.firstname + ' ' + dataRow.lastname}</td>  
            <td>Consultation</td>  
            <td>${dateTime.format('DD-MM-YYYY')}</td>  
            <td>${dateTime.format('h:mm A')}</td>  
          </tr>
          `)      
      })
    } else {
      tableAppointments.append(
        `
        <tr>
            <td colspan=4 class="text-center">No Record Found!</td>
        </tr>
        `)
    }
    
  }

  function changeDisplayDate(dateMoment) {
    dateDisplay.text(dateMoment.format('MMMM D, YYYY'));
  }


}) // End Ajsx on ready

</script>
@endsection