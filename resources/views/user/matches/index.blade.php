@extends('layouts.user')

@section('content')
<script src="{{ asset('/updateMatch.php')}}"></script>
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <p id="alert-message" class="alert collapse"></p>


            <div class="header">
                <div class="text-center">
                    <h3><u>Matches</u></h3>
                </div>
            </div>
            <a href="{{ route('user.conversations.create') }}" class="btn btn-primary" style="margin-left:880px"> New conversation
              {{-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z"/>
              </svg> --}}
            </a>

            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="recieved-tab" data-toggle="tab" href="#recieved" role="tab" aria-controls="recieved" aria-selected="true">Likes Recieved</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="sent-tab" data-toggle="tab" href="#sent" role="tab" aria-controls="sent" aria-selected="false">Likes Sent</a>
                    </li>


                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade" id="sent" role="tabpanel" aria-labelledby="sent-tab">
                        @if (count($matches_sent)=== 0)
                        <p>There are no Matches!</p>
                        @else
                        <table id="table-profiles" class="table table-hover">

                            <tbody>
                                @foreach ($matches_sent as $profile)
                                  @if($profile->pivot->status== 'pending')
                                    <tr data-id="{{ $profile->id }}">
                                        {{-- <td><h5>{{ $profile->user->name }}</h5>
                                        </td> --}}
                                                                            <td><img src="{{url ('/'. $profile->photo->filename)}}" a class="mx-auto d-block" height="50" width="50" style="border-radius:125px"></td>
                                        <td><a href="{{ route('user.profiles.show') }}">
                                                <h5>{{$profile->user->name}}</h5>
                                            </a></td>
                                        <td>{{ $profile->dob }}</td>
                                        <td>{{ $profile->sign->title }}</td>
                                        <td><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 512 512"><path fill="#08a121" d="M253.924 127.592a64 64 0 1 0 64 64a64.073 64.073 0 0 0-64-64zm0 96a32 32 0 1 1 32-32a32.037 32.037 0 0 1-32 32z"/><path fill="#08a121" d="M376.906 68.515A173.922 173.922 0 0 0 108.2 286.426l120.907 185.613a29.619 29.619 0 0 0 49.635 0l120.911-185.613a173.921 173.921 0 0 0-22.747-217.911zm-4.065 200.444l-118.916 182.55l-118.917-182.55c-36.4-55.879-28.593-130.659 18.563-177.817a141.92 141.92 0 0 1 200.708 0c47.156 47.158 54.962 121.938 18.562 177.817z"/></svg>{{ $profile->location }}</td>
                                        <td>{{ $profile->pivot->status }}</td>
                                        <td>
                                      {{-- <form method='post'>
                                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                          <input type="hidden" name="matcher_id" value="{{$profile->pivot->matcher_id}}">
                                          <input type="hidden" name="matchee_id" value="{{$profile->pivot->matchee_id}}">
                                          <input type="hidden" name="status" id="match-status" value="" />
                                          <button type="submit" id="accept" class="btn btn-outline-success" style="border-radius:100px; margin:10px;" formaction="{{route('user.matches.accept')}}">
                                              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                                  <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                                              </svg>
                                          </button>
                                          <button type="submit" id="reject" class="btn btn-outline-danger" style="border-radius:100px; margin:10px;" formaction="{{route('user.matches.reject')}}">
                                              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                  <path
                                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                              </svg>
                                          </button>

                                      </form> --}}
                                      @endif

                                      @if($profile->pivot->status== 'accepted')
                                        <tr data-id="{{ $profile->id }}">
                                            {{-- <td><h5>{{ $profile->user->name }}</h5>
                                            </td> --}}
                                            <td><img src="{{url ('/'. $profile->photo->filename)}}" a class="mx-auto d-block" height="50" width="50" style="border-radius:125px"></td>
                                            <td><a href="{{ route('user.profiles.show') }}">

                                                    <h5>{{$profile->user->name}}</h5>
                                                </a></td>
                                            <td>{{ $profile->dob }}</td>
                                            <td>{{ $profile->sign->title }}</td>
                                            <td><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 512 512"><path fill="#08a121" d="M253.924 127.592a64 64 0 1 0 64 64a64.073 64.073 0 0 0-64-64zm0 96a32 32 0 1 1 32-32a32.037 32.037 0 0 1-32 32z"/><path fill="#08a121" d="M376.906 68.515A173.922 173.922 0 0 0 108.2 286.426l120.907 185.613a29.619 29.619 0 0 0 49.635 0l120.911-185.613a173.921 173.921 0 0 0-22.747-217.911zm-4.065 200.444l-118.916 182.55l-118.917-182.55c-36.4-55.879-28.593-130.659 18.563-177.817a141.92 141.92 0 0 1 200.708 0c47.156 47.158 54.962 121.938 18.562 177.817z"/></svg>{{ $profile->location }}</td>
                                            <td>{{ $profile->pivot->status }}</td>
                                            <td>
                                              <a href="{{ route('user.conversations.create') }}" class"btn btn-outline">
                                                <button type="submit" id="accept" class="btn btn-outline-primary" style="border-radius:100px; margin:10px;"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#5d90e3" class="bi bi-envelope" viewBox="0 0 16 16">
                                                  <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z"/>
                                                </svg></button>
                                              </a>

                                                <form style="display:inline-block" method="POST" action="{{ route('user.matches.destroy', $profile->id ) }}">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" id="accept" class="btn btn-outline-danger" style="border-radius:100px; margin:10px;"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 512 512"><path d="M473.7 73.8l-2.4-2.5c-46-47-118-51.7-169.6-14.8L336 159.9l-96 64l48 128l-144-144l96-64l-28.6-86.5C159.7 19.6 87 24 40.7 71.4l-2.4 2.4C-10.4 123.6-12.5 202.9 31 256l212.1 218.6c7.1 7.3 18.6 7.3 25.7 0L481 255.9c43.5-53 41.4-132.3-7.3-182.1z" fill="#e81c1c"/></svg></a>
                                                </form>



                                          @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>
                    <div class="tab-pane fade show active" id="recieved" role="tabpanel" aria-labelledby="recieved-tab">
                        @if (count($matches_recieved)=== 0)
                        <p>There are no Matches!</p>
                        @else
                        <table id="table-profiles" class="table table-hover">

                            <tbody>
                              {{-- <div class="row" style="margin-top:5px;">
                                <h5 style="margin-left:180px;">name</h5>

                                  <h5 style="margin-left:190px;">age</h5>

                                    <h5 style="margin-left:115px;">sign</h5>

                                  <h5 style="margin-left:65px;">location</h5>

                                  <h5 style="margin-left:50px;">status</h5>

                              </div> --}}
                                @foreach ($matches_recieved as $profile)
                                {{-- get profiles by id and display the following information --}}

                                        @if($profile->pivot->status== 'pending')
                                          <tr data-id="{{ $profile->id }}">
                                              {{-- <td><h5>{{ $profile->user->name }}</h5>
                                              </td> --}}
                                                                                  <td><img src="{{url ('/'. $profile->photo->filename)}}" a class="mx-auto d-block" height="50" width="50" style="border-radius:125px"></td>
                                              <td><a href="{{ route('user.profiles.show') }}">
                                                      <h5>{{$profile->user->name}}</h5>
                                                  </a></td>
                                              <td>{{ $profile->dob }}</td>
                                              <td>{{ $profile->sign->title }}</td>
                                              <td><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 512 512"><path fill="#08a121" d="M253.924 127.592a64 64 0 1 0 64 64a64.073 64.073 0 0 0-64-64zm0 96a32 32 0 1 1 32-32a32.037 32.037 0 0 1-32 32z"/><path fill="#08a121" d="M376.906 68.515A173.922 173.922 0 0 0 108.2 286.426l120.907 185.613a29.619 29.619 0 0 0 49.635 0l120.911-185.613a173.921 173.921 0 0 0-22.747-217.911zm-4.065 200.444l-118.916 182.55l-118.917-182.55c-36.4-55.879-28.593-130.659 18.563-177.817a141.92 141.92 0 0 1 200.708 0c47.156 47.158 54.962 121.938 18.562 177.817z"/></svg>{{ $profile->location }}</td>
                                              <td>{{ $profile->pivot->status }}</td>
                                              <td>
                                            <form method='post'>
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="matcher_id" value="{{$profile->pivot->matcher_id}}">
                                                <input type="hidden" name="matchee_id" value="{{$profile->pivot->matchee_id}}">

                                                <input type="hidden" name="status" id="match-status" value="" />
                                                <button type="submit" id="accept" class="btn btn-outline-success" style="border-radius:100px; margin:10px;" formaction="{{route('user.matches.accept')}}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                                                    </svg>
                                                </button>
                                                <button type="submit" id="reject" class="btn btn-outline-danger" style="border-radius:100px; margin:10px;" formaction="{{route('user.matches.reject')}}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                        <path
                                                          d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                    </svg>
                                                </button>

                                            </form>
                                            @endif
                                            @if($profile->pivot->status== 'accepted')
                                              <tr data-id="{{ $profile->id }}">
                                                  {{-- <td><h5>{{ $profile->user->name }}</h5>
                                                  </td> --}}
                                                                                      <td><img src="{{url ('/'. $profile->photo->filename)}}" a class="mx-auto d-block" height="50" width="50" style="border-radius:125px"></td>
                                                  <td><a href="{{ route('user.profiles.show') }}">
                                                          <h5>{{$profile->user->name}}</h5>
                                                      </a></td>
                                                  <td>{{ $profile->dob }}</td>
                                                  <td>{{ $profile->sign->title }}</td>
                                                  <td><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 512 512"><path fill="#08a121" d="M253.924 127.592a64 64 0 1 0 64 64a64.073 64.073 0 0 0-64-64zm0 96a32 32 0 1 1 32-32a32.037 32.037 0 0 1-32 32z"/><path fill="#08a121" d="M376.906 68.515A173.922 173.922 0 0 0 108.2 286.426l120.907 185.613a29.619 29.619 0 0 0 49.635 0l120.911-185.613a173.921 173.921 0 0 0-22.747-217.911zm-4.065 200.444l-118.916 182.55l-118.917-182.55c-36.4-55.879-28.593-130.659 18.563-177.817a141.92 141.92 0 0 1 200.708 0c47.156 47.158 54.962 121.938 18.562 177.817z"/></svg>{{ $profile->location }}</td>
                                                  <td>{{ $profile->pivot->status }}</td>
                                                  <td>
                                              <a href="{{ route('user.conversations.create') }}" class"btn btn-outline">
                                                <button type="submit" id="accept" class="btn btn-outline-primary" style="border-radius:100px; margin:10px;"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#5d90e3" class="bi bi-envelope" viewBox="0 0 16 16">
                                                  <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z"/>
                                                </svg></button>
                                              </a>

                                                <form style="display:inline-block" method="POST" action="{{ route('user.matches.destroy', $profile->id ) }}">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" id="accept" class="btn btn-outline-danger" style="border-radius:100px; margin:10px;"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 512 512"><path d="M473.7 73.8l-2.4-2.5c-46-47-118-51.7-169.6-14.8L336 159.9l-96 64l48 128l-144-144l96-64l-28.6-86.5C159.7 19.6 87 24 40.7 71.4l-2.4 2.4C-10.4 123.6-12.5 202.9 31 256l212.1 218.6c7.1 7.3 18.6 7.3 25.7 0L481 255.9c43.5-53 41.4-132.3-7.3-182.1z" fill="#e81c1c"/></svg></a>
                                                </form>

                                                @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif</div>

                    </div>

                </div>
            </div>

        </div>
    </div>
    @endsection
