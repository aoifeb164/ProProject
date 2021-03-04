@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Edit your profile:
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
                    {{-- edit profile form --}}
                    <form method="POST" action="{{ route('user.profiles.update', $profile->id) }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="Put">
                        <div class="form_group">
                            {{-- creating form fields to fill in the information to be added to the database --}}
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $profile->user->name) }}" />
                        </div>
                        <br>

                        <div class="form_group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $profile->user->email) }}" />
                        </div>
                        <br>

                        <div class="form_group">
                            <label for="bio">Bio</label>
                            <input type="text" class="form-control" id="bio" name="bio" value="{{ old('bio', $profile->bio) }}" />
                        </div>
                        <br>

                        <div class="form_group">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" id="location" name="location" value="{{ old('location', $profile->location) }}" />
                        </div>
                        <br>


                        <div class="form_group">
                            <label for="gender">Gender</label>
                            <br>
                            <select name="gender_id">
                                @foreach ($genders as $gender)
                                <option value="{{ $gender->id }}" {{ (old('gender_id', $gender->title) == $profile->gender->title) ? "selected" : "" }}>{{ $gender->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>

                        <div class="form_group">
                            <label for="sign">Sign</label>
                            <br>
                            <select name="sign_id">
                                @foreach ($signs as $sign)
                                <option value="{{ $sign->id }}" {{ (old('sign_id', $sign->title) == $profile->sign->title) ? "selected" : "" }}>{{ $sign->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>

                        <br>
                        <div class="float-right">
                            <br>

                            <button type="submit" class="btn btn-primary pull-right">Update</a>
                                <form style="display:inline-block" method="POST" action="{{ route('user.profiles.destroy', $profile->id ) }}">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="form-control btn btn-danger">Delete</a>
                                </form>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
