<script>
    $('.myCalendar').calendar({
        date: new Date(),
        autoSelect: false, // false by default
        select: function (date) {
            console.log('SELECT', date)
        },
        toggle: function (y, m) {
            console.log('TOGGLE', y, m)
        }
    });
    $('#navbar-custom-title').text('Appointments');
</script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


<script type="text/javascript">
    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    var chart;

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Year', 'Sales'],
            ['2004', 100],
            ['2005', 500],
            ['2006', 660],
            ['2007', 1030],
            ['2007', 1500],
            ['2007', 1300],
            ['2007', 1320],
        ]);

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
    $('#navbar-custom-title').text('My Profile');
</script>

<script>
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
        </script>
        <script src="{{ asset('js/custom.js') }}"></script>

        <script>
    $('#navbar-custom-title').text('My Profile');
</script>

<script>
    $('.myCalendar').calendar({
        date: new Date(),
        autoSelect: false, // false by default
        select: function (date) {
            console.log('SELECT', date)
        },
        toggle: function (y, m) {
            console.log('TOGGLE', y, m)
        }
    });
    $('#navbar-custom-title').text('Appointments');
</script>
