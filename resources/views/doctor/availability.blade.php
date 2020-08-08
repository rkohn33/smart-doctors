@extends('main-layout.master')

@section('content')

<div class="s-layout">
@include('doctor.includes.side-nav-bar')
@include('doctor.includes.header')

  <div class="container-fluid">
    <div class="inner-container">
      <div class="page-header">
          <div class="container d-flex">
            <h1>Availability</h1>
            <button class="ml-auto btn btn-primary align-self-center" id="export">Update</button>
          </div>
      </div>
    </div>
    <div class="inner-container">
      <div class="row">
          <div class="calendar-box col-lg-4">
            <div class="heading-wrap">
                <h5>Calendar</h5>
            </div>
            <div class="card">
                <div id="calendar"></div>
            </div>
          </div>
          <div class="appointments-box col-lg-8">            
            <div class="heading-wrap">
                <h5 id="date-display">June 11, 2020</h5>
            </div>
            <div class="card">
                <div class="time-slice day" id="time-slice-day">
                  <div class="card-header">
                      <h1><span></span>Morning</h1>
                      <a href="#">+ ADD SLOT </a>
                      <p>7:00 AM to 12:00 PM</p>
                  </div>                  
                  <div class="card-body">   
                      <div class="block-selector-form" style="width: 50%;">
                          <form action="" data-shift="day" class="mb-3 input-group disabled">
                            <input type="text" class="form-control" placeholder="Set session charge: " disabled>
                            <div class="input-group-append">
                              <input type="submit" class="btn" value="Set" class="mb-2" disabled>
                            </div>                          
                        </form>
                      </div>
                      <div class="tags block-selector-blocks" data-shift="day">
                        
                      </div>
                  </div>
                </div>
                <div class="time-slice afternoon" id="time-slice-afternoon">
                  <div class="card-header">
                      <h1><span></span>Afternoon</h1>
                      <a href="#">+ ADD SLOT </a>
                      <p>12:00 PM to 5:00 PM</p>
                  </div>
                  <div class="card-body">
                      <div class="tags block-selector-blocks" data-shift="afternoon">
                        
                      </div>
                      <div class="block-selector-form" style="width: 50%;">
                          <form action="" data-shift="afternoon" class="mb-3 input-group">
                            <input type="text" class="form-control" placeholder="Set session charge: " disabled>
                            <div class="input-group-append">
                              <input type="submit" class="btn" value="Set" class="mb-2" disabled>
                            </div>                          
                        </form>
                      </div>
                  </div>
                </div>
                <div class="time-slice night" id="time-slice-night">
                  <div class="card-header">
                      <h1><span></span>Evening</h1>
                      <a href="#">+ ADD SLOT </a>
                      <p>5:00 PM to 12:00 AM</p>
                  </div>
                  <div class="card-body">
                      <div class="tags block-selector-blocks" data-shift="night">
                        
                      </div>
                      <div class="block-selector-form" style="width: 50%;">
                          <form action="" data-shift="night" class="mb-3 input-group">
                            <input type="text" class="form-control" placeholder="Set session charge: " disabled>
                            <div class="input-group-append">
                              <input type="submit" class="btn" value="Set" class="mb-2" disabled>
                            </div>                          
                        </form>
                      </div>
                  </div>
                </div>
                <div class="card-footer small text-muted">
                  <div class="row align-items-center">
                      <div class="col-sm-6 col-lg-6">
                        <p><i class="far fa-clock"></i> Waiting List</p>
                      </div>
                      <div class="col-sm-6 col-lg-6">
                        <a class="btn btn-info" href="">Add to waitlist <i class="fa fa-angle-right" aria-hidden="true"></i> </a>
                      </div>
                  </div>
                </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js" integrity="sha512-rmZcZsyhe0/MAjquhTgiUcb4d9knaFc7b5xAfju483gbEXTkeJRUMIPk6s3ySZMYUHEcjKbjLjyddGWMrNEvZg==" crossorigin="anonymous"></script>
<script type="text/javascript">

jQuery(document).ready(function($){
  let startBlock = null;
  let blocksToSetCharge = null;
  let tmpBlockBetween = null;
  let formActive = false;
  let currentShift = '';  
  let dayChargeFormControls = $('#time-slice-day .block-selector-form input');
  let afternoonChargeFormControls = $('#time-slice-afternoon .block-selector-form input');
  let eveningChargeFormControls = $('#time-slice-night .block-selector-form input');

  let dayChargeFormInput = $('#time-slice-day .block-selector-form input[type="text"]');
  let afternoonChargeFormInput = $('#time-slice-afternoon .block-selector-form input[type="text"]');
  let eveningChargeFormInput = $('#time-slice-night .block-selector-form input[type="text"]');

  let daySlotsContainer = $('#time-slice-day .block-selector-blocks');
  let afternoonSlotsContainer = $('#time-slice-afternoon .block-selector-blocks');
  let eveningSlotsContainer = $('#time-slice-night .block-selector-blocks');

  let morningSlots = [{sTime: '700', active: false}, 
                      {sTime: '730', active: false}, 
                      {sTime: '800', active: false},
                      {sTime: '830', active: false},
                      {sTime: '900', active: false},
                      {sTime: '930', active: false},
                      {sTime: '1000', active: false},
                      {sTime: '1030', active: false},
                      {sTime: '1100', active: false},
                      {sTime: '1130', active: false},
                      {sTime: '1159', active: false}
                    ];
  let afternoonSlots = [{sTime: '1200', active: false}, 
                      {sTime: '1230', active: false}, 
                      {sTime: '1300', active: false},
                      {sTime: '1330', active: false},
                      {sTime: '1400', active: false},
                      {sTime: '1430', active: false},
                      {sTime: '1500', active: false},
                      {sTime: '1530', active: false},
                      {sTime: '1600', active: false},
                      {sTime: '1630', active: false},
                      {sTime: '1659', active: false},
                    ];
  let eveningSlots = [{sTime: '1700', active: false}, 
                      {sTime: '1730', active: false}, 
                      {sTime: '1800', active: false},
                      {sTime: '1830', active: false},
                      {sTime: '1900', active: false},
                      {sTime: '1930', active: false},
                      {sTime: '2000', active: false},
                      {sTime: '2030', active: false},
                      {sTime: '2100', active: false},
                      {sTime: '2130', active: false},
                      {sTime: '2200', active: false},
                      {sTime: '2230', active: false},
                      {sTime: '2300', active: false},
                      {sTime: '2330', active: false},
                      {sTime: '2359', active: false},
                  ];
    

  let currentDate = moment().format('YYYY-MM-DD');
  
  let dateDisplay = $('#date-display');
  dateDisplay.text(moment().format('MMMM D, YYYY'));

  var iCal = new iCalendar('calendar');
  iCal.render();
  document.addEventListener('iCalendarDateSelected', function(event) {
    currentDate = iCal.selectedDate;
    dateDisplay.text(moment(iCal.selectedDate, "YYYY-MM-DD").format('MMMM D, YYYY'));
    getSchedules(currentDate);
  });

  getSchedules(currentDate);

  $(document).click('#hamburger', function(){
      $(this).toggleClass('open');
  });

  // Cancel of selection operation
  $(document.body).on('click', function(e){
    cancelAllSelection();      
  })

  function cancelAllSelection() {
    console.log('..... canceling selection ...');
    let selectedBlocks = $('.time-slice .tags a');
    $.each(selectedBlocks, function(index, block){
      $(block).removeClass('block-selector-block-selected');
    })

    dayChargeFormControls.attr('disabled', '');
    afternoonChargeFormControls.attr('disabled', '');
    eveningChargeFormControls.attr('disabled', '');
    currentShift = '';
    startBlock = null;
  }


  $(document.body).on('click', '.time-slice .tags a', function(e){
        e.preventDefault();
        e.stopPropagation();
        let shift = $(this).parent().data('shift');
        if( shift !== '' && shift !== currentShift) {
          cancelAllSelection();
        }
        
        currentShift = shift;
        let currentBlock = this;
        // activate set form
        if(shift == 'day') {
          console.log(shift);
          // make editable
          dayChargeFormControls.removeAttr('disabled');
        } else if(shift == 'afternoon'){
          afternoonChargeFormControls.removeAttr('disabled');
        } 
        else {
          eveningChargeFormControls.removeAttr('disabled');
        }
        // Check for Clicked twice on same object.
        if($(currentBlock).hasClass('block-selector-block-selected')){
            console.log('Clicked on selected block');
            $(currentBlock).removeClass('block-selector-block-selected');
            if(currentBlock == startBlock) {
              startBlock = null;
              $(currentBlock).removeClass('block-selector-active-dblock');
            }
            cancelAllSelection();
            return;
        }
          
        $(currentBlock).addClass('block-selector-block-selected');
          
        if(startBlock == null){
          console.log('startBlock is null. ... New loop started!');
          startBlock = currentBlock;
          return;
        }
          
        // End Auto selection loop
        
        console.log('Considering last Click to select the range');
        let betweenBlocks = getBetweenBlocks(startBlock, currentBlock);
        console.log(betweenBlocks.length)
        if(betweenBlocks) {
          $.each(betweenBlocks, function(index, block){
            $(block).addClass('block-selector-block-selected');
          });
        }
        
        startBlock = null;
  })

  $(document.body).on('click', '.time-slice .block-selector-form form', function(e){
    e.stopPropagation();
    console.log('... click on form area');
  })
  

  $('.time-slice .block-selector-form form').submit(function(e){
    e.preventDefault();  
    formActive = false;
    $form = $(this);
    let chargeField = $form.find("[type=text]");
    let blocksTobeSet;
    if($(this).data('shift') == 'day') {
      blocksTobeSet = $('#time-slice-day .block-selector-block-selected');
    } else if($(this).data('shift') == 'afternoon') {
      blocksTobeSet = $('#time-slice-afternoon .block-selector-block-selected');
    }
    else {
      blocksTobeSet = $('#time-slice-night .block-selector-block-selected');
    }
    
    blocksTobeSet.addClass('block-selector-active-dblock');
    
    cancelAllSelection();
  })

  function setCharge(blocks, charge = ''){
    console.log('setting charges ... : ' + charge);
    $.each(blocks, function(index, block){
      $(block).addClass('block-selector-active-dblock');
      $(block).removeClass('block-selector-block-selected');
      $(block).find('.b-time').text(formatToAmPm($(block).data('stime')));
      if(charge == ''){
        $(block).find('.b-price').text('');
      } else {
        $(block).find('.b-price').text(' | ' + charge);
      }
    })
    
  }


  // tmpBlockBetween shareable among mouseover and out
  $(document.body).on('mouseover', '.time-slice .tags a', function(e){  
    let currentBlock = e.target;
    if(startBlock == null) console.log('block .... null');
    if(startBlock == null) return;
    if(startBlock == currentBlock) return; 
    
    
    tmpBlockBetween = getBetweenBlocks(startBlock, this);
    if(tmpBlockBetween) {
      $.each(tmpBlockBetween, function(index, block){
        $(block).addClass('block-selector-block-between');
      });
    }
    
  })
  $(document.body).on('mouseout', '.time-slice .tags a', function(e){
    if(formActive) return;
    if(tmpBlockBetween == null) return;
    $.each(tmpBlockBetween, function(index, block){
        $(block).removeClass('block-selector-block-between');
    });
  })


  function getBetweenBlocks(bStart, bEnd) {
    let blocks = [];
    if($(bStart).data('stime') < $(bEnd).data('stime')) {
      blocks = $(bStart).nextUntil($(bEnd));
    } else {
      blocks = $(bStart).prevUntil($(bEnd));
    }
    
    return blocks;
  }

  $(document.body).on('click', '.block-selector-delete-block', function(e){
    e.stopPropagation();
    $(this).parent().remove();
  })

  /*
  // Start Full block support
  $('#export').click(function(e) {    
      let scheduleData = [];
      let morningCharge = $('#time-slice-day .block-selector-form input[type=text]').val();
      let nightCharge = $('#time-slice-night .block-selector-form input[type=text]').val();
      let dateActive = moment(currentDate, "YYYY-MM-DD").format('YYYY-MM-DD');
      // extract morning timings
      let $block;
      $.each(daySlotsContainer.children('.block-selector-block'), function(index, block){
         $block = $(block);
        scheduleData.push({
            date: dateActive,
            timings: moment($block.data('stime'), 'Hmm').format('H:mm'),
            session_charge: $block.hasClass('block-selector-active-dblock') ? morningCharge : '' ,
            shift_type: "Morning"
          }
        )
      })

      $.each(nightSlotsContainer.children('.block-selector-block'), function(index, block){
        $block = $(block);
        scheduleData.push({
            date: dateActive,
            timings: moment($block.data('stime'), 'Hmm').format('H:mm'),
            session_charge: $block.hasClass('block-selector-active-dblock') ? nightCharge : '' ,
            shift_type: "Evening"
          }
        )
      })     
    
      console.log(scheduleData);
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
            // $('#submit-spinner').show();

      $.ajax({
          type: "POST",
          url: `schedule/update`,
          cache: false,
          contentType: 'Application/json',
          processData: true,
          data: JSON.stringify(scheduleData),                
          success: (response) => {
              console.log(response);
              if(response.code == 1000) {

              }
          },
          complete: (response) => {
              // $('#submit-spinner').hide();
          }
          // dataType: "application/json",
          // dataType: "jsonp",
      }); //End Ajax
  }) // End Full Block support
  */

  // Export all timings all once
  $('#export').click(function(e) {
    console.log('export ...');
    let scheduleData = [];
    let morningCharge = dayChargeFormInput.val();
    let morningTimings = [];
    let afternoonCharge = afternoonChargeFormInput.val();
    let afternoonTimings = [];
    let eveningCharge = eveningChargeFormInput.val();
    let eveningTimings = [];
    // extract morning timings
    console.log('morning charge: ' + morningCharge);
    console.log('afternoon charge: ' + afternoonCharge);
    console.log('evening charge: ' + eveningCharge);

    $.each($('#time-slice-day .block-selector-active-dblock'), function(index, block){
      $(block).css('border', '2px solid red');
      morningTimings.push(moment($(block).data('stime'),'Hmm').format('H:mm'));
    })

    $.each($('#time-slice-afternoon .block-selector-active-dblock'), function(index, block){
      $(block).css('border', '2px solid red');
      afternoonTimings.push(moment($(block).data('stime'),'Hmm').format('H:mm'));
    })
    $.each($('#time-slice-night .block-selector-active-dblock'), function(index, block){
      $(block).css('border', '2px solid red');
      eveningTimings.push(moment($(block).data('stime'),'Hmm').format('H:mm'));
    })

    scheduleData.push(
        {
          date: currentDate,
          timings: morningTimings,
          session_charge: morningCharge,
          shift_type: "Morning"
        },
        {
          date: currentDate,
          timings: afternoonTimings,
          session_charge: afternoonCharge,
          shift_type: "Afternoon"
        },
        {
          date: currentDate,
          timings: eveningTimings,
          session_charge: eveningCharge,
          shift_type: "Evening"
        }
      );

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
            // $('#submit-spinner').show();

      $.ajax({
          type: "POST",
          url: `schedule/update`,
          cache: false,
          contentType: 'Application/json',
          processData: true,
          data: JSON.stringify(scheduleData),                
          success: (response) => {
              console.log(response);
              if(response.code == 1000) {

              }
          },
          complete: (response) => {
              // $('#submit-spinner').hide();
          }
          // dataType: "application/json",
          // dataType: "jsonp",
      }); //End Ajax
  })
  // End Export all timings all once

  function getSchedules(targetDate) {   
      let date = {date: targetDate};
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $('#submit-spinner').show();

      $.ajax({
          type: "GET",
          url: `get/schedule`,
          cache: false,
          contentType: 'Application/json',
          // processData: true,
          data: { date: date },                
          success: (response) => {
              updateSlotFields(response.data);
              if(response.code == 1000) {

              }
          },
          complete: (response) => {
              // $('#submit-spinner').hide();
          }
          // dataType: "application/json",
          // dataType: "jsonp",
      }); //End Ajax
  }

  function updateSlotFields(data) {
    console.log('Data recieved: preparing slot data');
    console.log(data);
    console.log('..........................')
    let morning = data.filter(slot => slot.shift == "Morning");
    let afternoon = data.filter(slot => slot.shift == "Afternoon");
    let evening = data.filter(slot => slot.shift == "Evening");
    // clear classes

    let copyMorningSlots = morningSlots.map(slot=> {
      return {sTime: slot.sTime, active: false}
    });
    console.log('morning slots ....')
    console.dir(morningSlots);
    console.log('morning slots .... END');
    if(morning.length > 0) {
      morning.forEach((blockData, index)=>{      
        let activeHour = moment(blockData.from_time, 'HH:mm:ss').format('Hmm');
        for(let i = 0; i < copyMorningSlots.length; i++) {
          if(copyMorningSlots[i].sTime == activeHour) {
            copyMorningSlots[i].active = true;
            break;
          }
        }
      })
      console.dir(morning[0]);
      dayChargeFormInput.val(morning[0].session_charges)
    } else {
      dayChargeFormInput.val('');
    }
    
    let copyafternoonSlots = afternoonSlots.map(slot=> {
      return {sTime: slot.sTime, active: false}
    });;
    console.log('copy afternoon slots...')
    console.dir(afternoonSlots)
    console.log('copy afternoon slots...')
    if(afternoon.length > 0) {
      afternoon.forEach((blockData, index)=>{      
        let activeHour = moment(blockData.from_time, 'HH:mm:ss').format('Hmm');
        for(let i = 0; i < copyafternoonSlots.length; i++) {
          if(copyafternoonSlots[i].sTime == activeHour) {
            copyafternoonSlots[i].active = true;
            break;
          }
        }
      })
      console.log('...... session charge')
      console.log(afternoon[0]);
      console.log(afternoon[0].session_charges);
      afternoonChargeFormInput.val(afternoon[0].session_charges)
    } else {
      afternoonChargeFormInput.val('');
    }

    let copyEveningSlots = eveningSlots.map(slot=> {
      return {sTime: slot.sTime, active: false}
    });;
    console.log('copy eveinig slots...')
    console.dir(eveningSlots)
    console.log('copy eveinig slots...')
    if(evening.length > 0) {
      evening.forEach((blockData, index)=>{      
        let activeHour = moment(blockData.from_time, 'HH:mm:ss').format('Hmm');
        for(let i = 0; i < copyEveningSlots.length; i++) {
          if(copyEveningSlots[i].sTime == activeHour) {
            copyEveningSlots[i].active = true;
            break;
          }
        }
      })
      console.log('...... session charge')
      console.log(evening[0]);
      console.log(evening[0].session_charges);
      eveningChargeFormInput.val(evening[0].session_charges)
    } else {
      eveningChargeFormInput.val('');
    }

    populateSlots([...copyMorningSlots, ...copyafternoonSlots, ...copyEveningSlots]);
  }

  function populateSlots(slotTimeArray) {  
    console.log('populating slots ...... with data: ');
    console.log(slotTimeArray);
    daySlotsContainer.empty();
    afternoonSlotsContainer.empty();
    eveningSlotsContainer.empty();


    let momentMorningMax = moment('1200', 'Hmm');
    let momentAfternoonMax = moment('1700', 'Hmm');
    let momentEveningMax = moment('2359', 'Hmm');
    slotTimeArray.forEach(slotTime => {
      let momentSlotTime = moment(slotTime.sTime, 'Hmm');
      
      if(momentSlotTime.isBefore(momentMorningMax)) {
        daySlotsContainer.append(`
            <a href="#" class="success block-selector-block ${slotTime.active ? 'block-selector-active-dblock' : ''}" data-stime="${slotTime.sTime}">
              <i class="fa fa-angle-right" aria-hidden="true"></i>
              <span class="b-time">${moment(slotTime.sTime, 'Hmm').format('h: mm A')}</span><span class="b-price"></span>
            </a>
        `)
      } else if(momentSlotTime.isBefore(momentAfternoonMax)) {
        afternoonSlotsContainer.append(`
            <a href="#" class="success block-selector-block ${slotTime.active ? 'block-selector-active-dblock' : ''}" data-stime="${slotTime.sTime}">
              <i class="fa fa-angle-right" aria-hidden="true"></i>
              <span class="b-time">${moment(slotTime.sTime, 'Hmm').format('h: mm A')}</span><span class="b-price"></span>
            </a>
        `)        
      }
      else {
        eveningSlotsContainer.append(`
            <a href="#" class="success block-selector-block ${slotTime.active ? 'block-selector-active-dblock' : ''}" data-stime="${slotTime.sTime}">
              <i class="fa fa-angle-right" aria-hidden="true"></i>
              <span class="b-time">${moment(slotTime.sTime, 'Hmm').format('h: mm A')}</span><span class="b-price"></span>
            </a>
        `)
      }
    });
            
  }
  

  /* $('#add-slot-form').hide();
  $('#add-slot').click(function(e) {
    $('#add-slot-form').toggle();  
  })

  $('#add-slot-form form').submit(function(e){
    console.log('add-slot');
    e.preventDefault();
    let time = $('#add-time-slot').val();
    $('.block-selector-blocks').append(`
        <div class="block-selector-block-slot" data-stime="${time}">
          <span class="block-selector-delete-block">D</span>
          <span class="block-time">${time}</span>
          <span class="block-price"></span>  
        </div>
  `)
  }) */

  
}) // JQuery Block end

// Helpers
function formatToAmPm(hours){
  let sufix = 'AM';
  if(hours > 1159) sufix = 'PM';
  hours += '';
  return `${hours.substr(0, hours.length-2)} : ${hours.substr(hours.length-2)} ${sufix}`;
}

</script>
    
@endsection