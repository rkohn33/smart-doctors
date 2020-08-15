<div class="fixed-nav sticky-footer">
  <div class="top-nav">
  
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="mainNav">
          <a class="navbar-brand" href="{{route('d.home')}}"><img src="/img/logo.png"></a>
          
          
          <div class="container">            
            <ul class="navbar-nav mobile-top">
              <li class="nav-item">
                <a class="nav-link" id="messagesDropdown" href="#"> help </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="messagesDropdown" href="#">{{ Auth::user()->firstname . ' ' . strtoupper(substr(Auth::user()->lastname, 0, 1)) . '.'}}</a>
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
                  <a class="nav-link" href="{{url('logout')}}"> <i class="fas fa-sign-out-alt"></i>Logout</a>
                  <div class="dropdown-divider"></div>
                  
                </div>
              </li>
            </ul>
            
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" id="hamburger">
             <span class="icon-bar"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarResponsive">
              <div class="top-title-page">
                <h1>{{ isset($title) ? $title : '' }}</h1>
                @if( Route::current()->getName() == 'd.profile')
                <div class="profile-control-container">
                    <button class="btn" id="check-btn">Update</button>
                    <div id="submit-spinner" class="spinner"></div>
                </div>
                @endif
              </div>
              <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                  <a class="nav-link {{ Route::current()->getName() == 'd.home' ? 'active' : '' }}" href="{{ url(Auth::user()->utype.'/home') }}">
                    <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.97333 9.56252H5.37815V10.1577V15.8733H0.754112V7.31152L8.09908 1.01583L15.3052 7.23927V15.8733H10.6102V10.1577V9.56252H10.015H5.97333Z" stroke-width="1.19035"/></svg>
                    <span class="pl-3">Home</span>
                  </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Profile">
                  <a class="nav-link {{ Route::current()->getName() == 'd.profile' ? 'active' : '' }}" href="{{ url(Auth::user()->utype.'/profile') }}">
                    <svg width="16" height="19" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg"><g opacity="1"><path d="M13.4593 12.542L13.4602 12.5431C14.2013 13.4626 14.6027 14.605 14.6027 15.7816C14.6027 16.5289 14.1169 17.1893 13.4066 17.4097L13.4065 17.4097C9.67564 18.568 5.68116 18.568 1.95027 17.4097L1.95022 17.4097C1.23989 17.1893 0.754112 16.5289 0.754112 15.7816C0.754112 14.6047 1.15551 13.4626 1.89663 12.5431L1.89746 12.542C2.56573 11.7091 3.54209 11.1799 4.60264 11.0704C6.53197 12.0642 8.82482 12.0642 10.7542 11.0704C11.8147 11.1799 12.7911 11.7091 13.4593 12.542Z" stroke-width="1.19035"/><path d="M11.6753 5.09784C11.6753 7.30524 9.88587 9.0947 7.67847 9.0947C5.47106 9.0947 3.6816 7.30524 3.6816 5.09784C3.6816 2.89043 5.47106 1.10097 7.67847 1.10097C9.88587 1.10097 11.6753 2.89043 11.6753 5.09784Z" stroke-width="1.19035"/></g></svg>
                    <span class="pl-3">My Profile</span>
                  </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Appointment">
                  <a class="nav-link {{ Route::current()->getName() == 'd.appointment' ? 'active' : '' }}" href="{{ url(Auth::user()->utype.'/appointment') }}">
                    <svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path opacity="1" d="M14.6162 2.07205H13.2455V0.701385H12.332V2.07205H5.02395V0.701385H4.11044V2.07205H2.74059C1.48117 2.07205 0.456421 3.0968 0.456421 4.35622V14.8619C0.456421 16.1214 1.48117 17.1461 2.74059 17.1461H14.6162C15.8756 17.1461 16.9003 16.1214 16.9003 14.8619V6.63958V5.72607V4.35541C16.8995 3.09599 15.8748 2.07205 14.6162 2.07205ZM15.986 14.8611C15.986 15.6163 15.3713 16.231 14.6162 16.231H2.74059C1.98461 16.231 1.36993 15.6163 1.36993 14.8611V6.63958H15.986V14.8611ZM15.986 5.72607H1.36993V4.35541C1.36993 3.59943 1.98461 2.98474 2.74059 2.98474H4.11126V3.89825H5.02395V2.98556H12.332V3.89906H13.2455V2.98556H14.6162C15.3713 2.98556 15.986 3.59943 15.986 4.35541V5.72607Z" fill="white"/></svg>
                    <span class="pl-3">Appointment</span>
                  </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Availability">
                  <a class="nav-link {{ Route::current()->getName() == 'd.availability' ? 'active' : '' }}" href="{{ url(Auth::user()->utype.'/availability') }}">
                    <svg class="fillable" width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.08404 9.80758V9.85662L9.12791 9.87856L11.8635 11.2464C12.2163 11.4228 12.3593 11.8518 12.1829 12.2046C12.0065 12.5574 11.5775 12.7004 11.2247 12.524L8.05043 10.9368C7.80846 10.8159 7.65562 10.5686 7.65562 10.298V5.53662C7.65562 5.14217 7.97538 4.82241 8.36983 4.82241C8.76428 4.82241 9.08404 5.14217 9.08404 5.53662V9.80758ZM9.1634 18.1544C4.38619 18.1544 0.5135 14.2817 0.5135 9.50446C0.5135 4.72726 4.38619 0.854564 9.1634 0.854564C13.9406 0.854564 17.8133 4.72726 17.8133 9.50446C17.8133 14.2817 13.9406 18.1544 9.1634 18.1544ZM9.1634 16.7259C13.1517 16.7259 16.3849 13.4928 16.3849 9.50446C16.3849 5.51615 13.1517 2.28299 9.1634 2.28299C5.17509 2.28299 1.94192 5.51615 1.94192 9.50446C1.94192 13.4928 5.17509 16.7259 9.1634 16.7259Z" stroke-width="0.158714"/></svg>
                    <span class="pl-3">Availability</span>
                  </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Consultation">
                  <a class="nav-link {{ Route::current()->getName() == 'd.consultation' ? 'active' : '' }}" href="{{ url(Auth::user()->utype.'/consultation') }}">
                      <svg class="fillable" width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.08404 9.80758V9.85662L9.12791 9.87856L11.8635 11.2464C12.2163 11.4228 12.3593 11.8518 12.1829 12.2046C12.0065 12.5574 11.5775 12.7004 11.2247 12.524L8.05043 10.9368C7.80846 10.8159 7.65562 10.5686 7.65562 10.298V5.53662C7.65562 5.14217 7.97538 4.82241 8.36983 4.82241C8.76428 4.82241 9.08404 5.14217 9.08404 5.53662V9.80758ZM9.1634 18.1544C4.38619 18.1544 0.5135 14.2817 0.5135 9.50446C0.5135 4.72726 4.38619 0.854564 9.1634 0.854564C13.9406 0.854564 17.8133 4.72726 17.8133 9.50446C17.8133 14.2817 13.9406 18.1544 9.1634 18.1544ZM9.1634 16.7259C13.1517 16.7259 16.3849 13.4928 16.3849 9.50446C16.3849 5.51615 13.1517 2.28299 9.1634 2.28299C5.17509 2.28299 1.94192 5.51615 1.94192 9.50446C1.94192 13.4928 5.17509 16.7259 9.1634 16.7259Z" stroke-width="0.158714"/></svg>
                      <span class="pl-3">Consultation</span>
                  </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Wallet">
                  <a class="nav-link {{ Route::current()->getName() == 'd.wallet' ? 'active' : '' }}" href="{{ url(Auth::user()->utype.'/wallet') }}">
                  <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg"><g opacity="1"><path d="M8.64984 3.1098L8.72886 4.50568C7.00376 4.6242 6.14779 5.42749 6.14779 6.67852C6.14779 7.91638 6.83256 8.73284 8.99223 9.08839C10.5461 9.35177 10.9807 9.69415 10.9807 10.3526C10.9807 10.9847 10.4803 11.3797 9.38729 11.3797C8.18894 11.3797 7.47783 10.8398 7.2803 9.74683L5.84491 10.0497C6.02927 11.3402 6.79306 12.3411 8.74202 12.4991L8.64984 14.0925H9.86136L9.76918 12.5123C11.6786 12.4069 12.4819 11.5509 12.4819 10.2604C12.4819 9.14107 11.942 8.2851 9.58482 7.85053C7.92557 7.54765 7.62268 7.16576 7.62268 6.59951C7.62268 5.98058 8.09676 5.61186 9.09758 5.61186C10.2038 5.61186 10.5988 6.08593 10.8095 7.00774L12.2976 6.71803C12.0605 5.53284 11.3758 4.69005 9.78235 4.51885L9.86136 3.1098H8.64984Z" fill="white"/><rect x="1.25567" y="0.693461" width="15.8154" height="15.8154" rx="1.98392" stroke-width="0.793569"/></g></svg>
                      <span class="pl-3">Wallet</span>
                  </a>
                </li>
              </ul>
             
              <ul class="navbar-nav ml-auto user-nav">
                <li class="nav-item">
                  <a class="nav-link" id="messagesDropdown" href="#"> help </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="messagesDropdown" href="#">{{ Auth::user()->firstname . ' ' . strtoupper(substr(Auth::user()->lastname, 0, 1)) . '.'}}</a>
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
                  <a class="nav-link" href="{{url('logout')}}"> <i class="fas fa-sign-out-alt"></i>Logout</a>
                    <div class="dropdown-divider"></div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </nav>
    </div>
