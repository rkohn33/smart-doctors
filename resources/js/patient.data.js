/* 
 */

PatientData = function(){
    var responseTimeFormat = 'YYYY-MM-DD HH:mm:ss';
    var requestTimeFormat = 'YYYY-MM-DD';

    // mocks---------------------
    let doctors = [{
        id: 0,
        profile_image: 'img/profile.png',
        rating: 4.5,
        name: 'John doe',
        qualification: 'MBBS, MPHIL',
        speciality: 'Cardio',
        experience: '2+ years',
        language: 'English',
        availability: ['800', '830', '930', '1130', '1730', '2130']
    },
    {
        id: 1,
        profile_image: 'img/profile.png',
        name: 'Jane doe',
        qualification: 'MBBS, MSS',
        speciality: 'Heart',
        experience: '5+ years',
        language: 'English',
        availability: ['1200', '1230', '1300', '1400', '2230', '2300']
    },
    {
        id: 2,
        profile_image: 'img/profile.png',
        name: 'Dr Strange',
        qualification: 'MBBS, MSS',
        speciality: 'Sargeon',
        experience: '10+ years',
        language: 'English',
        availability: ['930', '1130', '1400', '1430']
    }];

    // mocks---------------------


    return {
        setAppointment: function(appointment) {

        },
        getAppointment: function(date) {
            return new Promise((resolve, reject)=>{
                setTimeout(resolve, 2000, [{consultation: 'General', }]);
            })               
        },
        getDoctors: function (searchTerm) {
            return new Promise((resolve, reject)=>{
                setTimeout(resolve, 2000, doctors);
            })        
        },
        getDoctorById: function(docId) {
            return new Promise((resolve, reject)=>{
                setTimeout(resolve, 2000, doctors[docId]);
            })
        },
        getMyDoctors : function() {
            let myDoctors = [];
            for(let i=0;i<2; i++){
                myDoctors.push(doctors[i]);
            }        
            return new Promise((resolve, reject)=>{
                setTimeout(resolve, 2000, myDoctors);
            })
        },
        getDoctorAvailabilityByDate: function(docId, date){
            let rand = Math.ceil(Math.random() * doctors.length);
            return new Promise((resolve, reject)=>{
                setTimeout(resolve, 2000, doctors[rand].availability);
            })
        },
        getProfileCompletion: function() {
            return new Promise((resolve, reject)=>{
                setTimeout(resolve, 2000, '95%');
            })
        },
        populateYourDoctor: function(doctorData, $containerDomRef) {
            doctorData.forEach((doctor, index) => {
                $containerDomRef.append(
                  `<div ${index == 0 ? '': 'class="bottombar"'}>
                    <h4 class="doctor_heading1">${doctor.name}<i class="fa fa-ellipsis-h doctor_edit" aria-hidden="true"></i>
                    </h4>
                    <p class="doctor_subheading">${doctor.speciality}</p>
                  </div>`)
            })
          },
        responseTimeFormat : responseTimeFormat,
        requestTimeFormat : requestTimeFormat,
        appointmentsToday : null,
    }
};

