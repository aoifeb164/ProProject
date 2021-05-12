@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
<h5 style="padding-left:20px; padding-top:20px;">Create new Conversation:</h5>

                <div class='card-body'>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    {{-- create new patient form --}}
                    <form method="POST" action="{{ route('user.messages.store') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form_group">
                            {{-- creating form fields to fill in the information to be added to the database --}}
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('') }}" />
                        </div>
                        <br>

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
                <br>
                <div class="form_group">
                    <label for="message" style="padding-top:20px;">Message</label>
                    <textarea type="text" class="form-control" id="message" rows="3" name="message" value="{{ old('message') }}"> </textarea>
                </div>
              <br>

            <div class="float-right">
                <br>
                {{-- creating cancel and submit button --}}
                <a href="{{ route('user.conversations.index') }}" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn">
                  <svg xmlns="http://www.w3.org/2000/svg" width="30" height="40" fill="purple" class="bi bi-arrow-right" viewBox="0 0 16 16">
<path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
</svg>
                </button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
