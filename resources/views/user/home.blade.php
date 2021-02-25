@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Start Liking!') }}</div>

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

                        <ol class="carousel-indicators">
                            @foreach($profiles as $profile)
                            <li data-target=".carouselExampleCaptions" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach( $profiles as $profile )
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                <img src="{{url ('/'. $profile->photo->filename)}}" a class="d-block w-10" height="300" width="300">
                                <a href="{{ route('user.profiles.show', $profile->id) }}"><h5>{{$profile->user->name}}</h5></a>
                                <p>{{$profile->dob}}</p>
                                <p>{{$profile->sign->title}}</p>
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>
                <!--Carousel-->
                <button type="button" class="btn btn-outline-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                    </svg>
                </button>
                <button type="button" class="btn btn-outline-danger">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                    </svg>
                </button>

            </div>
        </div>
    </div>
</div>
</div>
@endsection
