@extends('main-layout.master')

@section('content')

<div class="s-layout">
@include('doctor.includes.side-nav-bar')
@include('doctor.includes.header')

    <div class="content">
    <div class="card mt-5 mb-3 patient-card" style="margin-top:5rem !important;">
                <div class="row">
                    <div class="col-md-6">
                        <div class="sub-header pt-2 pl-4">PATIENT INFORMATION</div>
                        <hr>
                            <div class="row pl-4">
                                <div class="col col-md-6">
                                    <div class="profile-text2">Patient</div>
                                    <div class="profile-text">{{$patient_details['firstname'].' '.$patient_details['lastname']}}</div>
                                    <div class="profile-text2">Age</div>
                                    <div class="profile-text">
                                      @php
                                        $dbDate = \Carbon\Carbon::parse($patient_details['dob']);
                                        $diffYears = \Carbon\Carbon::now()->diffInYears($dbDate);
                                      @endphp
                                      {{$diffYears}} Years</div>
                                    <div class="profile-text2">Sex</div>
                                    <div class="profile-text">{{$patient_details['gender']}}</div>
                                </div>
                                <div class="col col-md-6">
                                    <div class="profile-text2">Seeking Speciality</div>
                                    <div class="profile-text">Phychology</div>
                                    <div class="profile-text2">Consultation Reason</div>
                                    <div class="profile-text">{{$patient_details['symptoms']}}
                                    </div>
                                </div>
                            </div>
                    </div>


                    <div class="col-md-6 vital-signs">

                        <div class="sub-header pt-2 pl-2">VITAL SIGNS</div>
                        <hr>
                        <div class="col col-md-12">
                        <div class="row">
                            <div class="col col-md-6">
                                <div class="my-2">
                                    <label class="profile-text2">Weight(kg)</label>
                                    <input class="float-right box" type="text"  name="" size="9"><br>
                                </div>
                                <div class="my-2">
                                    <label class="profile-text2">Temprature</label>
                                    <input class="float-right box" type="text"  name="" size="9"><br>
                                </div>
                                <div class="my-2">
                                    <label class="profile-text2">Hate rate</label>
                                    <input class="float-right box" type="text"  name="" size="9"><br>
                                </div>
                            </div>
                            <div class="col col-md-6">
                                <div class="my-2">
                                    <label class="profile-text2">Height(mt)</label>
                                    <input class="float-right box" type="text"  name="" size="9"><br>
                                </div>
                                <div class="my-2">
                                    <label class="profile-text2">Pressure</label>
                                    <input class="float-right box" type="text"  name="" size="9"><br>
                                </div>
                                <div class="my-2">
                                    <label class="profile-text2">Others</label>
                                    <input class="float-right box" type="text"  name="" size="9"><br>
                                </div>

                                <button class="start-now float-right px-4">Save</button>
                            </div>

                        </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="card mt-5 mb-3 contact-header">
                <div class="row">
                    <img class="pl-2" src="{{ url('img/phone.svg') }}">
                    <div class="patient-name pl-1 pt-2">Betta Della Cruz</div>
                    <button type="button" class="mt-2 btn start-now padding-left"><span class="pr-2">Send
                            Report</span><img src="{{ url('img/white-arrow.svg') }}"></button>
                </div>
                <div id="media-div">
           </div>
                <img src="{{ url('img/chatandvideo.png') }}" height="500px">
            </div>
    </div>
  </div>

@endsection
@section('js')
<script src="//media.twiliocdn.com/sdk/js/video/v1/twilio-video.min.js"></script>
<script>
 Twilio.Video.createLocalTracks({
    audio: true,
    video: {
        width: 300
    }
}).then(function(localTracks) {
    return Twilio.Video.connect('{{ $join_room["accessToken"] }}', {
        name: '{{ $join_room["roomName"] }}',
        tracks: localTracks,
        video: {
            width: 300
        }
    });
}).then(function(room) {
    console.log('Successfully joined a Room: ', room.name);

    room.participants.forEach(participantConnected);

    var previewContainer = document.getElementById(room.localParticipant.sid);
    if (!previewContainer || !previewContainer.querySelector('video')) {
        participantConnected(room.localParticipant);
    }

    room.on('participantConnected', function(participant) {
        console.log("Joining: '" +participant.identity+ "'");
        participantConnected(participant);
    });

    room.on('participantDisconnected', function(participant) {
        console.log("Disconnected: '" + participant.identity + "'");
        participantDisconnected(participant);
    });
});
// additional functions will be added after this point

function participantConnected(participant) {
    console.log('Participant "%s" connected', participant.identity);

    const div = document.createElement('div');
    div.id = participant.sid;
    div.setAttribute("style", "float: left; margin: 10px;");
    div.innerHTML = "<div style='clear:both'>" +participant.identity+ "</div>";

    participant.tracks.forEach(function(track) {
        trackAdded(div, track)
    });

    participant.on('trackAdded', function(track) {
        trackAdded(div, track)
    });
    participant.on('trackRemoved', trackRemoved);

    document.getElementById('media-div').appendChild(div);
}

function participantDisconnected(participant) {
    console.log('Participant "%s" disconnected', participant.identity);

    participant.tracks.forEach(trackRemoved);
    document.getElementById(participant.sid).remove();
}

function trackAdded(div, track) {
    div.appendChild(track.attach());
    var video = div.getElementsByTagName("video")[0];
    if (video) {
        video.setAttribute("style", "max-width:300px;");
    }
}

function trackRemoved(track) {
    track.detach().forEach(function(element) {
        element.remove()
    });
}
</script>
@endsection