

@extends('layouts.nav')


@section('content')
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('/public/js/bs.js') }}" rel="stylesheet">

<script type=”text/javascript” src=”{{asset(‘js/bootstrap.js’)}}”></script> --}}

  @auth
  @if (Auth::user()->hasRole('admin'))
    <div class="col-md-2" style="background:#e0d6ff">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">

        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mailbox" viewBox="0 0 16 16">
            <path d="M4 4a3 3 0 0 0-3 3v6h6V7a3 3 0 0 0-3-3zm0-1h8a4 4 0 0 1 4 4v6a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V7a4 4 0 0 1 4-4zm2.646 1A3.99 3.99 0 0 1 8 7v6h7V7a3 3 0 0 0-3-3H6.646z"/>
            <path d="M11.793 8.5H9v-1h5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.354-.146l-.853-.854zM5 7c0 .552-.448 0-1 0s-1 .552-1 0a1 1 0 0 1 2 0z"/>
        </svg> <p> View User's Inbox </p>

      </li>
      <li class="nav-item">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wrench" viewBox="0 0 16 16">
          <path d="M.102 2.223A3.004 3.004 0 0 0 3.78 5.897l6.341 6.252A3.003 3.003 0 0 0 13 16a3 3 0 1 0-.851-5.878L5.897 3.781A3.004 3.004 0 0 0 2.223.1l2.141 2.142L4 4l-1.757.364L.102 2.223zm13.37 9.019l.528.026.287.445.445.287.026.529L15 13l-.242.471-.026.529-.445.287-.287.445-.529.026L13 15l-.471-.242-.529-.026-.287-.445-.445-.287-.026-.529L11 13l.242-.471.026-.529.445-.287.287-.445.529-.026L13 11l.471.242z"/>
        </svg>
      </li>
      <li class="nav-item">



        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
          <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
          <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
        </svg>

      </li>
    </ul>
  </div>
  @endif
@endauth


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            {{-- <div class="card-header">{{ __('Dashboard') }}
        </div> --}}

        <div class="card" style=" width:800px; margin-top:20px; padding-top:20px;">
            <div class="card-body">
                {{-- <td>{{ $profile->photo->filename }}</td> --}}
                <div class="text-center">
                    <img src="{{url ('/'. $profile->photo->filename)}}" style="width:260px; height:260px; border-radius:125px; border: 2px solid #2e164f;" />
                </div>


                <div class="text-center">
                    <td>
                        <h3 style="padding-top:40px;">{{ $profile->user->name }}</h3>
                    </td>
                </div>

                <div class="row text-center" style="padding-top:20px; padding-bottom:20px;">
                    <div class="col-md">
                        <h5>{{ $profile->sign->title }}</h5>
                    </div>
                    <div class="col-md">
                        <h5>{{ $profile->dob }}</h5>
                    </div>
                    <div class="col-md">
                        <h5>{{ $profile->location }}</h5>
                    </div>
                </div>
                <div class="row" style="width:750px;">

                    <p style="padding-left:60px;">{{ $profile->bio }}</p>

                </div>

                <div class="row" style="width:750px;">

                    {{-- <h5>Recommended Profiles:</h5> --}}

                    <div class="bd-example">


                        <div>

                            <div class="row">
                                <h5 style="padding-left:75px; padding-top: 20px;">Photos:</h5>
                            </div>
                            <div class="row">
                                <div class="col" style="padding-left:60px; padding-right:30px">

                                    <img src="{{url ('/'. $profile->photo->filename)}}" style="margin-top:30px;" a class="rounded mx-auto d-block" height="120" width="120">


                                </div>


                                <div class="col" style="padding-left:30px; padding-right:30px">

                                    <img src="{{url ('/'. $profile->photo->filename)}}" style="margin-top:30px;" a class="rounded mx-auto d-block" height="120" width="120">

                                </div>



                                <div class="col" style="padding-left:30px; padding-right:30px">

                                    <img src="{{url ('/'. $profile->photo->filename)}}" style="margin-top:30px;" a class="rounded mx-auto d-block" height="120" width="120">


                                </div>

                                <div class="col" style="padding-left:30px; padding-right:30px">

                                    <img src="{{url ('/'. $profile->photo->filename)}}" style="margin-top:30px;" a class="rounded mx-auto d-block" height="120" width="120">


                                </div>
                            </div>


                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
