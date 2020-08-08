/* 
$tableAppointment : jQuery object for Appointment table. Should target <tbody> by id
 */

DoctorData = function($tableAppointment){
    var responseTimeFormat = 'YYYY-MM-DD HH:mm:ss';
    var requestTimeFormat = 'YYYY-MM-DD';

    return {
        getAppointments : function (momentDate) {
            let date = momentDate.format(requestTimeFormat)
            return new Promise((resolve, reject)=>{
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
      
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
        },
        nextConsultation : function() {
            console.log('appointments Today: ' + this.appointmentsToday);
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
        responseTimeFormat : responseTimeFormat,
        requestTimeFormat : requestTimeFormat,
        appointmentsToday : null,
    }
};

