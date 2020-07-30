
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
                <div class="signup-wrap text-right">
                <a href="#" class="btn border border-primary">Doctor Signup</a>
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
                                <input type="text" class="form-control" id="fname" placeholder="First name">
                            </div>
                            <div class="form-group col-sm-4 col-lg-6 col-xl-2">
                            <label for="mname">Middle</label>
                            <input type="text" class="form-control" id="mname" placeholder="MI">
                            </div>
                            <div class="form-group col-sm-4 col-lg-12 col-xl-5">
                            <label for="lname">Last Name</label>
                            <input type="text" class="form-control" id="lname" placeholder="Last Name">
                            </div>
                        
                            <div class="form-group col-lg-12">
                            <label for="hoa">Home Address</label>
                            <input type="text" class="form-control" id="hoa" placeholder="Enter your Home Address">
                            </div>

                            <div class="form-group col-lg-12">
                            <label for="hoa">Address #2</label>
                            <input type="text" class="form-control" id="hoa" placeholder="House Number, Apt. Number, etc.">
                            </div>

                            <div class="form-group col-sm-6 col-lg-4">
                            <label for="city">City</label>
                            <input type="text" class="form-control" id="city" placeholder="City">
                            </div>

                            <div class="form-group col-sm-6 col-lg-4">
                            <label for="state">State</label>
                            <input type="text" class="form-control" id="state" placeholder="State">
                            </div>

                            <div class="form-group col-sm-12 col-lg-4">
                            <label for="post">Post/ZIP Code</label>
                            <input type="text" class="form-control" id="post" placeholder="Post/ZIP Code">
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
                                <img src="/img/daniel-apodaca-g.png">
                            </div>
                            <div class="file-select col-sm-7 col-lg-7">
                                <div class="file-select-name" id="noFile">Replace Photo</div> 
                                <div class="file-select-button" id="fileName">Choose File...</div>
                                <input type="file" name="chooseFile" id="chooseFile">
                            </div>
                            </div>
                        </div>
                        </div>

                        <hr>
                        <div class="card">
                        <div class="row">
                            <div class="form-group col-12">
                            <label for="cupwd">Current Password</label>
                                <input type="Password" class="form-control" id="cupwd" placeholder="••••••">
                            </div>
                            <div class="form-group col-12">
                            <label for="npwd">New Password</label>
                                <input type="Password" class="form-control" id="npwd" placeholder="••••••">
                            </div>
                            <div class="form-group col-12">
                            <label for="cpwd">Confirm Password</label>
                                <input type="Password" class="form-control" id="cpwd" placeholder="••••••">
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
                                <input type="text" class="form-control" id="Age" placeholder="Age">
                            </div>
                            <div class="form-group col-12 col-sm-6 col-lg-6">
                            <label for="group">Blood Group</label>
                            <select class="form-control js-special-tags">
                                <option>A+</option>
                                <option>A-</option>
                                <option>AB+</option>
                                <option>AB-</option>
                                <option>o+</option>
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
