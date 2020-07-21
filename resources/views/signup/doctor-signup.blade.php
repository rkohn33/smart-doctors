@extends('main-layout.master')

@section('content')
<div class="form-box registration-page">
    <div class="container">
      <header>
        <div class="row">
        <div class="col-3 col-lg-3">
          <div class="logo-wrap">
            <img src="{{ url('img/logo.png') }}">
          </div>
        </div>
        <div class="col-9 col-lg-9">
          <div class="signup-wrap text-right">
            <a href="#" class="btn border border-primary">Doctor Signup</a>
          </div>
        </div>
      </div>
      </header>
      <div class="bg-light">
        <div class="heading-wrap text-center">
          <h2>Doctor Registration</h2>
          <p>Lorem Ipsum is simply dummy text of the typesetting industry.</p>
        </div>
        <div class="form-wrap-container mx-auto">
          <form name="doc_registration_form" id='registration_form' post="#">
            <div class="row">
              <div class="form-group col-lg-12">
                <label for="UserName">Name</label>
                <div class="row">
                    <div class="form-group col-sm-6 col-lg-6">
                      <input type="text" class="form-control" id="fname" placeholder="first name">
                    </div>
                    <div class="form-group col-sm-6 col-lg-6">
                      <input type="text" class="form-control" id="lname" placeholder="last name">
                    </div>
                </div>
              </div>

              <div class="form-group col-sm-6 col-lg-6">
                <label for="phone">Phone number</label>
                <div class="countries-box">
                  <select name="countries" id="countries">
                    <option value='ad' data-image="/img/blank.gif" data-imagecss="flag ad" data-title="Andorra">Andorra</option>
                    <option value='ae' data-image="/img/blank.gif" data-imagecss="flag ae" data-title="United Arab Emirates">United Arab Emirates</option>
                    <option value='af' data-image="/img/blank.gif" data-imagecss="flag af" data-title="Afghanistan">Afghanistan</option>
                    <option value='ag' data-image="/img/blank.gif" data-imagecss="flag ag" data-title="Antigua and Barbuda">Antigua and Barbuda</option>
                    <option value='ai' data-image="/img/blank.gif" data-imagecss="flag ai" data-title="Anguilla">Anguilla</option>
                    <option value='al' data-image="/img/blank.gif" data-imagecss="flag al" data-title="Albania">Albania</option>
                    <option value='am' data-image="/img/blank.gif" data-imagecss="flag am" data-title="Armenia">Armenia</option>
                    <option value='an' data-image="/img/blank.gif" data-imagecss="flag an" data-title="Netherlands Antilles">Netherlands Antilles</option>
                    <option value='ao' data-image="/img/blank.gif" data-imagecss="flag ao" data-title="Angola">Angola</option>
                    <option value='aq' data-image="/img/blank.gif" data-imagecss="flag aq" data-title="Antarctica">Antarctica</option>
                    <option value='ar' data-image="/img/blank.gif" data-imagecss="flag ar" data-title="Argentina">Argentina</option>
                    <option value='in' data-image="/img/blank.gif" data-imagecss="flag in" data-title="India" selected="selected">India</option>
                  </select>
                  <input type="text" class="form-control" id="phone" placeholder="+ 1 786 453 3242">
                </div>
              </div>

              <div class="form-group col-sm-6 col-lg-6">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" id="email" placeholder="Email Address">
              </div>

              <div class="form-group col-lg-12">
                <label for="hadd">Home Address</label>
                <input type="text" class="form-control" id="hadd" placeholder="Home Address">
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

              <div class="form-group col-lg-12">
                <label for="spe">Specialization</label>
                <select class="form-control js-special-tags">
                  <option selected="selected">Choose one...</option>
                  <option>select 1</option>
                  <option>select 2</option>
                  <option>select 3</option>
                  <option>select 4</option>
                  <option>select 5</option>
                </select>
              </div>
              
              <div class="form-group col-lg-12">
                <label for="pwd">Choose Password</label>
                <input type="password" class="form-control" id="pwd" placeholder="••••••">
              </div>

              <div class="form-group col-lg-12">
                <label for="cpwd">Confirm Password</label>
                <input type="password" class="form-control" id="cpwd" placeholder="••••••">
              </div>


              <div class="verification-wrap text-center">
                <div class="title"><h5>Verification</h5></div>
                <p>We're delighted to have you on board and can't wait for you to get started with Smart Doctors. Simply upload your medical credentials (photo of degree, medical registration number if applicable) and a government issued photo ID.</p>
              </div>

              <div class="file-upload-wrap form-group col-lg-12">
                <div class="file-upload">
                  <div class="file-select">
                    <div class="file-select-name" id="noFile">Medical Registration Proof</div> 
                    <div class="file-select-button" id="fileName">Choose File...</div>
                    <input type="file" name="chooseFile" id="chooseFile">
                  </div>
                </div>

                <div class="file-upload">
                  <div class="file-select">
                    <div class="file-select-name" id="noFile">Medical Degree Certification Proof</div> 
                    <div class="file-select-button" id="fileName">Choose File...</div>
                    <input type="file" name="chooseFile" id="chooseFile">
                  </div>
                </div>

                <div class="file-upload">
                  <div class="file-select">
                    <div class="file-select-name" id="noFile">Government-Issued Photo ID Proof</div> 
                    <div class="file-select-button" id="fileName">Choose File...</div>
                    <input type="file" name="chooseFile" id="chooseFile">
                  </div>
                </div>
              </div>
              <div class="btn-wrap text-center col-12">
                <button type="submit" class="btn btn-info btn-lg">Submit Registration</button>
              </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
<script>
$(document).ready(function() {
	$("#countries").msDropdown();
});


$('#chooseFile').bind('change', function () {
  var filename = $("#chooseFile").val();
  if (/^\s*$/.test(filename)) {
    $(".file-upload").removeClass('active');
    $("#noFile").text("No file chosen..."); 
  }
  else {
    $(".file-upload").addClass('active');
    $("#noFile").text(filename.replace("C:\\fakepath\\", "")); 
  }
});
</script>
@endsection