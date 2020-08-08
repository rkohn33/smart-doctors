@extends('main-layout.master')

@section('content')

@include('admin.includes.header')
<div id="content-wrapper" class="pt-5 mt-5">

<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <div class="col-md-12">
            <h4 class="text-secondary mb-3 mt-2 font-weight-bold">Doctors List</h4>
            <div class="row">
                <div class="appointments-box col-lg-12">
                    <div class="card">
                      <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-sm-10 col-lg-10 title-tag p-0">
                            <h5>Appointments</h5>
                            </div>
                        </div>
                      </div>
                      @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{!! $error !!}</li>  
                                @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(session()->has('success'))
              <div class="alert alert-success text-center">
                   {{ session()->get('success') }}
                </div>
            @endif
                      <div class="card-body">
                        <div class="table-responsive">
                          <table id="myTable" class="table table-hover table-responsive">  
                            <thead>  
                              <tr>  
                                <th>NAME</th>  
                                <th>EMAIL</th>  
                                <th>PHONE</th> 
                                <th>COUNTRY</th>
                                <th>CITY</th> 
                                <th>MEDICAL REGISTRATION</th>
                                <th>MEDICAL PROOF</th>
                                <th>MEDICAL DEGREE</th>
                                <th>REGISTRATION TIME</th>  
                                <th>ACTION's</th>  
                              </tr>  
                            </thead>  
                            <tbody>
                                @if(isset($doctors_list) && !empty($doctors_list))
                                    @php $lists = collect($doctors_list->items()); @endphp
                                    @if(!empty($lists))
                                        @foreach($lists as $key => $app)
                                            <tr>  
                                                <td>{{$app->firstname." ".$app->lastname}}</td>  
                                                <td>{{$app->email}}</td>  
                                                <td>{{$app->phone}}</td>  
                                                <td>{{$app->country}}</td>  
                                                <td>{{$app->city}}</td>  
                                                <td><a href="#imagemodal" class="image-modal" data-toggle="modal" data-target="#imagemodal" data-photo="{{ storage_path("/app/$app->medical_registration") }}">View</a></td>  
                                                <td><a href="#imagemodal" class="image-modal" data-toggle="modal" data-target="#imagemodal" data-photo="{{ storage_path("/app/$app->medical_proof") }}">View</a></td>  
                                                <td><a href="#imagemodal" class="image-modal" data-toggle="modal" data-target="#imagemodal" data-photo="{{ storage_path("/app/$app->medical_degree") }}">View</a></td>  
                                                <td>{{date('H:i:s',strtotime($app->CreatedTime))}}</td> 
                                                <td>
                                                    <form method="POST" action="{{ url('admin/approval') }}"> 
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{$app->id}}">
                                                        <input type="hidden" name="approval" value="{{$app->approval}}">
                                                        @if($app->approval == 'A')
                                                            <button type="submit" class="btn btn-sm btn-danger">Reject</button>
                                                        @else
                                                            <button type="submit" class="btn btn-sm btn-success">Approve</button>
                                                        @endif
                                                    </form>
                                                </td>   
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan=4 class="text-center">No Record Found!</td>
                                        </tr>
                                    @endif
                                @else
                                        <tr>
                                            <td colspan=4 class="text-center">No Record Found!</td>
                                        </tr>
                                @endif
                            </tbody>
                        </table>
                        {{$doctors_list->links()}}
                        </div>
                      </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade " id="imagemodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <img class="modal-img" />
        </div>
    </div>
</div>
{{-- 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin {{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>

                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection

@include('admin.includes.footer')


@section('js')
    <script>
      $(function(){
      $(".image-modal").on("click",function(){
        var src = $(this).data("photo");
        $(".modal-img").prop("src",src);
      });
    });
    </script>
@endsection