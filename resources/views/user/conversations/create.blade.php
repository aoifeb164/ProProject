@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Add new message
                </div>

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
                        {{-- <div class="form_group">
                            <label for="sender_id">Sender id</label>
                            <input type="text" class="form-control" id="sender_id" name="sender_id" value="{{ old('sender_id') }}" />
                </div> --}}
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
                        @foreach ($profiles as $profile)
                        <option value="{{ $profile->id }}" {{ (old('recipient_id', $profile->user->name) == $profile->user->name) ? "selected" : "" }}>{{ $profile->user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="form_group">
                    <label for="message">Message</label>
                    <input type="text" class="form-control" id="message" name="message" value="{{ old('message') }}" />
                </div>
                <br>
                {{-- <div class="form_group">
                            <label for="sender">Sender</label>
                            <br>
                            <select name="sender_id">
                                @foreach ($profiles as $profile)
                                <option value="{{ $profile->user->name }}" {{ (old('sender_id', $profile->user->name) == $profile->user->name) ? "selected" : "" }}>{{ $profile->user->name }}</option>
                @endforeach
                </select>
            </div> --}}
            <br>

            <div class="float-right">
                <br>
                {{-- creating cancel and submit button --}}
                <a href="{{ route('user.messages.index') }}" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary pull-right">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
