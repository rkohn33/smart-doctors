  @extends('main-layout.master')
@include('patient.includes.header')
@section('content')
@include('patient.includes.side-nav-bar')

<div class="col-lg-12 p-0">
    <div class="col-lg-6  float-left">
      <div class="text-center">
        <h4 class="dr_name mt-5">Dr. John Cruz</h4>
        <h6 class="dr_title m-0">General Practitioner</h6>
      </div>
      <div>
        <img src="images/vedio_call.png" class="w-100 mt-5">
      </div>


    </div>





    <div class="col-lg-6 bgcolor  float-right">

      <div class="row width_custom pl-lg-5 pt-4 mt-5">
        <div class="row pl-lg-3">
          <div class=" circle_chat_status mt-2 mr-md-4  mr-2"></div>
          <h6 class="dr_chat m-0 ">ONGOING CALL</h6>
        </div>

      </div>

      <div class="mt-5 ">
        <div>
          <div style="width: 100%;" class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-my_btn active">
              <input type="radio" name="options" id="option1" autocomplete="off" checked><b>CHAT</b>
            </label>

            <label class="btn btn-my_btn">
              <input type="radio" name="options" id="option3" autocomplete="off"> <b>HISTRY</b>
            </label>
          </div>
        </div>
        <div class="col-sm-12 frame">
          <h6 class="text-center mt-3" style="font-weight: 600;color: #2e2d60;">July 25, 2020</h6>
          <ul>
            <li style="width:100%;">
              <div class="msj-rta1 macro">
                <div class="text text-r">
                  <p style="color: #202F4D;">I had Headache for last 4 days</p>
                </div></div>
                <div class="avatar" style="padding:0px 0px 0px 10px !important"></div>
            </li>
            <p><small class="time_chat">12:45 PM</small></p>
            <li style="width:100%" >
              <div class="msj macro">
                <div class="text text-l">
                  <p>Have you taken anything for it Yet?</p>
                  <p><small></small></p>
                </div>
              </div>
            </li>
          </ul>





          <div class="col-lg-12 col-md-12 p-0">
            <div class="p-0 macro" style="margin-left: 5px; width: 100%;">
              <div class="text text-r" style="background:whitesmoke !important">
                <input class="mytext" placeholder="Type a message">

              </div>
            </div>
            <button class="butten_msg_data"><i class="fa fa-paperclip fa-1x"></i></button>
            <button class="btn btn-info button_margin" href="">Send</button>
          </div>
        </div>
      </div>






    </div>

  </div>

  @include('patient.includes.footer')
@endsection

