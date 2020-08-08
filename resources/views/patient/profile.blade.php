
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
                                data-parsley-group="block1" data-parsley-required="true" data-parsley-pattern="/^[A-Za-z]+$/" data-parsley-trigger="change" data-parsley-minlength="2">
                            </div>
                            <div class="form-group col-sm-4 col-lg-6 col-xl-2">
                            <label for="mname">Middle</label>
                            <input type="text" class="form-control" id="mname" placeholder="MI" 
                            data-parsley-group="block1" data-parsley-required="true" data-parsley-pattern="/^[A-Za-z]+$/" data-parsley-trigger="change" data-parsley-minlength="1">
                            </div>
                            <div class="form-group col-sm-4 col-lg-12 col-xl-5">
                            <label for="lname">Last Name</label>
                            <input type="text" class="form-control" id="lname" placeholder="Last Name" 
                            data-parsley-group="block1" data-parsley-required="true" data-parsley-pattern="/^[A-Za-z]+$/" data-parsley-trigger="change" data-parsley-minlength="2">
                            </div>
                        
                            <div class="form-group col-lg-12">
                            <label for="hoa">Home Address</label>
                            <input type="text" class="form-control" id="hoa" placeholder="Enter your Home Address" 
                            data-parsley-group="block1" data-parsley-required="true" data-parsley-trigger="change" data-parsley-minlength="2">
                            </div>

                            <div class="form-group col-lg-12">
                            <label for="hoa">Address #2</label>
                            <input type="text" class="form-control" id="hoa" placeholder="House Number, Apt. Number, etc." 
                            data-parsley-group="block1" data-parsley-required="true" data-parsley-trigger="change" data-parsley-minlength="2">
                            </div>

                            <div class="form-group col-sm-6 col-lg-4">
                            <label for="city">City</label>
                            <input type="text" class="form-control" id="city" placeholder="City" 
                            data-parsley-group="block1" data-parsley-required="true" data-parsley-trigger="change" data-parsley-minlength="2">
                            </div>

                            <div class="form-group col-sm-6 col-lg-4">
                            <label for="state">State</label>
                            <input type="text" class="form-control" id="state" placeholder="State" 
                            data-parsley-group="block1" data-parsley-required="true" data-parsley-trigger="change" data-parsley-minlength="2">
                            </div>

                            <div class="form-group col-sm-12 col-lg-4">
                            <label for="post">Post/ZIP Code</label>
                            <input type="text" class="form-control" id="post" placeholder="Post/ZIP Code" 
                            data-parsley-group="block1" data-parsley-required="true" data-parsley-type="digits" data-parsley-trigger="change">
                            </div>

                            <div class="form-group btn-profile col-sm-4 col-lg-4">
                            <button type="submit" class="btn btn-info btn-lg">save</button>
                            </div>

                            <div class="form-group btn-profile col-sm-4 col-lg-4">
                            <button type="submit" class="btn btn-default btn-lg">clear</button>
                            </div>
                        </div>
                        </div>

                        <hr>
                        <div class="card">
                        <div class="file-upload-wrap form-group col-lg-12">
                            <div class="file-upload row">
                            <div class="user-pic col-sm-4 col-lg-4">
                                <div id="profile-frame" style="padding: 50% 0; height: 0; overflow: hidden; border-radius: 100%; position: relative;">
                                    <img id="profile-picture" src="/img/daniel-apodaca-g.png" style="position: absolute; width: 100%; top: 0; left: 0; border-radius: 0;">
                                </div>
                            </div>
                            <div class="file-select col-sm-7 col-lg-7">
                                <div class="file-select-name" id="noFile">Replace Photo</div> 
                                <div class="file-select-button" id="fileName">Choose File...</div>
                                <input type="file" name="chooseFile" id="chooseFile" onchange="previewFile(this)">
                            </div>
                            </div>
                            <div class="row">
                                <div class="form-group btn-profile col-sm-4 col-lg-4">
                                    <button type="submit" class="btn btn-info btn-lg">save</button>
                                </div>
    
                                <div class="form-group btn-profile col-sm-4 col-lg-4">
                                    <button type="submit" class="btn btn-default btn-lg">clear</button>
                                </div>
                            </div>
                        </div>
                        </div>

                        <hr>
                        <div class="card">
                        <div class="row">
                            <div class="form-group col-12">
                            <label for="cupwd">Current Password</label>
                                <input type="Password" class="form-control" id="cupwd" placeholder="••••••"
                                    >
                            </div>
                            <div class="form-group col-12">
                            <label for="npwd">New Password</label>
                                <input type="Password" class="form-control" id="npwd" placeholder="••••••" minlength="6"
                                        data-parsley-required="true" data-parsley-minlength="6" data-parsley-trigger="change">
                            </div>
                            <div class="form-group col-12">
                            <label for="cpwd">Confirm Password</label>
                                <input type="Password" class="form-control" id="cpwd" placeholder="••••••"
                                        data-parsley-equalto="#pwd" data-parsley-trigger="change">
                            </div>
                            <div class="form-group btn-profile col-sm-12 col-lg-4">
                            <button type="submit" class="btn btn-info btn-lg">save</button>
                            </div>
                        </div>
                        </div>

                        <hr>
                        <div class="card">
                        <div class="row">
                            <div class="form-group col-12 col-sm-6 col-lg-6">
                            <label for="Age">Age</label>
                                <input type="text" class="form-control" id="Age" placeholder="Age" 
                                    data-parsley-required="true" data-parsley-trigger="change" data-parsley-minlength="2">
                            </div>
                            <div class="form-group col-12 col-sm-6 col-lg-6">
                            <label for="group">Blood Group</label>
                            <select class="form-control js-special-tags" required="" data-parsley-required="true">
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">o+</option>
                            </select>
                            </div>
                            <div class="form-group col-12 col-sm-6 col-lg-6">
                                <label for="height" class="d-flex justify-content-between">Height<div class="measure"> <span class="active">in </span><span> cm</span></div></label>
                            <select class="form-control js-special-tags">
                                <option>6,11’’</option>
                                <option>6,11’’</option>
                                <option>6,11’’</option>
                                <option>6,11’’</option>
                                <option>6,11’’</option>
                            </select>
                            </div>
                            <div class="form-group col-12 col-sm-6 col-lg-6">
                            <label for="height" class="d-flex justify-content-between">Weight <div class="measure"><span class="active">lbs</span> <span> kg</span></div></label>
                            <select class="form-control js-special-tags">
                                <option>150 lbs</option>
                                <option>150 lbs</option>
                                <option>150 lbs</option>
                                <option>150 lbs</option>
                                <option>150 lbs</option>
                            </select>
                            </div>
                            <div class="form-group btn-profile col-sm-4 col-lg-4">
                            <button type="submit" class="btn btn-info btn-lg">save</button>
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

        if(profileImageFile){
            var reader = new FileReader();

            reader.onload = function(){
                $("#profile-picture").attr("src", reader.result);
            }

            reader.readAsDataURL(profileImageFile);
        }})
    }

    
    $(document).ready(function($) {
        $("#countries").msDropdown();          

        $('#registration_form').parsley().on('field:validated', function() {
            var ok = $('.parsley-error').length === 0;
        });        
    });
</script>
@endsection
