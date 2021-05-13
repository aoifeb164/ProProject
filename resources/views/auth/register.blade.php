@extends('layouts.app')

@section('content')
<div class="">
    {{-- <pre>{{$errors}}</pre> --}}
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="header" style="padding-left:15px;">
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
                                    <label for="password-confirm" class="col-md-4 col-form-label">{{ __('Confirm Password') }}</label>

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
                                        <input id="location" type="location" class="form-control" name="location" value="{{ old('location') }}" required autocomplete="location">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


            <div class="row">
                <div class="col" style="padding-left:30px;">
                    <div class="form_group">
                      <div class="mb-3" style="width:450px;">
                        <label for="sign">Signs</label>
                        <br>
                        <select name="sign_id" style="width:420px; height:38px; border-radius:6px; border-color:#d6d6d6">
                            @foreach ($signs as $sign)
                            <option value="{{ $sign->id }}" {{ (old('sign_id') == $sign->id) ? "selected" : "" }}>{{ $sign->title }}</option>
                            @endforeach
                        </select>
                    </div>
</div>
        </div>

        <div class="col" style="padding-left:30px;">

            <div class="form_group">
                <label for="gender">Gender</label>
                <br>
                <select name="gender_id" style="width:420px; height:38px; border-radius:6px; border-color:#d6d6d6">
                    @foreach ($genders as $gender)
                    <option value="{{ $gender->id }}" {{ (old('gender_id') == $gender->id) ? "selected" : "" }}>{{ $gender->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>

<div class="form">
    <div class="mb-3">
        <label for="bio" class="col-md-4 col-form-label">{{ __('Bio') }}</label>

        <div class="col">
            <textarea type="text" class="form-control" id="bio" rows="3" name="bio" style="width:960px;">{{ old('bio') }}</textarea>
        </div>
    </div>
</div>

<div class="form">
    <div class="mb-3">
        <H4 style="padding-left:20px; padding-top:10px; padding-bottom:10px"> Interested In:</h4>
        <H5 style="padding-left:20px"> Star Signs:</h5>
        @foreach ($signs as $sign)
        <div class="form-check form-check-inline" style="padding-left:20px; padding-bottom:5px;">
            <input class="form-check-input" name="signs[]" type="checkbox" id="sign_id_{{$sign->id}}" value="{{$sign->id}}">
            <label class="form-check-label" for="sign_id_{{$sign->id}}">{{$sign->title}}</label>
        </div>
        @endforeach
        @error('signs')
        <p class="text-danger">
            <strong>{{ $message }}</strong>
        </p>
        @enderror
    </div>

    <H5 style="padding-left:20px"> Genders:</h5>
      @foreach ($genders as $gender)
    <div class="form-check form-check-inline" style="padding-left:20px;">
        <input class="form-check-input" name="genders[]" type="checkbox" id="gender_id_{{$gender->id}}" value="{{$gender->id}}">
        <label class="form-check-label" for="gender_id_{{$gender->id}}">{{$gender->title}}</label>
    </div>
@endforeach
@error('genders')
<p class="text-danger">
    <strong>{{ $message }}</strong>
</p>
@enderror

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn" style="margin-top:20px; margin-left:560px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="40" fill="purple" class="bi bi-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                </svg>
            </button>
        </div>
    </div>
    </form>

</div>
</div>
</div>
</div>
@endsection
