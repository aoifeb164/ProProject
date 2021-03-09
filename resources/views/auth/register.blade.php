@extends('layouts.app')

@section('content')
<div class="container">
    <pre>{{$errors}}</pre>
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="header text-center">
                <h2>{{ __('Register Now') }}</h2>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form">
                        <div class="mb-3" style="width:1400px;">
                            <label for="name" class="col-md-4 col-form-label">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form">
                        <div class="mb-3" style="width:1400px;">
                            <label for="email" class="col-md-4 col-form-label">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form">
                        <div class="mb-3" style="width:1400px;">
                            <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form">
                        <div class="mb-3" style="width:1400px;">
                            <label for="password-confirm" class="col-md-4 col-form-label">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                    </div>

                    <div class="form">
                        <div class="mb-3" style="width:1400px;">
                            <label for="bio" class="col-md-4 col-form-label">{{ __('Bio') }}</label>

                            <div class="col-md-6">
                                <input id="bio" type="bio" class="form-control" name="bio" required autocomplete="bio">
                            </div>
                        </div>
                    </div>

                    <div class="form">
                        <div class="mb-3" style="width:1400px;">
                            <label for="dob" class="col-md-4 col-form-label">{{ __('Date of Birth') }}</label>

                            <div class="col-md-6">
                                <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="dob">
                            </div>
                        </div>
                    </div>

                    <div class="form">
                        <div class="mb-3" style="width:1400px;">
                            <label for="location" class="col-md-4 col-form-label">{{ __('Location') }}</label>

                            <div class="col-md-6">
                                <input id="location" type="location" class="form-control" name="location" required autocomplete="location">
                            </div>
                        </div>
                    </div>

                    {{--
                        <div class="form_group">
                            <label for="gender">Gender</label>
                            <br>
                            <select name="gender_id">
                                @foreach ($genders as $gender)
                                <option value="{{ $gender->id }}" {{ (old('gender_id', $gender->title) == $profile->gender->title) ? "selected" : "" }}>{{ $gender->title }}</option>
                    @endforeach
                    </select>
            </div> --}}

            <div class="form">
                <div class="mb-3" style="width:1400px;">
                    <label for="gender" class="col-md-4 col-form-label">{{ __('Gender') }}</label>

                    <div class="col-md-6">
                        <input id="gender_id" type="gender" class="form-control" name="gender_id" required autocomplete="gender">
                    </div>
                </div>
            </div>

            <div class="form">
                <div class="mb-3" style="width:1400px;">
                    <label for="sign" class="col-md-4 col-form-label">{{ __('Sign') }}</label>

                    <div class="col-md-6">
                        <input id="sign_id" type="sign" class="form-control" name="sign_id" required autocomplete="sign">
                    </div>
                </div>
            </div>

            <div class="form">
                <div class="mb-3" style="width:1400px;">
                  <H5> Interested In:</h5>
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                <input type="checkbox" class="btn-check" id="sign_id" autocomplete="off">
                <label class="=" for="sign_id">Aries</label>
            </div>
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                <input type="checkbox" class="btn-check" id="sign_id" autocomplete="off">
                <label class="=" for="sign_id">Taurus</label>
            </div>
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                <input type="checkbox" class="btn-check" id="sign_id" autocomplete="off">
                <label class="=" for="sign_id">Gemini</label>
            </div>
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                <input type="checkbox" class="btn-check" id="sign_id" autocomplete="off">
                <label class="=" for="sign_id">Cancer</label>
            </div>
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                <input type="checkbox" class="btn-check" id="sign_id" autocomplete="off">
                <label class="=" for="sign_id">Leo</label>
            </div>
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                <input type="checkbox" class="btn-check" id="sign_id" autocomplete="off">
                <label class="=" for="sign_id">Virgo</label>
            </div>
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                <input type="checkbox" class="btn-check" id="sign_id" autocomplete="off">
                <label class="=" for="sign_id">Libra</label>
            </div>
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                <input type="checkbox" class="btn-check" id="sign_id" autocomplete="off">
                <label class="=" for="sign_id">Scorpio</label>
            </div>
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                <input type="checkbox" class="btn-check" id="sign_id" autocomplete="off">
                <label class="=" for="sign_id">Sagittarius</label>
            </div>
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                <input type="checkbox" class="btn-check" id="bsign_id" autocomplete="off">
                <label class="=" for="btncheck10">Capricorn</label>
            </div>
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                <input type="checkbox" class="btn-check" id="bsign_id" autocomplete="off">
                <label class="=" for="bsign_id">Aquarius</label>
            </div>
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                <input type="checkbox" class="btn-check" id="bsign_id" autocomplete="off">
                <label class="=" for="bsign_id">Pisces</label>
            </div>
</div>
</div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
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
