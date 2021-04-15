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

                <div class="bd-example">
                    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                      <div class= "card" style="width:400px; height:570px; margin: 0 auto; float: none; border">
                        <div class="carousel-inner">
                            @foreach( $profiles as $profile )
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                              @if(!(Auth::user()->profile->matches_sent->contains($profile->id)) &&
                                  !(Auth::user()->profile->matches_recieved->contains($profile->id)))
                                <img src="{{url ('/'. $profile->photo->filename)}}" a class="rounded mx-auto d-block" height="350" width="250" style="padding-top:20px">
                                <a href="{{ route('user.profiles.show') }}"><h5 class="text-center" style="padding-top:20px;">{{$profile->user->name}}</h5></a>
                                <p class="text-center">{{$profile->dob}}</p>
                                <p class="text-center">{{$profile->sign->title}}</p>
                                <p class="text-center">{{$profile->gender->title}}</p>
                                {{-- @if(!(Auth::user()->profile->matches_sent->contains($profile->id)) &&
                                    !(Auth::user()->profile->matches_recieved->contains($profile->id))) --}}
                                    <form method='post'>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                      <input type="hidden" name="matcher_id" value="{{Auth::user()->profile->id}}">
                                      <input type="hidden" name="matchee_id" value="{{$profile->id}}">
                                      <button type="submit"
                                              id="accept"
                                              class="btn btn-outline-success"
                                              style="border-radius:100px; margin-left:178px;"
                                              formaction="{{route('user.matches.store')}}"
                                      >
                                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="30" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                              <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                                          </svg>
                                      </button>
                                    </form>

                                @endif
                            </div>

                            @endforeach
                        </div>
                      </div>
                        <a class="carousel-control-prev" style="background-color:#2e164f; height:50px; width:50px; border-radius:100px; margin-top:200px;" href="#carouselExampleCaptions" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next" style="background-color:#2e164f; height:50px; width:50px; border-radius:100px; margin-top:200px;" href="#carouselExampleCaptions" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </a>

                      </div>
                </div>
                <!--Carousel-->
            </div>
        </div>
    </div>
</div>
</div>
@endsection
