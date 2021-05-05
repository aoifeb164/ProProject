@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <p id="alert-message" class="alert collapse"></p>


            <div class="header">
                <div class="text-center">
                    <h3><u>Inbox</u></h3>
                </div>

            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="joined-tab" data-toggle="tab" href="#joined" role="tab" aria-controls="joined" aria-selected="true">Conversations Joined</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="started-tab" data-toggle="tab" href="#started" role="tab" aria-controls="started" aria-selected="false">Conversations Started</a>
                    </li>
                    {{-- <li>
                <a href="{{ route('user.conversations.create') }}" class="btn btn-primary" style="margin-left:580px">New Conversation</a>
                    </li> --}}
                    {{-- <li class="nav-item">
                        <a class="nav-link" id="new-tab" data-toggle="tab" href="#new" role="tab" aria-controls="new" aria-selected="false" style="margin-left:580px;"> --}}
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path
                                  d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg> --}}
                    {{-- New Conversation
                          </a>
                    </li> --}}

                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="joined" role="tabpanel" aria-labelledby="joined-tab">
                        @if (count($joined)=== 0)
                        <div class="text-center">
                            <p style="padding:200px;">You have no messages!</p>
                        </div>
                        @else
                        <table id="table-messages" class="table table-hover">

                            <tbody>
                                @foreach ($joined as $conversation)
                                {{-- get profiles by id and display the following information --}}
                                <tr data-id="{{ $conversation->id }}">
                                    <td><a href="{{ route('user.messages.index') }}">
                                            <h5 style="padding-left:80px">{{ $conversation->title }}</h5>
                                        </a>
                                    </td>
                                    <td>
                                        <p style="padding-left:100px">{{ $conversation->sender->user->name }}</p>
                                    </td>
                                    {{-- <td>
                                        <p>{{ $conversation->recipient->user->name }}</p>
                                    </td> --}}
                                    <td>
                                        {{-- creating a view, edit and delete button --}}

                                        <form style="display:inline-block" method="POST" action="{{ route('user.conversations.destroy', $conversation->id ) }}">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit" class="form-control btn btn-outline"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="red" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                    <path fill-rule="evenodd"
                                                      d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                </svg></a>
                                        </form>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>
                    <div class="tab-pane fade" id="started" role="tabpanel" aria-labelledby="started-tab">
                        @if (count($started)=== 0)
                        <div class="text-center">
                            <p style="padding:200px;">You have no messages!</p>
                        </div>
                        @else
                        <table id="table-messages" class="table table-hover">

                            <tbody>
                                @foreach ($started as $conversation)
                                {{-- get profiles by id and display the following information --}}
                                <tr data-id="{{ $conversation->id }}">
                                    <td><a href="{{ route('user.messages.index') }}">
                                            <h5 style="padding-left:80px; color:black;">{{ $conversation->title }}</h5>
                                        </a>
                                    </td>
                                    {{-- <td>
                                        <p style="padding-left:140px">{{ $conversation->sender->user->name }}</p>
                                    </td> --}}

                                    <td>
                                        <p>{{ $conversation->recipient->user->name }}</p>
                                    </td>
                                    <td>
                                        {{-- creating a view, edit and delete button --}}

                                        <form style="display:inline-block" method="POST" action="{{ route('user.conversations.destroy', $conversation->id ) }}">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit" class="form-control btn"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="red" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                    <path fill-rule="evenodd"
                                                      d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                </svg></a>
                                        </form>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>


                    {{-- <div class="tab-pane fade container-fluid" id="new" role="tabpanel" aria-labelledby="new-tab" style="width:600px;">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
                @endif

                <form method="POST" action="{{ route('user.messages.store') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form_group" style="padding-top:20px;">

                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('') }}" />
                    </div>
                    <br>

                    <div class="form_group">
                        <label for="sender">Sender</label>
                        <br>
                        <select name="sender_id">
                            @foreach ($profiles as $profile)
                            <option value="{{ $profile->id }}" {{ (old('sender_id', $profile->user->name) == $profile->user->name) ? "selected" : "" }}>{{ $profile->user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="form_group">
                        <label for="recipient">Recipient</label>
                        <br>
                        <select name="recipient_id">
                            @foreach ($matches_sent as $profile)
                            <option value="{{ $profile->id }}" {{ (old('recipient_id', $profile->user->name) == $profile->user->name) ? "selected" : "" }}>{{ $profile->user->name }}</option>
                            @endforeach
                            @foreach ($matches_recieved as $profile)
                            <option value="{{ $profile->id }}" {{ (old('recipient_id', $profile->user->name) == $profile->user->name) ? "selected" : "" }}>{{ $profile->user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="form_group">
                        <label for="message">Message</label>
                        <input type="text" class="form-control" id="message" name="message" value="{{ old('message') }}" />
                    </div>
                    <br> --}}
                    {{-- <div class="form_group">
                  <label for="sender">Sender</label>
                  <br>
                  <select name="sender_id">
                      @foreach ($profiles as $profile)
                      <option value="{{ $profile->user->name }}" {{ (old('sender_id', $profile->user->name) == $profile->user->name) ? "selected" : "" }}>{{ $profile->user->name }}</option>
                    @endforeach
                    </select>
            </div> --}}
            {{-- <br>

                    <div class="float-right">
                        <br>

                        <a href="{{ route('user.messages.index') }}" class="btn btn-default">Cancel</a>
            <button type="submit" class="btn btn-primary pull-right">Submit</button>
            </form>
        </div>
    </div> --}}


</div>
</div>
</div>
</div>
@endsection
