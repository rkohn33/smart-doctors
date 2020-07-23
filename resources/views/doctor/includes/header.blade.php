<div class="d-flex" id="wrapper">
    <!-- /#sidebar-wrapper -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="mainNav">
      <a class="navbar-brand" href="index.html"><img src="/img/logo.png"></a>
      <div class="page-header"><h1>Appointments</h1></div>
  
      <ul class="navbar-nav mobile-top">
          <li class="nav-item">
            <a class="nav-link" id="messagesDropdown" href="#"> help </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="messagesDropdown" href="#"> john S. </a>
          </li>
  
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="user-badge"><img src="/img/user-icon.png"><span class="badge badge-pill badge-warning">6</span></div>
            </a>
            <div class="dropdown-menu" aria-labelledby="alertsDropdown">
              <h6 class="dropdown-header">New Alerts:</h6>
              <div class="dropdown-divider"></div>
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-fw fa-envelope"></i>message</a>
              <div class="dropdown-divider"></div>
              <a class="nav-link" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-fw fa-shopping-cart"></i>orders</a>
              <div class="dropdown-divider"></div>
              <a class="nav-link" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-fw fa-sign-out"></i>Logout</a>
              <div class="dropdown-divider"></div>
              
            </div>
          </li>
        </ul>
     
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" id="hamburger">
       <span class="icon-bar"></span>
      </button>
  
  
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav " id="exampleAccordion">
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link" href="{{ url(Auth::user()->utype.'/home') }}">
                <img class="float-left" src="{{ url('img/home.svg') }}"><span class="pl-3">Home</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
            <a class="nav-link" href="{{ url(Auth::user()->utype.'/profile') }}">
                <img class="float-left" src="{{ url('img/profile.svg') }}"><span class="pl-3">My Profile</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
            <a class="nav-link" href="{{ url(Auth::user()->utype.'/appointment') }}">
                <img class="float-left" src="{{ url('img/calender.svg') }}"><span class="pl-3">Appointments</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
            <a class="nav-link" href="{{ url(Auth::user()->utype.'/availability') }}">
                <img class="float-left" src="{{ url('img/clock.svg') }}"><span class="pl-3">Availability</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
            <a class="nav-link" href="{{ url(Auth::user()->utype.'/consultation') }}">
                <img class="float-left" src="{{ url('img/clock.svg') }}"><span class="pl-3">Consultation</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
            <a class="nav-link" href="{{ url(Auth::user()->utype.'/wallet') }}">
                <img class="float-left" src="{{ url('img/wallet.svg') }}"><span class="pl-3">Wallet</span>
            </a>
          </li>
         
        </ul>
       
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" id="messagesDropdown" href="#"> help </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="messagesDropdown" href="#"> john S. </a>
          </li>
  
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="user-badge"><img src="/img/user-icon.png"><span class="badge badge-pill badge-warning">6</span></div>
              
            </a>
            <div class="dropdown-menu" aria-labelledby="alertsDropdown">
              <h6 class="dropdown-header">New Alerts:</h6>
              <div class="dropdown-divider"></div>
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-fw fa-envelope"></i>message</a>
              <div class="dropdown-divider"></div>
              <a class="nav-link" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-fw fa-shopping-cart"></i>orders</a>
              <div class="dropdown-divider"></div>
              <a class="nav-link" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-fw fa-sign-out"></i>Logout</a>
              <div class="dropdown-divider"></div>
              
            </div>
          </li>
        </ul>
      </div>
    </nav>