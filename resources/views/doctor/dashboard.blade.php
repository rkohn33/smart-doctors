
@extends('main-layout.master')
@section('content')
@include('doctor.includes.header')
@include('doctor.includes.side-nav-bar')


<div class="container-fluid">
    <div class="content-wrapper">
    <div class="container fluid-child-container inner-container hompage">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <div class="row">
            <div class="col-lg-8 col-xs-12">                
                <br>
                <h1 class="top-heading">Welcome Back, {{ucfirst($profile['salutation']).'. '.ucfirst($profile['last_name'])}}</h1>
                <p class="sub-heading mb-0 pb-0">Here is your account at a glance.</p>
            </div>
            <div class="col-lg-4  col-xs-12">
                <img src="{{ url('img/doctor.jpg') }}" class="img-fluid">
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
                            <div class="col-7">
                                <span class="revenue"><strong><span id="ct-last-amount"></span></strong></span>
                                <i class="revenue-arrow fa" id="ct-indicator"></i>
                                <span class="revenue-percentage"><strong><span id="ct-percent-change"></span></strong></span>                                
                            </div>
                            <div class="col-5">
                                <div class="dropdown float-right mt-3">
                                    <select class="form-control p-1" id="report-group">
                                        <option selected="selected" value="day">Day</option>
                                        <option value="week">Week</option>
                                        <option value="month">Month</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row"><div class="col-12"><h5 id="ct-message"></h5></div></div>
                    </div>
                    <div class="card-body" id="curve_chart" style="width: 100%; height: 200px;padding: 0; background: #202F4C;">
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
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="{{ asset('js/doctor.data.js') }}" type="text/javascript"></script>
<script>
    google.charts.load('current', {'packages': ['corechart']});

    /* var data = google.visualization.arrayToDataTable([
            ['', ''],
            ['0', 0],
            ['0', 0],
            ['0', 0],
            ['0', 0],
            ['0', 0],
            ['0', 0],
            ['0', 0],
        ]);
        
    google.charts.setOnLoadCallback(drawChart(data)); */
    var chart;

        
    function drawChart(data) {
        

        var options = {
            series: {
                0: {color: '#04C6FF', areaOpacity: 0.1},
            },
            title: '',
            curveType: 'function',
            legend: {
                position: 'none',
                textStyle: {
                    color: 'white'
                }
            },
            chartArea: {
                left: 0,
                top: 10,
                width: 1260,
                height: 350
            },
            backgroundColor: '#202F4C',
            color: "#fff",
            hAxis: {
                textStyle: {
                    color: 'white'
                },
                textPosition: 'none'
            },
            vAxis: {
                textStyle: {
                    color: 'white'
                },
                titleTextStyle: {
                    color: 'white'
                },
                gridlines: {
                    color: 'transparent'
                },
                textPosition: 'none'
            },
            pointsVisible :true
        };

        chart = new google.visualization.AreaChart(document.getElementById('curve_chart'));

        chart.draw(data, options);

        $(window).resize(function () {
            chart.draw(data, options);
        });
    }
</script>
<script>
jQuery(document).ready(async function($){ 
    let momentToday = moment();
    let momentSelected = moment();
    let tableAppointment = $('#table-appointments');

    $('#hamburger').click(function(){
    $(this).toggleClass('open');
    }); 

    $selectDay = $('#select-day');
    for(let i=1; i<6; i++){
        if( i == 1 ) {
            $selectDay.append(`<option value="${i}">Tomorrow</option>`)
        } else {
            $selectDay.append(`<option value="${i}">${moment().add(i, 'days').format('dddd')}</option>`)
        }
    }

    // Store todays appointment
    let doctorData = DoctorData(tableAppointment);
    let appointments = await doctorData.getAppointments(momentToday, null, true);
    doctorData.appointmentsToday = appointments.data[0];

    // Show appointments when page loads
    // doctorData.updateAppointmentsTable(doctorData.appointmentsToday);
    doctorData.updateNextConsultation($('#next-patient'), $('#next-appointment'), $('#next-appointment-link'));
    // doctorData.updatePaginate(appointments.data[0]);

    doctorData.prepareAppointment(moment());

    updateChart();


    // Fetch appointment by selecting day select option
    $selectDay.on('change', function(e){
        let upcomingDay = moment().add($(this).val(), 'days');
        momentSelected = upcomingDay.clone();
        doctorData.prepareAppointment(upcomingDay);
    })    

    // Update Chart report by select option
    $('#report-group').on('change', function(e){
        updateChart(e.target.value);
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
    
    function updateChart(group = 'day') {
      doctorData.getEarnings(group)
        .catch(e=>console.log(e))
        .then(processedData=>{
            let changeIcon = processedData.extra.icon < 0 ? 'fa-arrow-down' : 'fa-arrow-up';
            $('#ct-indicator').removeClass('fa-arrow-down');
            $('#ct-indicator').removeClass('fa-arrow-up');

            $('#ct-last-amount').text('$' + processedData.extra.current);
            $('#ct-indicator').addClass(changeIcon);
            $('#ct-percent-change').text(processedData.extra.change);
            $('#ct-message').text(processedData.extra.message);

            let newData = [[group, 'Earning']]
            processedData.data.forEach(eData=>{
                newData.push([eData.label, eData.amount]);
            })
            drawChart(google.visualization.arrayToDataTable(newData));
        });// End then block
    }
}) // jQuery block end
</script>
@endsection
