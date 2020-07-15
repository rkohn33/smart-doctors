<div class="s-layout__sidebar">
    <div class="side sidebar-sticky w3-sidebar w3-light-grey w3-bar-block">
    <ul class="nav flex-column">
        <a href="{{ url(Auth::user()->utype.'/dashboard') }}">
        <li class="nav-item side-items">
            <img class="float-left" src="{{ url('img/logo.svg') }}">
        </li>
        </a>
        <a href="{{ url(Auth::user()->utype.'/dashboard') }}">
        <li class="nav-item side-items">
            <img class="float-left" src="{{ url('img/home.svg') }}"><span class="pl-3">Home</span>
        </li>
        </a>
        <a href="{{ url(Auth::user()->utype.'/profile') }}">
        <li class="nav-item side-items">
            <img class="float-left" src="{{ url('img/profile.svg') }}"><span class="pl-3">My Profile</span>
        </li>
        </a>
        <a href="{{ url(Auth::user()->utype.'/appointment') }}">
        <li class="nav-item side-items">
            <img class="float-left" src="{{ url('img/calender.svg') }}"><span class="pl-3">Appointments</span>
        </li>
        </a>
        <a href="{{ url(Auth::user()->utype.'/availability') }}">
        <li class="nav-item side-items">
            <img class="float-left" src="{{ url('img/clock.svg') }}"><span class="pl-3">Availability</span>
        </li>
        </a>
        <a href="{{ url(Auth::user()->utype.'/consultation') }}">
        <li class="nav-item side-items">
            <img class="float-left" src="{{ url('img/clock.svg') }}"><span class="pl-3">Consultation</span>
        </li>
        </a>
        <a href="{{ url(Auth::user()->utype.'/wallet') }}">
        <li class="nav-item side-items">
            <img class="float-left" src="{{ url('img/wallet.svg') }}"><span class="pl-3">Wallet</span>
        </li>
        </a>
    </ul>
    </div>
</div>