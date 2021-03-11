@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <p id="alert-message" class="alert collapse"></p>


            <div class="header">
                <div class="text-center">
                    <h3><u>Matches</u></h3>
                </div>
            </div>

            {{-- if there are no profiles display the following message --}}
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="sent-tab" data-toggle="tab" href="#sent" role="tab" aria-controls="sent" aria-selected="true">Matches Sent</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="recieved-tab" data-toggle="tab" href="#recieved" role="tab" aria-controls="recieved" aria-selected="false">Matches Recieved</a>
                    </li>

                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="sent" role="tabpanel" aria-labelledby="sent-tab">
                      @if (count($matches_sent)=== 0)
                      <p>There are no Matches!</p>
                      @else
                      <table id="table-profiles" class="table table-hover">

                          <tbody>
                              @foreach ($matches_sent as $profile)
                              {{-- get profiles by id and display the following information --}}
                              <tr data-id="{{ $profile->id }}">
                                  {{-- <td><h5>{{ $profile->user->name }}</h5>
                                  </td> --}}
                                  <td><a href="{{ route('user.profiles.show', $profile->id) }}">
                                          <h5>{{$profile->user->name}}</h5>
                                      </a></td>
                                  <td>{{ $profile->dob }}</td>
                                  <td>{{ $profile->sign->title }}</td>
                                  <td>{{ $profile->location }}</td>
                                  <td>{{ $profile->pivot->status }}</td>
                                  <td>

                                      {{-- <a href="{{ route('user.conversations.create') }}" class="btn btn-primary">Message</a>
                                      <form style="display:inline-block" method="POST" action="{{ route('user.matches.destroy', $profile->id ) }}">
                                          <input type="hidden" name="_method" value="DELETE">
                                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                          <button type="submit" class="form-control btn btn-danger">Unmatch</a>
                                      </form> --}}

                                  </td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                      @endif
                    </div>
                    <div class="tab-pane fade" id="recieved" role="tabpanel" aria-labelledby="recieved-tab">
                      @if (count($matches_recieved)=== 0)
                    <p>There are no Matches!</p>
                    @else
                    <table id="table-profiles" class="table table-hover">

                        <tbody>
                            @foreach ($matches_recieved as $profile)
                            {{-- get profiles by id and display the following information --}}
                            <tr data-id="{{ $profile->id }}">
                                {{-- <td><h5>{{ $profile->user->name }}</h5>
                                </td> --}}
                                <td><a href="{{ route('user.profiles.show', $profile->id) }}">
                                        <h5>{{$profile->user->name}}</h5>
                                    </a></td>
                                <td>{{ $profile->dob }}</td>
                                <td>{{ $profile->sign->title }}</td>
                                <td>{{ $profile->location }}</td>
                                <td>{{ $profile->pivot->status }}</td>
                                <td>
                                  @if($profile->pivot->status== 'pending')
                                    <form>
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
                                    </form>
                                  @endif
                                    {{-- <a href="{{ route('user.conversations.create') }}" class="btn btn-primary">Message</a>
                                    <form style="display:inline-block" method="POST" action="{{ route('user.matches.destroy', $profile->id ) }}">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="form-control btn btn-danger">Unmatch</a>
                                    </form> --}}

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
