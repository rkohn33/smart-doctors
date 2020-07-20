<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">

        <div class="list-group list-group-flush">
        <div class="sidebar-heading">
            <a href="{{ url(Auth::user()->utype.'/dashboard') }}"><img class="float-left" src="{{ url('img/logo.svg') }}"></a>
        </div>
            <a href="{{ url(Auth::user()->utype.'/dashboard') }}" class="list-group-item list-group-item-action"><img class="float-left" src="{{ url('img/home.svg') }}"><span class="pl-3">Home</span></a>
            <a href="{{ url(Auth::user()->utype.'/profile') }}" class="list-group-item list-group-item-action"><img class="float-left" src="{{ url('img/profile.svg') }}"><span class="pl-3">My Profile</span></a>
            <a href="{{ url(Auth::user()->utype.'/appointment') }}" class="list-group-item list-group-item-action"><img class="float-left" src="{{ url('img/calender.svg') }}"><span class="pl-3">Appointments</span></li></a>
            <a href="{{ url(Auth::user()->utype.'/availability') }}" class="list-group-item list-group-item-action"><img class="float-left" src="{{ url('img/clock.svg') }}"><span class="pl-3">Availability</span></a>
            <a href="{{ url(Auth::user()->utype.'/consultation') }}" class="list-group-item list-group-item-action"><img class="float-left" src="{{ url('img/clock.svg') }}"><span class="pl-3">Consultation</span></a>
            <a href="{{ url(Auth::user()->utype.'/wallet') }}" class="list-group-item list-group-item-action"><img class="float-left" src="{{ url('img/wallet.svg') }}"><span class="pl-3">Wallet</span></a>
        </div>
    </div>

    <!-- /#sidebar-wrapper -->
