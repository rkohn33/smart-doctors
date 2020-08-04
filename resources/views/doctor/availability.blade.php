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
                      <p>9:00 AM to 12:00 PM</p>
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
                        <a href="#" class="success" data-stime="900">
                          <i class="fa fa-angle-right" aria-hidden="true"></i>
                          <span class="b-time">9:00 AM</span><span class="b-price"></span>
                        </a>
                        <a href="#" class="success" data-stime="910">
                          <i class="fa fa-angle-right" aria-hidden="true"></i>
                          <span class="b-time">9:10 AM</span><span class="b-price"></span>
                        </a>
                        <a href="#" class="success" data-stime="920">
                          <i class="fa fa-angle-right" aria-hidden="true"></i>
                          <span class="b-time">9:20 AM</span><span class="b-price"></span>
                        </a>
                        <a href="#" class="success" data-stime="930">
                          <i class="fa fa-angle-right" aria-hidden="true"></i>
                          <span class="b-time">9:30 AM</span><span class="b-price"></span>
                        </a>
                        <a href="#" class="success" data-stime="940">
                          <i class="fa fa-angle-right" aria-hidden="true"></i>
                          <span class="b-time">9:40 AM</span><span class="b-price"></span>
                        </a>
                        <a href="#" class="success" data-stime="950">
                          <i class="fa fa-angle-right" aria-hidden="true"></i>
                          <span class="b-time">9:50 AM</span><span class="b-price"></span>
                        </a>
                        <a href="#" class="success" data-stime="1000">
                          <i class="fa fa-angle-right" aria-hidden="true"></i>
                          <span class="b-time">10:00 AM</span><span class="b-price"></span>
                        </a>
                        <a href="#" class="success" data-stime="1010">
                          <i class="fa fa-angle-right" aria-hidden="true"></i>
                          <span class="b-time">10:10 AM</span><span class="b-price"></span>
                        </a>
                        <a href="#" class="success" data-stime="1020">
                          <i class="fa fa-angle-right" aria-hidden="true"></i>
                          <span class="b-time">10:20 AM</span><span class="b-price"></span>
                        </a>
                        <a href="#" class="success" data-stime="1030">
                          <i class="fa fa-angle-right" aria-hidden="true"></i>
                          <span class="b-time">10:30 AM</span><span class="b-price"></span>
                        </a>
                      </div>
                  </div>
                </div>
                <div class="time-slice night" id="time-slice-night">
                  <div class="card-header">
                      <h1><span></span>evening</h1>
                      <a href="#">+ ADD SLOT </a>
                      <p>9:00 AM to 12:00 PM</p>
                  </div>
                  <div class="card-body">
                      <div class="tags block-selector-blocks" data-shift="night">
                        <a href="#" class="success" data-stime="1700">
                          <i class="fa fa-angle-right" aria-hidden="true"></i>
                          <span class="b-time">5:00 PM</span><span class="b-price"></span>
                        </a>
                        <a href="#" class="success" data-stime="1710">
                          <i class="fa fa-angle-right" aria-hidden="true"></i>
                          <span class="b-time">5:10 PM</span><span class="b-price"></span>
                        </a>
                        <a href="#" class="success" data-stime="1720">
                          <i class="fa fa-angle-right" aria-hidden="true"></i>
                          <span class="b-time">5:20 PM</span><span class="b-price"></span>
                        </a>
                        <a href="#" class="success" data-stime="1730">
                          <i class="fa fa-angle-right" aria-hidden="true"></i>
                          <span class="b-time">5:30 PM</span><span class="b-price"></span>
                        </a>
                        <a href="#" class="success" data-stime="1740">
                          <i class="fa fa-angle-right" aria-hidden="true"></i>
                          <span class="b-time">5:40 PM</span><span class="b-price"></span>
                        </a>
                        <a href="#" class="success" data-stime="1750">
                          <i class="fa fa-angle-right" aria-hidden="true"></i>
                          <span class="b-time">5:50 PM</span><span class="b-price"></span>
                        </a>
                        <a href="#" class="success" data-stime="1800">
                          <i class="fa fa-angle-right" aria-hidden="true"></i>
                          <span class="b-time">6:00 PM</span><span class="b-price"></span>
                        </a>
                        <a href="#" class="success" data-stime="1810">
                          <i class="fa fa-angle-right" aria-hidden="true"></i>
                          <span class="b-time">6:10 PM</span><span class="b-price"></span>
                        </a>
                        <a href="#" class="success" data-stime="1820">
                          <i class="fa fa-angle-right" aria-hidden="true"></i>
                          <span class="b-time">6:20 PM</span><span class="b-price"></span>
                        </a>
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
  let dayFormInput = $('#time-slice-day .block-selector-form input');
  let nightFormInput = $('#time-slice-night .block-selector-form input');

  let dateDisplay = $('#date-display');

  var iCal = new iCalendar('calendar');
  iCal.render();
  document.addEventListener('iCalendarDateSelected', function(event) {
    console.log(iCal.selectedDate);
    let time = moment("2020-8-6", "YYYY-MM-DD");
    console.log(time);
    
    //moment("12-25-1995", "MM-DD-YYYY");
  });

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

    dayFormInput.attr('disabled', '');
    nightFormInput.attr('disabled', '');
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
          dayFormInput.removeAttr('disabled');
        } else {
          nightFormInput.removeAttr('disabled');
        }
        // Check for Clicked twice on same object.
        if($(currentBlock).hasClass('block-selector-block-selected')){
            console.log('Clicked on selected block');
            $(currentBlock).removeClass('block-selector-block-selected');
            if(currentBlock == startBlock) {
              startBlock = null;
              $(currentBlock).removeClass('block-selector-active-dblock');
            }
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

  /* $('.time-slice .block-selector-form form').submit(function(e){
    e.preventDefault();  
    formActive = false;
    $form = $(this);
    let chargeField = $form.find("[type=text]");
    let blocksTobeSet;
    if($(this).data('shift') == 'day') {
      console.log('day data submitted........');
      blocksTobeSet = $('#time-slice-day .block-selector-block-selected');
    } else {
      console.log('night data submitted........');
      blocksTobeSet = $('#time-slice-night .block-selector-block-selected');
    }
    setCharge(blocksTobeSet, chargeField.val());
    chargeField.val('');
  }) */

  $('.time-slice .block-selector-form form').submit(function(e){
    e.preventDefault();  
    formActive = false;
    $form = $(this);
    let chargeField = $form.find("[type=text]");
    let blocksTobeSet;
    if($(this).data('shift') == 'day') {
      blocksTobeSet = $('#time-slice-day .block-selector-block-selected');
    } else {
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

  $('#export').click(function(e) {
    let scheduleData = [];
    let morningCharge = '';
    let morningTimings = [];
    let nightCharge = '';
    let nightTimings = [];
    // extract morning timings

    $.each($('#time-slice-day .block-selector-active-dblock'), function(index, block){
      $(block).css('border', '2px solid red');
      morningTimings.push($(block).data('stime'));
    })

    $.each($('#time-slice-night .block-selector-active-dblock'), function(index, block){
      $(block).css('border', '2px solid red');
      nightTimings.push($(block).data('stime'));
    })

    scheduleData.push(
        {
          date: "2020-07-31",
          timings: morningTimings,
          session_charge: morningCharge,
          shift_type: "Morning"
        },
        {
          date: "2020-07-31",
          timings: nightTimings,
          session_charge: nightCharge,
          shift_type: "Evening"
        }
      );
  })

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