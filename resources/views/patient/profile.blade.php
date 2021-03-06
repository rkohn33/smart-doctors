
@extends('main-layout.master')

@section('content')

<div class="user-page">
    <div class="form-box registration-page">
        <div class="container">
            <header>
            <div class="row">
            <div class="col-3 col-lg-3">
                <div class="logo-wrap">
                <img src="/img/logo.png">
                </div>
            </div>
            <div class="col-9 col-lg-9">
                <div class="text-right signup-wrap">
                <a href="#" class="border btn border-primary">Doctor Signup</a>
                </div>
            </div>
            </div>
            </header>
            <div class="bg-transparent">
            <div class="heading-wrap">
                <h2>User Profile</h2>
                <p>We are happy to help you stay healthy.</p>
            </div>

            <div class="user-wrap">
            <div class="container">
                <div class="row">
                <div class="form-wrap-container col-lg-5">
                    <h3>Your details</h3>
                </div>

                <div class="form-wrap-container col-lg-7">
                    <form name="user_details_form" id='registration_form' post="#">
                        <div class="card">
                        <div class="row">
                            <div class="form-group col-sm-4 col-lg-6 col-xl-5">
                            <label for="pwd">First Name</label>
                                <input type="text" class="form-control" id="fname" placeholder="First name"
                                data-parsley-group="general-info" data-parsley-required="true" data-parsley-pattern="/^[A-Za-z]+$/" data-parsley-trigger="change" data-parsley-minlength="2">
                            </div>
                            <div class="form-group col-sm-4 col-lg-6 col-xl-2">
                            <label for="mname">Middle</label>
                            <input type="text" class="form-control" id="mname" placeholder="MI" 
                            data-parsley-group="general-info" data-parsley-required="true" data-parsley-pattern="/^[A-Za-z]+$/" data-parsley-trigger="change" data-parsley-minlength="1">
                            </div>
                            <div class="form-group col-sm-4 col-lg-12 col-xl-5">
                            <label for="lname">Last Name</label>
                            <input type="text" class="form-control" id="lname" placeholder="Last Name" 
                            data-parsley-group="general-info" data-parsley-required="true" data-parsley-pattern="/^[A-Za-z]+$/" data-parsley-trigger="change" data-parsley-minlength="2">
                            </div>
                        
                            <div class="form-group col-lg-12">
                            <label for="hoa">Home Address</label>
                            <input type="text" class="form-control" id="hoa" placeholder="Enter your Home Address" 
                            data-parsley-group="general-info" data-parsley-required="true" data-parsley-trigger="change" data-parsley-minlength="2">
                            </div>

                            <div class="form-group col-lg-12">
                            <label for="hoa2">Address #2</label>
                            <input type="text" class="form-control" id="hoa2" placeholder="House Number, Apt. Number, etc." 
                            data-parsley-group="general-info" data-parsley-required="true" data-parsley-trigger="change" data-parsley-minlength="2">
                            </div>

                            <div class="form-group col-sm-6 col-lg-4">
                            <label for="city">City</label>
                            <input type="text" class="form-control" id="city" placeholder="City" 
                            data-parsley-group="general-info" data-parsley-required="true" data-parsley-trigger="change" data-parsley-minlength="2">
                            </div>

                            <div class="form-group col-sm-6 col-lg-4">
                            <label for="state">State</label>
                            <input type="text" class="form-control" id="state" placeholder="State" 
                            data-parsley-group="general-info" data-parsley-required="true" data-parsley-trigger="change" data-parsley-minlength="2">
                            </div>

                            <div class="form-group col-sm-12 col-lg-4">
                            <label for="post">Post/ZIP Code</label>
                            <input type="text" class="form-control" id="post" placeholder="Post/ZIP Code" 
                            data-parsley-group="general-info" data-parsley-required="true" data-parsley-type="digits" data-parsley-trigger="change">
                            </div>

                            <div class="form-group btn-profile col-sm-4 col-lg-4">
                            <button type="button" class="btn btn-info btn-lg" id="save-general-info">save</button>
                            </div>

                            <div class="form-group btn-profile col-sm-4 col-lg-4">
                            <button type="button" class="btn btn-default btn-lg" id="clear-general-info">clear</button>
                            </div>
                        </div>
                        </div>

                        <hr>
                        <div class="card">
                        <div class="file-upload-wrap form-group col-lg-12">
                            <div class="file-upload row">
                            <div class="user-pic col-sm-4 col-lg-4">
                                <div id="profile-frame" style="padding: 50% 0; height: 0; overflow: hidden; border-radius: 100%; position: relative;">
                                    <img id="profile-picture" src="{{ asset('img/daniel-apodaca-g.png') }}" style="position: absolute; width: 100%; top: 0; left: 0; border-radius: 0;">
                                </div>
                            </div>
                            <div id="file-select-patient-profile" class="file-select col-sm-7 col-lg-7">
                                <div class="file-select-name" id="noFile">Replace Photo</div> 
                                <div class="file-select-button" id="fileName">Choose File...</div>
                                <input type="file" name="chooseFile" id="chooseFile" onchange="previewFile(this)"
                                data-parsley-group="update-picture" data-parsley-max-file-size="1">
                            </div>
                            </div>
                            <div class="row">
                                <div class="form-group btn-profile col-sm-4 col-lg-4">
                                    <button id="save-profile-picture" type="button" class="btn btn-info btn-lg">save</button>
                                </div>
    
                                <!-- <div class="form-group btn-profile col-sm-4 col-lg-4">
                                    <button type="button" class="btn btn-default btn-lg">undo</button>
                                </div> -->
                            </div>
                        </div>
                        </div>

                        <hr>
                        <div class="card">
                        <div class="row">
                            <div class="form-group col-12">
                            <label for="cupwd">Current Password</label>
                                <input type="Password" class="form-control" id="cupwd" placeholder="••••••" required
                                    data-parsley-group="change-password" data-parsley-required-message="Provide current password.">
                            </div>
                            <div class="form-group col-12">
                            <label for="npwd">New Password</label>
                                <input type="Password" class="form-control" id="npwd" placeholder="At least 6 character" minlength="6"
                                    data-parsley-group="change-password" data-parsley-required="true" data-parsley-minlength="6" data-parsley-trigger="change">
                            </div>
                            <div class="form-group col-12">
                            <label for="cpwd">Confirm Password</label>
                                <input type="Password" class="form-control" id="cpwd" placeholder="Retype New password"
                                    data-parsley-group="change-password" data-parsley-equalto="#npwd" data-parsley-trigger="change">
                            </div>
                            <div class="form-group btn-profile col-sm-12 col-lg-4">
                            <button type="button" class="btn btn-info btn-lg" id="save-change-password">save</button>
                            </div>
                        </div>
                        </div>

                        <hr>
                        <div class="card">
                        <div class="row">
                            <div class="form-group col-12 col-sm-6 col-lg-6">
                            <label for="age">Age</label>
                                <input type="text" class="form-control" id="age" placeholder="Age" required
                                    data-parsley-group="physics-info" data-parsley-required="true" data-parsley-trigger="change" data-parsley-minlength="2">
                            </div>
                            <div class="form-group col-12 col-sm-6 col-lg-6">
                            <label for="blood">Blood Group</label>
                            <select id="blood" class="form-control js-special-tags" required="" data-parsley-required="true" data-parsley-group="physics-info">
                                <option value="">Choose</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                            </select>
                            </div>
                            <div class="form-group col-12 col-sm-6 col-lg-6">
                                <label for="height" class="d-flex justify-content-between">Height<div class="measure"> <span class="active" id="h-foot">foot </span><span id="h-cm"> cm</span></div></label>
                            <input class="form-control" id="height" name="height" type="text" placeholder="" data-parsley-group="physics-info" required="" data-parsley-nonzero="">                            
                            </div>
                            <div class="form-group col-12 col-sm-6 col-lg-6">
                            <label for="weight" class="d-flex justify-content-between">Weight <div class="measure"><span class="active toggle-weight" id="w-lbs">lbs</span><span class="toggle-weight" id="w-kg"> kg</span></div></label>
                            <input type="text" id="weight" name="weight" class="form-control" data-parsley-group="physics-info" required="" data-parsley-nonzero="">
                            </div>
                            <div class="form-group btn-profile col-sm-4 col-lg-4">
                            <button type="button" class="btn btn-info btn-lg" id="save-physics-info">save</button>
                            </div>
                        </div>
                        </div>
                    </form>
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
<script src="{{ asset('js/parsley.min.js') }}"></script>
<script>
    let profileImageFile = null;

    function previewFile(input){
        jQuery(document).ready(function($) {
            profileImageFile = $("#chooseFile").get(0).files[0];
            let isValid = $('#chooseFile').parsley().validate({force: true, group: 'update-picture'});
            if(!isValid) {
                $('#chooseFile').val('').trigger('change');
                return;
            }

            if(profileImageFile){
                var reader = new FileReader();

                reader.onload = function(){
                    $("#profile-picture").attr("src", reader.result);
                }

                reader.readAsDataURL(profileImageFile);
            }
        })
    }

    Parsley.addValidator('maxFileSize', {
            validateString: function(_value, maxSize, parsleyInstance) {      
            var files = parsleyInstance.$element[0].files;
            return files.length != 1  || files[0].size <= maxSize * 1024 * 1024;
            },
            requirementType: 'integer',
            messages: {
            en: 'Maximum file size %s mb',
            }
        });

    function convKg2Lbs(kg) {
        return (kg * 2.20462).toFixed(2);
    }
    function convLbs2Kg(lbs) {
        return (lbs * 0.453592).toFixed(2);
    }
    function convFoot2Cm(foot) {
        return (foot*30.48).toFixed(2);
    }
    function convCm2Foot(cm) {
        return (cm * 0.0328084).toFixed(2);
    }

    
    $(document).ready(function($) {
        let $inputWeight = $('#weight');
        let $inputHeight = $('#height');       
        let weightValue = 0;        

        $('#registration_form').parsley().on('field:validated', function() {
            var ok = $('.parsley-error').length === 0;
        }); 
        $('#save-profile-picture').click(function(e){
            let isValid = $('#chooseFile').parsley().validate({force: true, group: 'update-picture'});
            // chooseFile
            if(isValid) {
                let profileImageFile = $("#chooseFile").get(0).files[0];
                let formData = new FormData();
                formData.append('profile_picture', profileImageFile);
                let xsrf = $('meta[name="csrf-token"]').attr('content');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': xsrf,
                    }
                });
      
                $.ajax({
                    type: "POST",
                    url: `/patient/profile/update`,
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: (response) => {
                        console.log('file updated');
                    },
                    error: () => {
                        // $('#submit-spinner').hide();
                        console.log('file update failed');
                    },
                    dataType: "json",
                }); //End Ajax
            }
        })

        $('#save-general-info').click(function(e){
            var isValid = $('#registration_form').parsley().validate({force: true, group: 'general-info'});
            if(isValid){
                // Form is ok send ajax call.
                updateProfile({
                    general: {
                        fname: $('#fname').val(),
                        mname: $('#mname').val(),
                        fname: $('#lname').val(),
                        haddress: $('#hoa').val(),
                        address_second: $('#hoa2').val(),
                        city: $('#city').val(),
                        state: $('#state').val(),
                        zip: $('#post').val(),
                    }
                }).catch(error=>console.log(error))
                .then(success=>console.log(success))
            };
        })
        $('#save-change-password').click(function(e){
            var isValid = $('#registration_form').parsley().validate({force: true, group: 'change-password'});
            if(isValid){
                // Form is ok send ajax call.
                updateProfile({
                    password: {
                        current: $('#cupwd').val(),
                        new: $('#npwd').val(),
                        confirm: $('#cpwd').val(),
                    }
                }).catch(error=>console.log(error))
                .then(success=>console.log(success))
            };
        })   
        

        // --------------------------------------------------
        $('#save-physics-info').click(function(e){
            var isValid = $('#registration_form').parsley().validate({force: true, group: 'physics-info'});
            if(isValid){
                // Form is ok send ajax call.
                updateProfile({
                    physics: {
                        age: $('#age').val(),
                        blood: $('#blood').val(),
                        height: $('#height').val(),
                        weight: $('#weight').val(),
                    }
                }).catch(error=>console.log(error))
                .then(success=>console.log(success))
            };
        })

        $('#h-foot').click(function(e){
            if($(this).hasClass('active')) return;

            $(this).addClass('active');
            $('#h-cm').removeClass('active');
            changeHeightInput(convCm2Foot($inputHeight.val()));
        })
        $('#h-cm').click(function(e){
            if($(this).hasClass('active')) return;

            $(this).addClass('active');
            $('#h-foot').removeClass('active');
            changeHeightInput(convFoot2Cm($inputHeight.val()));
        })


        $('#w-lbs').click(function(e){
            if($(this).hasClass('active')) return;

            $(this).addClass('active');
            $('#w-kg').removeClass('active');
            changeWeightInput(convKg2Lbs($inputWeight.val()));
        })
        $('#w-kg').click(function(e){
            if($(this).hasClass('active')) return;

            $(this).addClass('active');
            $('#w-lbs').removeClass('active');
            changeWeightInput(convLbs2Kg($inputWeight.val()));
        })

        function changeWeightInput(value) {
            $inputWeight.val(value);
            $inputWeight.trigger('change');
        }
        function changeHeightInput(value) {
            $inputHeight.val(value);
            $inputHeight.trigger('change');
        }

        function updateProfile(dataObject) {
            let xsrf = $('meta[name="csrf-token"]').attr('content');
            return new Promise((resolve, reject)=>{
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': xsrf,
                    }
                });
      
                $.ajax({
                    type: "POST",
                    url: `/patient/profile/update`,
                    cache: false,
                    contentType: 'application/json',
                    data: JSON.stringify(dataObject),
                    success: (response) => {
                        if(response.code == 1000) {
                          resolve(response);
                        }
                    },
                    error: () => {
                        // $('#submit-spinner').hide();
                        reject({error: 'error'});
                    },
                    dataType: "json",
                }); //End Ajax
            })
        }
    });
</script>
@endsection
