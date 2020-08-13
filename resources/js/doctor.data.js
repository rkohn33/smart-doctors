/* 
$tableAppointment : jQuery object for Appointment table. Should target <tbody> by id
 */

DoctorData = function($tableAppointment){
    var responseTimeFormat = 'YYYY-MM-DD HH:mm:ss';
    var requestTimeFormat = 'YYYY-MM-DD';

    return {
        getAppointments : function (momentDate, page = null) {
            let date = momentDate.format(requestTimeFormat)
            let url = page == null ?  '/doctor/get/appointment' : `/doctor/get/appointment?page=${page}`;
            return new Promise((resolve, reject)=>{
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
      
                $.ajax({
                    type: "GET",
                    url,
                    cache: false,
                    contentType: 'application/json',
                    data: { date },
                    success: (response) => {
                        // let appointmentData = response[0];
                        if(response.code == 1000) {
                          resolve(response);
                        }
                    },
                    error: () => {
                        // $('#submit-spinner').hide();
                        reject({msg: 'connection error'});
                    },
                    dataType: "json",
                }); //End Ajax
            })
        },
        nextConsultation : function() {
            console.log('appointments Today: ')
            console.dir(this.appointmentsToday);
            for(let i=0; i < this.appointmentsToday.length; i++) {
                if(moment().isSameOrBefore(moment(this.appointmentsToday[i].appointment, responseTimeFormat))) {
                    return this.appointmentsToday[i];
                }
                return null;
            }
        },
        updateAppointmentsTable : function(appointmentsArray) {
            $tableAppointment.empty();
            if(appointmentsArray.length > 0){
                $.each(appointmentsArray, function(index, dataRow){
                    console.log('updateAppointmentsTable ap time: '+dataRow.appointment);
                    const dateTime = moment(dataRow.appointment, responseTimeFormat);
                    $tableAppointment.append(
                        `<tr>  
                            <td>${dataRow.firstname + ' ' + dataRow.lastname}</td>  
                            <td>Consultation</td>  
                            <td>${dateTime.format('DD-MM-YYYY')}</td>  
                            <td>${dateTime.format('h:mm A')}</td>  
                        </tr>`)       
                })
            } else {
                $tableAppointment.append(
                `<tr>
                    <td colspan=4 class="text-center">No Record Found!</td>
                </tr>`)
            }
        },
        updateNextConsultation: function($patient, $appointment, $appointLink) {
            let nextData = this.nextConsultation();
            if(nextData == null) {
                $patient.text('No Further Appointment');
                $appointment.text();
                $appointLink.attr('hidden');
                return;
            }
            
            $patient.text(nextData.firstname + ' ' + nextData.lastname);
            $appointment.text(moment(nextData.appointment, responseTimeFormat).format('h:mm A'));
            $appointLink.removeAttr('hidden');
            $appointLink.attr('href', `consultation/${nextData.patient_id}`);            
        },
        prepareAppointment(date, targetPage = null) {
            this.getAppointments(date, targetPage)
            .catch(error=>{
                console.info('Rejection: ' + error.msg);
            })
            .then(appointments=>{
                this.updateAppointmentsTable(appointments.data[0].data);
                this.updatePaginate(appointments.data[0]);
            })
        },
        updatePaginate(paginateData) {
            console.log(paginateData);
            if(paginateData.prev_page_url == null) {
                $('#paginate-prev').attr('disabled', '');
                $('#paginate-prev').data('page', null);
            } else {
                $('#paginate-prev').removeAttr('disabled');
                $('#paginate-prev').data('page', this.getPageNumFromUrl(paginateData.prev_page_url));
            }
            
            if(paginateData.next_page_url == null) {
                $('#paginate-next').attr('disabled', '');            
                $('#paginate-next').data('page', null);
            } else {
                $('#paginate-next').removeAttr('disabled');
                $('#paginate-next').data('page', this.getPageNumFromUrl(paginateData.next_page_url));
            }
            
            $('#paginate-total').text(paginateData.total);
            $('#paginate-current-total').text(paginateData.to);
        }, 
        /*
        * groupBy = 'day' or 'week' or 'month'
        * labelShort = bool | Fri or Friday, Jan or January
        * will return 7 days, 7 months, 7 weeks grouped data
        */
        getEarnings: function(groupBy = 'day', labelShort = true) {
            let date;
            let dayLabel = labelShort ? 'ddd' : 'dddd';
            let monthLabel = labelShort ? 'MMM' : 'MMMM';

            if(groupBy == 'month'){
                date = moment().subtract(7, 'months').format(requestTimeFormat);                
            } else if(groupBy == 'week') {
                date = moment().subtract(28, 'days').format(requestTimeFormat);
            } else {
                date = moment().subtract(7, 'days').format(requestTimeFormat);
            }
            

            // 21 days back + 
            // 14 days back + 7days back
            // 7 day back + today
            // Last 7
            function reportByDay(data) {
                let labelDate;
                let earningData = [];
                for(let i = 6; i>=0; i--){
                    earningData.push({
                        label: moment().subtract(i, 'days'),
                        amount: 0
                    })
                }

                for(i=0; i<data.length; i++){
                    labelDate = moment(data[i].date, responseTimeFormat);

                    for(let j=0; j<earningData.length; j++){
                        console.log('j:' + j +'|'+earningData[j].label + '||' + labelDate);
                        if(earningData[j].label.isSame(labelDate, 'day')){
                            earningData[j].amount += parseInt(data[i].amount);
                            console.log('----');
                            break;
                        };
                    }
                }
                for(i=0; i<earningData.length-2; i++) {
                    earningData[i].label = earningData[i].label.format(dayLabel);
                }
                earningData[earningData.length-1].label = 'Today';
                earningData[earningData.length-2].label = 'Yesterday';

                let total = 0;
                earningData.forEach(eData => total += eData.amount);
                let current = earningData[earningData.length-1].amount;
                let average = (total/7).toFixed(0);
                let change = ((current - average)/100) + '%';

                return {
                    extra: {
                        current,
                        average,
                        icon: current >= average ? 1 : -1,
                        change,
                        message: 'Todays Earning / Last 6 days.',
                    }, 
                    data: earningData
                };
            }
            function reportByMonth(data) {
                let labelDate;
                let earningData = [];
                for(let i = 6; i>=0; i--){
                    earningData.push({
                        label: moment().subtract(i, 'months'),
                        amount: 0
                    })
                }

                for(i=0; i<data.length; i++){
                    labelDate = moment(data[i].date, responseTimeFormat);

                    for(let j=0; j<earningData.length; j++){
                        if(earningData[j].label.isSame(labelDate, 'month')){
                            earningData[j].amount += parseInt(data[i].amount);
                            found = true;
                            break;
                        };
                    }
                }

                for(i=0; i<earningData.length-2; i++) {
                    earningData[i].label = earningData[i].label.format(dayLabel);
                }

                earningData[earningData.length-1].label = 'This Month';
                earningData[earningData.length-2].label = 'Last Month';

                let total = 0;
                earningData.forEach(eData => total += eData.amount);
                let current = earningData[earningData.length-1].amount;
                let average = (total/7).toFixed(0);
                let change = ((current - average)/100) + '%';

                return {
                    extra: {
                        current,
                        average,
                        icon: current >= average ? 1 : -1,
                        change,
                        message: 'This Month / Last 6 Months.',
                    }, 
                    data: earningData
                };              
            }

            /*

            *
            48  47  46  45  44   43   42
            41  40  39  38  37   36   35
            34  33  32  31  30   29   28
            27  26  25  24  23   22   21
            20  19  18  17  16   15   14
            13  12  11  10  9    8    7
            6   5   4   3   2    1    0

            */
            function reportByWeek(data) {
                let earningData = [];
                for(let i = 42; i>=0; i-=7){
                    earningData.push({
                        label: moment().subtract(i, 'days'),
                        amount: 0
                    })
                }
                               

                for(i=0; i<data.length; i++){
                    let dataDay = moment(data[i].date, responseTimeFormat);

                    for(let j=0; j<earningData.length; j++){
                        if(dataDay.isSameOrBefore(earningData[j].label, 'day')){
                            earningData[j].amount += parseInt(data[i].amount);
                            break;
                        };
                    }
                }

                
                for(i=0; i<earningData.length-2; i++){
                    earningData[i].label = earningData[i].label.format('DD MMM');
                } 
                earningData[earningData.length-1].label = 'This Week';
                earningData[earningData.length-2].label = 'Last Week';
                // console.log(earningData);

                let total = 0;
                earningData.forEach(eData => total += eData.amount);
                let current = earningData[earningData.length-1].amount;
                let average = (total/7).toFixed(0);
                let change = ((current - average)/100) + '%';

                return {
                    extra: {
                        current,
                        average,
                        icon: current >= average ? 1 : -1,
                        change,
                        message: 'This Week / Last 6 Weeks.',
                    }, 
                    data: earningData
                };
            }
            
            return new Promise((resolve, reject)=>{
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
      
                $.ajax({
                    type: "GET",
                    url: `/doctor/get/earning`,
                    cache: false,
                    contentType: 'application/json',
                    data: { date },
                    success: (response) => {
                        console.dir(response.data);                        
                        if(response.code == 1000) {
                            let earningData = [];
                            if(groupBy == 'month') {
                                earningData = reportByMonth(response.data);
                            } else if(groupBy == 'week'){
                                earningData = reportByWeek(response.data);                                
                            } else {
                                earningData = reportByDay(response.data);
                            }

                            resolve(earningData);
                        }
                    },
                    error: () => {
                        // $('#submit-spinner').hide();
                        reject({msg: 'connection error'});
                    },
                    dataType: "json",
                }); //End Ajax
            })
        },
        getEarningsLastSevenDay: function() {
            let date = moment().format(requestTimeFormat);
            console.log('requesting for date: ' + date);
            return new Promise((resolve, reject)=>{
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
      
                $.ajax({
                    type: "GET",
                    url: `/doctor/get/earning`,
                    cache: false,
                    contentType: 'application/json',
                    data: { date },
                    success: (response) => {
                        // let appointmentData = response[0];
                        // let appointments = response.data[0].data;
                        if(response.code == 1000) {
                          resolve([{date:moment().subtract(), amount: totalAmount}]);
                        }
                    },
                    error: () => {
                        // $('#submit-spinner').hide();
                        reject({msg: 'connection error'});
                    },
                    dataType: "json",
                }); //End Ajax
            })
        },
        getPageNumFromUrl(str) {
            const regex = /(page=)(\d+)/;
            return regex.exec(str)[2];
        },
        responseTimeFormat : responseTimeFormat,
        requestTimeFormat : requestTimeFormat,
        appointmentsToday : null,
    }
};

