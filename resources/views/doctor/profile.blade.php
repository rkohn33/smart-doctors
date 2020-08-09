@extends('main-layout.master')
@section('content')
@include('doctor.includes.header')
@include('doctor.includes.side-nav-bar')
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">  
  <symbol id="ico-trash-can" viewBox="0 0 512 512">
    <g><path id="XMLID_1089_" d="m428.332 135.275-11.167-33.466c-2.248-6.736-8.552-11.278-15.653-11.278h-291.024c-7.101 0-13.405 4.543-15.653 11.278l-11.167 33.466c-2.53 7.582 3.113 15.414 11.106 15.414h322.451c7.994 0 13.637-7.832 11.107-15.414z"/><path id="XMLID_835_" d="m135.615 491.767c1.28 11.519 11.016 20.233 22.606 20.233h193.718c11.59 0 21.326-8.715 22.606-20.233l34.565-311.077h-308.06z"/><path id="XMLID_831_" d="m225.89 42.998c0-7.167 5.831-12.998 12.998-12.998h44.189c7.167 0 12.998 5.831 12.998 12.998v17.533h30v-17.533c0-23.709-19.289-42.998-42.998-42.998h-44.189c-23.709 0-42.998 19.289-42.998 42.998v17.533h30z"/></g>
  </symbol>  
</svg>
<img src="{{ url('img/gradient.png') }}" class="top-bar-profile">
<div class="container-fluid">
    <div class="inner-container profile-overlap">
        <div id="submit-spinner" class="spinner" style="position: absolute; right: 84px; top: -86px;"></div>
        <button class="btn" id="check-btn" style="position: absolute; right: 0; top: 0; background-color: #05BEF6">Update</button>
        <div class="row">
            <div class="col-lg-3">
                <div class="edit-area profile-edit-area">
                    <input type="file" name="file-profile" id="input-profile-upload" class="input-profile-upload" data-multiple-caption="{count} files selected" onchange="previewFile(this)" />
                    <label for="input-profile-upload"><span class="edit-icon edit-icon-profile"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14" aria-hidden="true" role="img"><path d="M0 11.044V14h2.956l8.555-8.633L8.556 2.41 0 11.044zm13.767-7.933a.752.752 0 000-1.089L11.977.233a.752.752 0 00-1.088 0l-1.4 1.4 2.955 2.956 1.323-1.478z"></path></svg></span></label>
                    <div class="profile-container">
                        @if(!empty($profile['profile_pic']))
                           <img src="{{'data:'.mime_content_type(Storage::disk('local')->path($profile['profile_pic'])) . ';base64,'.base64_encode(Storage::disk('local')->get($profile['profile_pic']))}}" class="profile-photo" id="upload-profile">
                        @else
                          <img src="{{url('img/profile.png')}}" class="profile-photo" id="upload-profile">
                        @endif
                    </div>
                </div>
                <h4><strong>Profile Completeness</strong></h4>
                <br>
                <div class="progress">
                    <div class="progress-bar" style="width:60%;background: #04C6FF"></div>
                </div>
                <h3 class="text-center font-weight-bold mt-3">
                    60%
                </h3>
                <h4 class="mt-5 mb-4"><strong>Profile Completeness</strong></h4>
                <div class="profile-completeness">
                    <div>
                        <img src="{{ url('img/profile-circle.svg') }}" height="20px"><span class="pl-2">Bio</span>
                    </div>
                    <div>
                        <img src="{{ url('img/profile-circle.svg') }}" height="20px"><span class="pl-2">Hospitals</span>
                    </div>
                    <div>
                        <img src="{{ url('img/profile-circle.svg') }}" height="20px"><span class="pl-2">Education</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="profile-right">
                    <h1 class="profile-heading mt-4">
                        <span class="edit-area">
                            <span class="edit-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14" aria-hidden="true" role="img"><path d="M0 11.044V14h2.956l8.555-8.633L8.556 2.41 0 11.044zm13.767-7.933a.752.752 0 000-1.089L11.977.233a.752.752 0 00-1.088 0l-1.4 1.4 2.955 2.956 1.323-1.478z"></path></svg></span>
                            <span id="export-salutation" class="editable">{{$profile['salutation']}}</span>
                            <span id="export-first_name" class="editable">{{$profile['first_name']}}</span>
                            <span id="export-last_name" class="editable">{{$profile['last_name']}}<span></h1>
                        </span>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="edit-area">
                                <span class="edit-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14" aria-hidden="true" role="img"><path d="M0 11.044V14h2.956l8.555-8.633L8.556 2.41 0 11.044zm13.767-7.933a.752.752 0 000-1.089L11.977.233a.752.752 0 00-1.088 0l-1.4 1.4 2.955 2.956 1.323-1.478z"></path></svg></span>
                                <h5 class="speciality-title"><strong>Speciality</strong></h5>
                                <p class="editable" id="export-speciality">{{$profile['speciality']}}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="edit-area">
                                <span class="edit-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14" aria-hidden="true" role="img"><path d="M0 11.044V14h2.956l8.555-8.633L8.556 2.41 0 11.044zm13.767-7.933a.752.752 0 000-1.089L11.977.233a.752.752 0 00-1.088 0l-1.4 1.4 2.955 2.956 1.323-1.478z"></path></svg></span>
                                <h5 class="speciality-title"><strong>Consultation Type</strong></h5>
                                <p class="editable" id="export-consultation_type">{{$profile['consultation_type']}}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="edit-area">
                                <span class="edit-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14" aria-hidden="true" role="img"><path d="M0 11.044V14h2.956l8.555-8.633L8.556 2.41 0 11.044zm13.767-7.933a.752.752 0 000-1.089L11.977.233a.752.752 0 00-1.088 0l-1.4 1.4 2.955 2.956 1.323-1.478z"></path></svg></span>
                                <h5 class="speciality-title"><strong>Website</strong></h5>
                                <p class="editable" id="export-website">{{$profile['website']}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="bio mt-5">
                        <div class="edit-area">
                            <span class="edit-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14" aria-hidden="true" role="img"><path d="M0 11.044V14h2.956l8.555-8.633L8.556 2.41 0 11.044zm13.767-7.933a.752.752 0 000-1.089L11.977.233a.752.752 0 00-1.088 0l-1.4 1.4 2.955 2.956 1.323-1.478z"></path></svg></span>
                            <h6 class="font-weight-bold mb-3">BIO</h6>
                            <p class="mt-3 editable" id="export-bio">{{$profile['bio']}}</p>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <br>
                    <div class="hosiptals mt-5">
                        <h3 class="font-weight-bold mb-3">Hospitals</h3>
                        <div class="editable-group" id="export-employment">
                            <div class="row data-set-container">
                                @if(!empty($profile['employment']))
                                @php
                                $hospitals = json_decode($profile['employment'],true);
                                @endphp
                                @foreach($hospitals as $hospital)
                                <div class="col-md-4 mb-5 data-set">
                                    <div class="edit-area">
                                        <span class="edit-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14" aria-hidden="true" role="img"><path d="M0 11.044V14h2.956l8.555-8.633L8.556 2.41 0 11.044zm13.767-7.933a.752.752 0 000-1.089L11.977.233a.752.752 0 00-1.088 0l-1.4 1.4 2.955 2.956 1.323-1.478z"></path></svg></span>
                                        <svg class="delete-icon"><use xlink:href="#ico-trash-can" /></svg>
                                        <h5 class="hospital-title editable data-name">{{$hospital['name']}}</h5>
                                        <p class="editable data-detail">{{$hospital['detail']}}</p>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                                <div class="col-md-4 mb-5" id="add-employment"><a href="">ADD</a></div>
                            </div>
                        </div>
                    </div>
                    
                    <br>
                    <hr>
                    <div class="hosiptals mt-5">
                        <h3 class="font-weight-bold mb-3">Education</h3>
                        <div class="editable-group" id="export-education">
                            <div class="row data-set-container">
                                @if(!empty($profile['education']))
                                @php
                                  $education = json_decode($profile['education'],true);
                                @endphp
                                @foreach($education as $edu)
                                <div class="col-md-4 data-set">
                                    <div class="edit-area">
                                        <span class="edit-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14" aria-hidden="true" role="img"><path d="M0 11.044V14h2.956l8.555-8.633L8.556 2.41 0 11.044zm13.767-7.933a.752.752 0 000-1.089L11.977.233a.752.752 0 00-1.088 0l-1.4 1.4 2.955 2.956 1.323-1.478z"></path></svg></span>
                                        <svg class="delete-icon"><use xlink:href="#ico-trash-can" /></svg>
                                        <p class="editable data-name">{{$edu['name']}}</p>
                                        <h6 class="font-weight-bold editable data-detail">{{$edu['detail']}}</h6>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                                <div class="col-md-4 mb-5" id="add-education"><a href="">ADD</button></a>
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
<script>
    console.log('........................... ... Hello script ... ... ...');
    let profileImageFile = null;
    function previewFile(input){
        jQuery(document).ready(function($) {
        profileImageFile = $("#input-profile-upload").get(0).files[0];
 
        if(profileImageFile){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#upload-profile").attr("src", reader.result);
            }
 
            reader.readAsDataURL(profileImageFile);
        }})
    }

    jQuery(document).ready(function($) {
        console.log('jQuery Ready...');  
        $('#submit-spinner').hide();      

        // Override paste command to remove formating
        const target = document.querySelectorAll('.editable');
        target.forEach(element => {
            element.addEventListener('paste', (event) => {
                event.preventDefault();
                let paste = (event.clipboardData || window.clipboardData).getData('text');            
                const selection = window.getSelection();
                if (!selection.rangeCount) return false;
                selection.deleteFromDocument();
                selection.getRangeAt(0).insertNode(document.createTextNode(paste));

            });
        });

        // --------------- Edit area
        let activeEle;
        $(document.body).on('click', '.edit-icon', function (e) {
            e.stopPropagation();
            if(activeEle){
                activeEle.removeClass('editable-highlight');
                activeEle.removeAttr('contenteditable');
            }

            console.log('click.... edit-icon');
            activeEle = $(this).closest('.edit-area')
                                .children('.editable')
                                .addClass('editable-highlight')
                                .attr('contenteditable', 'true');
        });

        // Delete Employment or Education History
        let previousDeleteIcon;
        $(document.body).on('click', '.delete-icon', function(e){
            e.stopPropagation();
            if(activeEle){
                activeEle.removeClass('editable-highlight');
                activeEle.removeAttr('contenteditable');
            }

            console.log('click.... delete-icon');
            if(previousDeleteIcon == this) {
                $(this).closest('.data-set').remove();
            } else {
                if(previousDeleteIcon) $(previousDeleteIcon).removeClass('delete-confirm-icon');
                $(this).addClass('delete-confirm-icon');
                previousDeleteIcon = this;
            }                    
        }) // End Delete Employment or Education History

        $(document.body).on('click', '.edit-area', function(e) {
            console.log('click.... edit-area');
            e.stopPropagation();
        });

        $(document.body).click(function(e){
            console.log('body ... click');
            e.stopImmediatePropagation();
            if(activeEle){
                activeEle.removeClass('editable-highlight');
                activeEle.removeAttr('contenteditable');
            }
            if(previousDeleteIcon){
                $(previousDeleteIcon).removeClass('delete-confirm-icon');
                previousDeleteIcon = null;
            };
        })
        // ------------- End Edit area       


        // ---------- Collect data and send
        $('#check-btn').click(function(e) {
            let employer = new Object();
            let institute = new Object();

            $('#export-employment .data-set').each(function(index, dataSet){
                let employerTitle = 'hospital_' + (index+1);
                let employerData = new Object();
                employerData.name = $('.data-name', this).text();
                employerData.detail = $('.data-detail', this).text();

                employer['hospital_' + (index+1)] = employerData;
                console.dir(employer);
            })
            
            $('#export-education .data-set').each(function(index, dataSet){
                let instituteTitle = 'education_' + (index+1);
                let instituteData = new Object();
                instituteData.name = $('.data-name', this).text();
                instituteData.detail = $('.data-detail', this).text();

                institute['education_' + (index+1)] = instituteData;      
                console.log('Education' + institute);        
            }) 

            

            
            let data = new FormData();
            data.append("salutation", $('#export-salutation').first().text());
            data.append("first_name", $('#export-first_name').first().text());
            data.append("last_name", $('#export-last_name').first().text());
            data.append("speciality", $('#export-speciality').first().text());
            data.append("consultation_type", $('#export-consultation_type').first().text());
            data.append("website", $('#export-website').first().text());
            data.append("bio", $('#export-bio').first().text());
            data.append("education", JSON.stringify(institute));            
            data.append("employment", JSON.stringify(employer));
            if(profileImageFile) data.append("profile_pic", profileImageFile);

            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#submit-spinner').show();

            $.ajax({
                type: "POST",
                url: `/doctor/profile/update`,
                cache: false,
                contentType: false,
                processData: false,
                data: data,                
                success: (response) => {
                    if(response.code == 1000) {

                    }
                },
                complete: (response) => {
                    $('#submit-spinner').hide();
                }
                // dataType: "application/json",
                // dataType: "jsonp",
            }); //End Ajax
        }); // End Click send data

        $(document.body).on('click', '#add-education a', function(e){
            e.preventDefault();
            console.log('add ... education');
            $('#export-education .data-set-container #add-education').before(
                `
                <div class="col-md-4 data-set">
                    <div class="edit-area">
                        <span class="edit-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14" aria-hidden="true" role="img"><path d="M0 11.044V14h2.956l8.555-8.633L8.556 2.41 0 11.044zm13.767-7.933a.752.752 0 000-1.089L11.977.233a.752.752 0 00-1.088 0l-1.4 1.4 2.955 2.956 1.323-1.478z"></path></svg></span>
                        <svg class="delete-icon"><use xlink:href="#ico-trash-can" /></svg>
                        <p class="editable data-name">[Institute]</p>
                        <h6 class="font-weight-bold editable data-detail">[Details]</h6>
                    </div>
                </div>
            `)
        }) // add Education addition
        $(document.body).on('click', '#add-employment a', function(e){
            e.preventDefault();
            console.log('add ... emplyment');
            $('#export-employment .data-set-container #add-employment').before(
                `
                <div class="col-md-4 mb-5 data-set">
                    <div class="edit-area">
                        <span class="edit-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14" aria-hidden="true" role="img"><path d="M0 11.044V14h2.956l8.555-8.633L8.556 2.41 0 11.044zm13.767-7.933a.752.752 0 000-1.089L11.977.233a.752.752 0 00-1.088 0l-1.4 1.4 2.955 2.956 1.323-1.478z"></path></svg></span>
                        <svg class="delete-icon"><use xlink:href="#ico-trash-can" /></svg>
                        <h5 class="hospital-title editable data-name">[Employer Title]</h5>
                        <p class="editable data-detail">[Details]</p>
                    </div>
                </div>
            `)
        }) // End employment addition


    }); // End jQuery

</script>
@endsection