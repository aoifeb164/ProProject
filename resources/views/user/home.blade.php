@extends('layouts.user')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

                <div class="header">
                  <div class="text-center">
                    <h3><u>Home</u></h3>
                </div>
              </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    {{-- @foreach($profiles as $profile)
                    <div class="carousel-item active">
                           <img src="{{url ('/'. $profile->photo->filename)}}"a class="d-block w-10" height="300" width="300">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{$profile->name}}</h5>
                        <p>{{$profile->age}}</p>
                        <p>{{$profile->sign}}</p>
                    </div>
                </div>
                @endforeach --}}
                <!--Carousel-->
                <div class="bd-example">
                    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">

                        <div class="carousel-inner">
                            @foreach( $profiles as $profile )
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                <img src="{{url ('/'. $profile->photo->filename)}}" style="margin-top:30px;" a class="rounded mx-auto d-block" height="350" width="350">
                                <a href="{{ route('user.profiles.show') }}"><h5 class="text-center" style="padding-top:50px;">{{$profile->user->name}}</h5></a>
                                <p class="text-center">{{$profile->dob}}</p>
                                <p class="text-center">{{$profile->sign->title}}</p>
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" style="background-color:#2e164f; height:50px; width:50px; border-radius:100px; margin-top:250px;" href="#carouselExampleCaptions" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next" style="background-color:#2e164f; height:50px; width:50px; border-radius:100px; margin-top:250px;" href="#carouselExampleCaptions" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>
                <!--Carousel-->
                <div class="text-center">
                <button type="button" class="btn btn-outline-success" style="border-radius:100px; margin:10px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="30" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                    </svg>
                </button>
                <button type="button" class="btn btn-outline-danger" style="border-radius:100px; margin:10px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="30" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                    </svg>
                </button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
