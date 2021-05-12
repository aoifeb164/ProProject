@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="padding: 0px; padding-left:120px">

            <div class="header" style="padding-left:35px;">
                <h2 style=" padding-top:60px;">{{ __('Welcome') }}</h2>
                <h2>{{ __('Back') }}</h2>
            </div>

            <div class="card-body" style="padding-bottom:0px; padding-right:0px;">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form">
                        <div class="mb-3">
                            <label for="email" class="col-md-4 col-form-label">{{ __('Email Address') }}</label>

                            <div class="col-md-10">
                                <input id="email" type="email" placeholder="name@example.com" class="form-control
                                @error('email') is-invalid
                                @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form">
                        <div class="mb-3">
                            <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>

                            <div class="col-md-10">
                                <input id="password" type="password" placeholder="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                
    <div class="col-md-10 text-right">
        @if (Route::has('password.request'))
        <a class="btn btn-link" style="color:#35144f;" href="{{ route('password.request') }}">
            {{ __('Forgot Password?') }}
        </a>
        @endif
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-9 text-right" style="margin-bottom:0px;">
            <button type="submit" class="btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="40" fill="purple" class="bi bi-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                </svg>
            </button>
        </div>
    </div>
    </form>
</div>

</div>
<div class="col-md-2" style="padding: 0px">
    <img src="/images/home/image.PNG" height="300" width="420" style="margin-top:370px;">
</div>
</div>
</div>
@endsection
