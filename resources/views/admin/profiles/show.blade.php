

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
        </svg>

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

@if (profileStatus == false){
  redirect()->route('admin.profiles.index');

}
@endif

<div class="container" style="background-color:pink">
<div class="row">
        <div class="col-md-12" style="padding-left:200">
          <img src="/images/profiles/profile_01.png" class="mx-auto d-block" width="300" height="300" style="border-radius:150px" >
        </div>

      <div class="col-md-1  mx-auto d-block" style="margin-top: 50px">
          <h1> {{ $profile->user->name }} </h1>

      </div>
      <div class="col-md-12 " style="margin-left:120px;margin-right:120px;">
          <div class="row align-items-start">
              <div class="col">
              <h2>
                {{ $profile->sign->title }}
              </h2>


              </div>
              <div class="col">
              <h2>
                {{ $profile->dob }}
              </h2>

              </div>
              <div class="col">
              <h2>
                {{ $profile->location }}
              </h2>

              </div>
          </div>
        </div>

        <div class="col-md-12" style="margin-top:50px">
          <p> I'm baby yOLO poutine chillwave tofu taxidermy authentic raclette sustainable wolf. Single-origin coffee taiyaki knausgaard microdosing, echo park pitchfork yr pour-over pork belly leggings hot chicken fashion axe raw denim. Fashion axe blue bottle kitsch affogato pinterest, VHS banjo photo booth hexagon truffaut waistcoat ennui. Lumbersexual echo park skateboard 8-bit vaporware. Cliche pickled taiyaki, 90's pop-up fixie vaporware chartreuse squid mlkshk tbh cloud bread umami. Umami cray fixie PBR&B meditation subway tile keytar venmo banjo pour-over. Microdosing hot chicken kitsch, four dollar toast vegan put a bird on it literally narwhal chicharrones marfa. </p>
        </div>

<div class="col-md-6">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="/images/profiles/profile_02.png" width="300" height="300" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="/images/profiles/profile_03.png" width="300" height="300" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="/images/profiles/profile_04.png" width="300" height="300" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
</div>
<div class="row-"style="display:flex">
  <div class="col-md-3"><img src="/images/buttonPurple.png"></div>
  <div class="col-md-3"><img src="/images/buttonPurple.png"></div>
  <div class="col-md-3"><img src="/images/buttonPurple.png"></div>
  <div class="col-md-3"><img src="/images/buttonPurple.png"></div>
</div>


 </div>
</div>



{{--
          <div class="card">
            <div class="card-header">
              Doctor {{$doctor->name}}
            </div>

            <div class="card-body">
              <table class="table table-hover">
                <tbody>
                  <tr>
                    <td>Name</td>
                    <td>{{$doctor->name}}</td>
                  </tr>
                  <tr>
                    <td>Address</td>
                    <td>{{$doctor->address}}</td>
                  </tr>
                  <tr>
                    <td>Phone</td>
                    <td>{{$doctor->phone}}</td>
                  </tr>
                  <tr>
                    <td>E-Mail</td>
                    <td>{{$doctor->email}}</td>
                  </tr>
                  <tr>
                    <td>Start Date</td>
                    <td>{{$doctor->startDate}}</td>
                  </tr>
                  <tr>
                    <td>Actions</td>
                    <td>{{$doctor->actions}}</td>
                  </tr>
                </tbody>
              </table>
                         <a href="{{ route('admin.doctors.index')}}" class="btn btn-default">Back</a>
                         <a href="{{ route('admin.doctors.edit', $doctor->id)}}" class="btn btn-warning">Edit</a>
                         <form style="display:inline block" method="POST" action="{{ route('admin.doctors.destroy', $doctor->id)}}">
                           <input type="hidden" name="_method" value="DELETE">
                           <input type="hidden" name="_token" value="{{csrf_token()}}">
                           <button type="submit" class="form-control btn btn-danger">Delete</button>
                         </form>
                    </div>
                  </div>
                </div>
              </div>
            </div> --}}



          @endsection
