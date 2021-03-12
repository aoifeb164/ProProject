@extends('layouts.app')

@section('content')
<div class="">
    {{-- <pre>{{$errors}}</pre> --}}
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="header text-center">
                <h2>{{ __('Register Now') }}</h2>
            </div>

            <div class="body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form">
                                <div class="mb-3" style="width:450px;">
                                    <label for="name" class="col col-form-label">{{ __('Name') }}</label>

                                    <div class="col">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form">
                                <div class="mb-3" style="width:450px;">
                                    <label for="email" class="col-md-4 col-form-label">{{ __('Email Address') }}</label>

                                    <div class="col">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form">
                                <div class="mb-3" style="width:450px;">
                                    <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>

                                    <div class="col">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form">
                                <div class="mb-3" style="width:450px;">
                                    <label for="password-confirm" class="col-md-4 col-form-label">{{ __('Confirm') }}</label>

                                    <div class="col">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form">
                                <div class="mb-3" style="width:450px;">
                                    <label for="dob" class="col-md-4 col-form-label">{{ __('Date of Birth') }}</label>

                                    <div class="col">
                                        <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="dob">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form">
                                <div class="mb-3" style="width:450px;">
                                    <label for="location" class="col-md-4 col-form-label">{{ __('Location') }}</label>

                                    <div class="col">
                                        <input id="location" type="location" class="form-control" name="location" required autocomplete="location">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="form_group">
                            <label for="gender">Gender</label>
                            <br>
                            <select name="gender_id">
                                @foreach ($genders as $gender)
                                <option value="{{ $gender->id }}" {{ (old('gender_id', $gender->title) == $profile->gender->title) ? "selected" : "" }}>{{ $gender->title }}</option>
                    @endforeach
                    </select>
            </div> --}}
            <div class="row">
                <div class="col">
                    <div class="form">
                        <div class="mb-3" style="width:450px;">
                            <label for="gender" class="col-md-4 col-form-label">{{ __('Gender') }}</label>

                            <div class="col">
                                <input id="gender_id" type="gender" class="form-control" name="gender_id" required autocomplete="gender">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="form">
                        <div class="mb-3" style="width:450px;">
                            <label for="sign" class="col-md-4 col-form-label">{{ __('Sign') }}</label>

                            <div class="col">
                                <input id="sign_id" type="sign" class="form-control" name="sign_id" required autocomplete="sign">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form">
                <div class="mb-3" style="width:1940px;">
                    <label for="bio" class="col-md-4 col-form-label">{{ __('Bio') }}</label>

                    <div class="col-md-6">
                        <input id="bio" type="bio" class="form-control" name="bio" required autocomplete="bio" style="height:160px;">
                    </div>
                </div>
            </div>

            <div class="form">
                <div class="mb-3" style="width:1400px;">
                    <H4 style="padding-left:20px"> Interested In:</h4>
                    <H5 style="padding-left:20px"> Star Signs:</h5>
                    <div class="form-check form-check-inline" style="padding-left:20px;">
                        <input class="form-check-input" type="checkbox" id="sign_id" value="option1">
                        <label class="form-check-label" for="sign_id">Aries</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="sign_id" value="option1">
                        <label class="form-check-label" for="sign_id">Taurus</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="sign_id" value="option1">
                        <label class="form-check-label" for="sign_id">Gemini</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="sign_id" value="option1">
                        <label class="form-check-label" for="sign_id">Cancer</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="sign_id" value="option1">
                        <label class="form-check-label" for="sign_id">Leo</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="sign_id" value="option1">
                        <label class="form-check-label" for="sign_id">Virgo</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="sign_id" value="option1">
                        <label class="form-check-label" for="sign_id">Libra</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="sign_id" value="option1">
                        <label class="form-check-label" for="sign_id">Scorpio</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="sign_id" value="option1">
                        <label class="form-check-label" for="sign_id">Sagittarius</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="sign_id" value="option1">
                        <label class="form-check-label" for="sign_id">Capricorn</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="sign_id" value="option1">
                        <label class="form-check-label" for="sign_id">Aquarius</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="sign_id" value="option1">
                        <label class="form-check-label" for="sign_id">Pisces</label>
                    </div>
                </div>

                <H5 style="padding-left:20px"> Genders:</h5>
                <div class="form-check form-check-inline" style="padding-left:20px;">
                    <input class="form-check-input" type="checkbox" id="gender_id" value="option1">
                    <label class="form-check-label" for="gender_id">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="gender_id" value="option1">
                    <label class="form-check-label" for="gender_id">Female</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="gender_id" value="option1">
                    <label class="form-check-label" for="gender_id">Gender Neutral</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="gender_id" value="option1">
                    <label class="form-check-label" for="gender_id">Non Binary</label>
                </div>


                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary" style="margin-top:20px; margin-left:100px;">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
