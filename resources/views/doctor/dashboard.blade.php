
@extends('main-layout.master')
@section('content')
@include('doctor.includes.header')
@include('doctor.includes.side-nav-bar')


<div class="container-fluid">
    <div class="inner-container hompage">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <div class="row">
            <div class="col-lg-8 col-xs-12">
                <br>
                <h1 class="top-heading">Welcome Back, {{ucfirst($profile['salutation']).'. '.ucfirst($profile['last_name'])}}</h1>
                <p class="sub-heading">Here is your account at a glance.</p>
            </div>
            <div class="col-lg-4  col-xs-12">
                <img src="{{ url('img/doctor.jpg') }}" style="width: 100%;height: 100%">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8  col-xs-12">
                <div class="card mb-5">
                    <div class="card-header">Appointments
                        <div class="dropdown float-right ">
                        <select class="form-control js-special-tags" id="select-day">
                            <option value="0">Today</option>
                        </select>
                        </div>
                    </div>
                    <div class="card-body" style="padding: 0;">
                        <div class="table-responsive" style="min-height: 450px;">
                            <table class="table">
                                <thead>
                                <tr>
                                <th scope="col">NAME</th>
                                <th scope="col">TYPE</th>
                                <th scope="col">DATE</th>
                                <th scope="col">TIME</th>
                                </tr>
                                </thead>
                                <tbody id="table-appointments">
                                
                                </tbody>
                            </table>
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
            <div class="col-xs-12 col-lg-4">
                <div class="card mb-5">
                    <div class="card-header">Next Consultation</div>
                    <div class="card-body">
                        <h6><strong id="next-patient"></strong></h6>
                        <h3><strong id="next-appointment"></strong></h3>
                        <a id="next-appointment-link" href="" class="btn btn-info startnow" hidden>Start Now &nbsp;<i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                <div class="card mb-5" style="margin-top: 20px;">
                    <div class="chart-data">
                        <div class="row">
                            <div class="col-8">
                                <span class="revenue"><strong>$2,503</strong></span>
                                <i class="revenue-arrow fa fa-arrow-up"></i>
                                <span class="revenue-percentage"><strong>2%</strong></span>
                                <h5>Earning this week</h5>
                            </div>
                            <div class="col-4">
                                <div class="dropdown float-right mt-3">
                                    <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
                                        Week
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Link 1</a>
                                        <a class="dropdown-item" href="#">Link 2</a>
                                        <a class="dropdown-item" href="#">Link 3</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" id="curve_chart" style="width: 100%; height: 200px;padding: 0">
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
<script>
jQuery(document).ready(async function($){ 
    let momentToday = moment();
    let tableAppointment = $('#table-appointments');

    $('#hamburger').click(function(){
    $(this).toggleClass('open');
    }); 

    $selectDay = $('#select-day');
    for(let i=1; i<6; i++){
        $selectDay.append(`<option value="${i}">${moment().add(i, 'days').format('dddd')}</option>`)
    }

    // Next cosultation 
    let doctorData = DoctorData(tableAppointment);
    console.log(Date());
    let appointments = await doctorData.getAppointments(momentToday);
    console.log(Date());
    console.log(appointments);
    doctorData.appointmentsToday = appointments;

    doctorData.updateAppointmentsTable(appointments);
    doctorData.updateNextConsultation($('#next-patient'), $('#next-appointment'), $('#next-appointment-link'));


    $selectDay.on('change', function(e){
        let upcomingDay = moment().add($(this).val(), 'days');

        doctorData.getAppointments(upcomingDay)
        .catch(error=>{
            console.info('Rejection: ' + error.msg);
        })
        .then(appointments=>{
            doctorData.updateAppointmentsTable(appointments);
        })
    })
})
</script>
@endsection
