
@extends('main-layout.patient.master')

@section('css')
<link rel="stylesheet" href="{{ asset('css/calendar-oneline.css') }}">
<style>  
.doctor-detail-modal-body {
  padding: 24px;
  width: 600px; 
  /* height: 80vh; */
  overflow-y: auto;
  overflow-x: hidden;
  border: 1px solid #DDDDDD; 
  position: absolute; 
  top: 90px; 
  left: 88px; 
  background-color: white;
  box-shadow: 0px 2px 12px 2px rgba(0, 0, 0, .15);
}
.doctor-detail-modal-body .close {
  position: absolute;
  top: 4px;
  right: 8px;
}
.slots-area {
    margin-bottom: 16px;
}
.time-slots-container {
    display: flex;
    flex-wrap: wrap;
}
.slot {
    flex-basis: 33.33%;
    flex-grow: 0;
    flex-shrink: 0;
}
.slot a.btn {
  margin-bottom: 0;
  font-size: 14px;
  color: white;
  width: 96%;
  margin-bottom: 4%;
  margin-left: auto;
  margin-right: auto;
}
#time-slice-morning a.btn:hover,
#time-slice-afternoon a.btn:hover,
#time-slice-evening a.btn:hover {
  background-color: #138496;
}

#time-slice-morning a.btn,
#time-slice-afternoon a.btn,
#time-slice-evening a.btn {
  background-color: #06BEF6;
}
.no-slot {
    flex: 1;
    text-align: center;
}
.profile-header {
    margin-bottom: 16px;
}
.profile-frame {
  position: relative;
  height: 0;
  width: 100%;
  padding: 50% 0;
  overflow: hidden;
}
.profile-frame img{
  position: absolute;
  top: 0;
  left: 0;
}
.doctor-detail-modal-body .appointment-block {
  flex: 1;
  display: flex;
  flex-direction: row;
  align-items: flex-end;
  justify-content: flex-end;
}
</style>
@endsection

@section('content')
@include('patient.includes.header')
@include('patient.includes.side-nav-bar')

<div class="modal fade" id="doctorDetailsModal" tabindex="-1" role="dialog" aria-labelledby="doctorDetailsModal" aria-hidden="true">
  <div class="doctor-detail-modal-body">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="p-2">&times;</span>
      </button>
      <div class="row profile-header">
          <div class="col-md-4">
              <div class="profile-frame">
                <img id="modal-profile-img" src="{{ asset('img/profile.png') }}" alt="" class="img-fluid">
              </div>
          </div>
          <div class="col-md-8" style="display: flex; flex-direction: column;">
              <h2 class="font-weight-bold" id="modal-profile-name"></h2>
              <h3></h3>
              <div class="rating" id="modal-profile-rating"><span id="modal-rating-star"><i class="fa fa-star"></i></span><span id="modal-rating-text">4.00(25)</span></div>
              <div class="appointment-block">
                <button class="btn btn-warning" disabled id="bt-set-appointment">Set Appointment</button>
              </div>
          </div>
      </div>

      <div class="mb-3 row">
        <div class="col-12">
          <textarea name="" id="msg-set-appointment" class="form-control" disabled>Describe your symptoms.</textarea>
        </div>
      </div>
      
      <div class="mb-4 row d-flex">
        <div class="col d-flex" id="modal-calendar">
        </div>           
      </div>
            <div class="slots-day">
                <div class="row slots-area" id="time-slice-morning">
                    <div class="col-md-2"><img src="{{ asset('img/art_day.png') }}" alt="" class="img-fluid"></div>
                    <div class="col-md-10">
                        <div class="time-slots-container"></div>
                    </div>
                </div>
                <hr>
                <div class="row slots-area" id="time-slice-afternoon">
                    <div class="col-md-2"><img src="{{ asset('img/art_afternoon.png') }}" alt="" class="img-fluid"></div>
                    <div class="col-md-10">
                        <div class="time-slots-container"></div>
                    </div>
                </div>
                <hr>
                <div class="row slots-area" id="time-slice-evening">
                    <div class="col-md-2"><img src="{{ asset('img/art_evening.png') }}" alt="" class="img-fluid"></div>
                    <div class="col-md-10">
                        <div class="time-slots-container"></div>
                    </div>
                </div>
            </div>
      </div> 
      <div class="modal-dialog" role="document"></div>
</div>

<div style="background-color:#f5f5f5">

<div class="container">
    <div class="row">
      <div class="col-lg-8 col-12">
        <div class="float-left mt-5">
          <div class="float-left p-0 col-12 col-lg-12">
            <h1 class="">Hello, {{ ucfirst( Auth::user()->lastname ) }}!</h1>
            <p class="">We are happy to help you stay healthy</p>
          </div>
        </div>
        <div class="float-left pr-0 col-lg-12 row col-12 ">


          <span class="p-0 mt-3 col-lg-6">
            <div class="custom_row">
              <i class="mt-3 ml-3 fa fa-search" aria-hidden="true"></i>

              <input type="text" style="border: none; height: 49px; width: 77%; " class="mr-lg-2 form-control search_bar" placeholder="Doctor,Speciality,etc"
                aria-label="Username">
              <div class=" round_circle">
                <i class="fa fa-angle-right fa-2x color" style="margin-left: 11px; margin-top: 1px;" aria-hidden="true"></i>

              </div>
            </div>
          </span>

          <span class="p-0 mt-3 col-lg-3 col-12 ml-lg-3">
            <input class="date_and_time" type="date">
          </span>

          <span class="pl-0 pr-0 mt-3 col-lg-2 col-12 ml-lg-3">
            <input class="date_and_time" type="time">
          </span>
          <div>


          </div>
          <h4 class="provider_style">Providers Found <a class="provider_code_style" style="color: gray;">(15)</a></h4>
        </div>
        <table class="table float-left p-0 mt-4 col-12 tablebordered">
          <!-- <thead>
             <tr>
              <th class="appointment_heading">Appointement</th>
            </tr>
          </thead> -->
          <tbody id="table-doctor-list">
          </tbody>
        </table>
    <div class="mt-5">
    </div>

  </div>

  <div class="col-lg-4 col-12">
    <img style="width: 100%;" src="{{ url('img/doctor.jpg') }}">
    <div class="col-lg-12 process_block">
      <p class="process_block_heading">
        Complete Signup Process <i class="fa fa-angle-right" aria-hidden="true"></i>
      </p>
      <div class="unprogress">
        <div class="progree_get" style="width: 0;"></div>
        <p class="progress_value">0%</p>
      </div>
    </div>
    <div class="your_doctors" style="height:auto;">
      <h4 class="your_doctors_heading">Your doctor</h4>
      <div id="your-doctor-list-container"></div>
    </div>
  </div>
  </div>
  </div>
  </div>
  </div>
</div>
<p id="asset-url" data-asset="{{ asset('') }}" hidden></p>
@endsection
@include('patient.includes.footer')

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js" integrity="sha512-rmZcZsyhe0/MAjquhTgiUcb4d9knaFc7b5xAfju483gbEXTkeJRUMIPk6s3ySZMYUHEcjKbjLjyddGWMrNEvZg==" crossorigin="anonymous"></script>
<script src="{{ asset('js/patient.data.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/calendar-oneline.js') }}" type="text/javascript"></script>
<script>
jQuery(document).ready(async function($){
    let patientData = PatientData();

    let assetUrl = $('#asset-url').data('asset');

    $(document).on('click', '.bt-modal-availability', async function(e){
      let docId = $(this).data('doc-id');
      clearSlots();
      
      patientData.getDoctorById(docId).catch(error=>console.log(error))
          .then(doctor=>{
            updateModalDoctor(doctor)
            populateSlots(doctor.availability);
          });

      $('#doctorDetailsModal').data('doc-id', docId).modal({show: true});
    })

    let calendar = CalendarOneline($('#modal-calendar'));
    calendar.addEventListener('dateselected', function(e){
      console.log('calendar selected: ' + calendar.selectedDate);
      let docId = $('#doctorDetailsModal').data('doc-id');
      $('#bt-set-appointment').attr('disabled', '');
      $('#msg-set-appointment').attr('disabled', '');

      // clear the slots container on click on date
      clearSlots();
      patientData.getDoctorAvailabilityByDate(docId, calendar.selectedDate).catch(error=>console.log(error))
            .then(slotsData=>populateSlots(slotsData));
    })    

    $(document).on('click', '#doctorDetailsModal .time-slots-container .slot a', function(e){
      console.log('Slot clicked: doc id: ' + $('#doctorDetailsModal').data('doc-id'));
      console.log('Slot clicked: time  : ' + $(this).data('time'));
      if($(this).hasClass('bg-success')){
        $(this).removeClass('bg-success');
        $('#bt-set-appointment').attr('disabled', '');
        $('#msg-set-appointment').attr('disabled', '');
      } else {
        $('.time-slots-container .slot a').removeClass('bg-success');
        $(this).addClass('bg-success');
        $('#bt-set-appointment').removeAttr('disabled');
        $('#msg-set-appointment').removeAttr('disabled');
      }
    })

    function updateModalDoctor(doctor) {
      $('#modal-profile-img').attr('src', assetUrl + doctor.profile_image);
      $('#modal-profile-name').text(doctor.name);
      $('#modal-profile-rating .modal-rating-text').text(doctor.rating);
    }

    $tableDoctorList = $('#table-doctor-list');
    patientData.getDoctors().catch(error=>console.log(error)).then(doctors=>populateDoctorList(doctors));
    
    patientData.getMyDoctors().catch(error=>console.log(error)).then(doctors=>populateYourDoctor(doctors));    

    patientData.getProfileCompletion().catch(error=>console.log(error)).then(progress=>populateProgress(progress));    
    
    function populateProgress(progress){
      $('.process_block .progree_get').attr('style', `width: ${progress};`);
      $('.process_block .progress_value').text(progress);
    }


    let $daySlotsContainer = $('#time-slice-morning .time-slots-container');
    let $afternoonSlotsContainer = $('#time-slice-afternoon .time-slots-container');
    let $eveningSlotsContainer = $('#time-slice-evening .time-slots-container');

    function clearSlots() {
      $daySlotsContainer.empty();
      $afternoonSlotsContainer.empty();
      $eveningSlotsContainer.empty();
    }
    function populateSlots(slotTimeArray) {
          let momentMorningMax = moment('1200', 'Hmm');
          let momentAfternoonMax = moment('1700', 'Hmm');
          let momentEveningMax = moment('2359', 'Hmm');
          slotTimeArray.forEach(slotTime => {
            let momentSlotTime = moment(slotTime, 'Hmm');
            
            if(momentSlotTime.isBefore(momentMorningMax)) {
              $daySlotsContainer.append(`
                <div class="slot"><a class="btn" data-time="${momentSlotTime.format('Hmm')}">${momentSlotTime.format('h.mm A')} - ${momentSlotTime.add(30, 'minutes').format('h.mm A')}</a></div>
              `)
            } else if(momentSlotTime.isBefore(momentAfternoonMax)) {
              $afternoonSlotsContainer.append(`
              <div class="slot"><a class="btn" data-time="${momentSlotTime.format('Hmm')}">${momentSlotTime.format('h.mm A')} - ${momentSlotTime.add(30, 'minutes').format('h.mm A')}</a></div>
              `)        
            }
            else {
              $eveningSlotsContainer.append(`
              <div class="slot"><a class="btn" data-time="${momentSlotTime.format('Hmm')}">${momentSlotTime.format('h.mm A')} - ${momentSlotTime.add(30, 'minutes').format('h.mm A')}</a></div>
              `)
            }
          });

          if($daySlotsContainer.children().length == 0) {
            $daySlotsContainer.append(`<div class="no-slot">Slots not available</div>`);
          }
          if($afternoonSlotsContainer.children().length == 0) {
            $afternoonSlotsContainer.append(`<div class="no-slot">Slots not available</div>`);
          }
          if($eveningSlotsContainer.children().length == 0) {
            $eveningSlotsContainer.append(`<div class="no-slot">Slots not available</div>`);
          }
            
    } // populate availability slots

    function populateYourDoctor(doctorData) {
      doctorData.forEach((doctor, index) => {
          $('#your-doctor-list-container').append(
            `<div ${index == 0 ? '': 'class="bottombar"'}>
              <h4 class="doctor_heading1">
                  Dr.Joanne Baptiste<i class="fa fa-ellipsis-h doctor_edit" aria-hidden="true"></i>
              </h4>
              <p class="doctor_subheading">
                General Practitioner
              </p>
            </div>`)
      })
    }

    function populateDoctorList(doctorData) {
      doctorData.forEach((doctor, index)=>{
        $tableDoctorList.append( `<tr><td><div class="row ">
              <div class="p-0 ml-2 col-lg-8 col-12 p-lg-0 ml-lg-3 row">
                <img src="${assetUrl + doctor.profile_image}" class="p-0 ml-2 col-md-2 ml-lg-0 dr_image">
                <div class="p-2 mt-2 pl-lg-4 col-md-10 col-12">
                  <div class="p-0 ml-0 row col-12 ml-md-0">
                    <h5 class="p-0 m-0 text_one">${doctor.name}</h5>
                    <div class="pt-0 mt-1 ml-3 varification_status row">
                      <i class="ml-1 fa fa-check " style="margin-top: 2px; color: green;" aria-hidden="true"></i>
                      <h6 class="ml-1" style="font-size: 14px;font-weight: 600;color: green; margin-top: 2px;">VERIFID</h6>
                  </div>
                </div>
                <div class="mt-2 mb-2 row col-12 pl-lg-3">
                  <div class="p-0 col-6">
                    <p class="text_two">Qualification </p>
                    <p class="text_two"> Speciality</p>
                    <p class="text_two">Experence </p>
                    <p class="text_two">Language </p>
                  </div>
                  <div class="p-0 col-6">
                    <p class="text_two">${doctor.qualification}</p>
                    <p class="text_two">${doctor.speciality}</p>
                    <p class="text_two">${doctor.experience}</p>
                    <p class="text_two">${doctor.language}</p>
                  </div>
                </div>
              </div>
              </div>
                <div class=" col-lg-3 ml-lg-5 pl-lg-5">
                  <button class="mb-3 btn btn-info col-lg-12 col-md-12 col-12 bt-modal-join" href="${''}" data-doc-id="${doctor.id}">Join Now <i
                    class="fa fa-angle-right" aria-hidden="true"></i>
                  </button>
                  <button data-doc-id="${doctor.id}" style="border: 2px solid #07d1ff;"  class="mb-3 bt-modal-availability col-12 col-lg-12 col-md-12 btn btn-light "
                  href="">Availability <i class="fa fa-angle-right" aria-hidden="true"></i>
                  </button>
                  <button data-doc-id="${doctor.id}" style="border: 2px solid #07d1ff;"
                  class="mb-3 col-12 col-lg-12 col-md-12 btn btn-light mb-lg-0 bt-modal-profile" href="">view profile <i
                    class="fa fa-angle-right" aria-hidden="true"></i>
                  </button>
                </div>
              </div>
            </div></td></tr>`)
      });
      
    }// End populatedoctor

    

}) //end jQuery block
</script>
@endsection