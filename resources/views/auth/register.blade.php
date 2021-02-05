@extends('layouts.app')

@section('content')
<div class="container">
  <pre>{{$errors}}</pre>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                              <label for="bio" class="col-md-4 col-form-label text-md-right">{{ __('Bio') }}</label>

                              <div class="col-md-6">
                                  <input id="bio" type="bio" class="form-control" name="bio" required autocomplete="bio">
                              </div>
                          </div>

                        <div class="form-group row">
                            <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>

                            <div class="col-md-6">
                                <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="dob">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Location') }}</label>

                            <div class="col-md-6">
                                <input id="location" type="location" class="form-control" name="location" required autocomplete="location">
                            </div>
                        </div>

                        {{-- <div class="form_group">
                         <label for="gender">Gender</label>
                         <br>
                     <select name="gender_id">
                       @foreach ($genders as $gender)
                         <option value ="{{ $gender->id }}" {{ (old('gender_id') == $gender->id) ? "selected" : "" }} >{{ $gender->title }}</option>
                        @endforeach
                       </select>
                       </div> --}}

                       <div class="form-group row">
                           <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                           <div class="col-md-6">
                               <input id="gender_id" type="gender" class="form-control" name="gender_id" required autocomplete="gender">
                           </div>
                       </div>

                        <div class="form-group row">
                            <label for="sign" class="col-md-4 col-form-label text-md-right">{{ __('Sign') }}</label>

                            <div class="col-md-6">
                                <input id="sign_id" type="sign" class="form-control" name="sign_id" required autocomplete="sign">
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
</div>
@endsection
