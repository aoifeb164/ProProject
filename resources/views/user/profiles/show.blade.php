@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header">{{ __('Dashboard') }}
            </div> --}}

            <div class="card-body">

                <table class="table table-hover">

                    <tr>
                        {{-- <td>{{ $profile->photo->filename }}</td> --}}
                        <div class="text-center">
                        <img src="{{url ('/'. $profile->photo->filename)}}" />
                        <div>
                    </tr>
                    <tr>
                      <div class="text-center">
                        <td>{{ $profile->user->name }}</p></td>
                      </div>
                    </tr>
                    <tr>
                      <div class="position-absolute top-0 start-0">
                        <td>{{ $profile->sign->title }}</td>
                      </div>
                       <div class="position-absolute top-0 start-50 translate-middle-x"></div>
                        <td>{{ $profile->dob }}</td>
                      </div>
                        <div class="position-absolute top-0 end-0"></div>
                        <td>{{ $profile->location }}</td>
                      </div>
                    </tr>
                    <tr>
                        <td>{{ $profile->bio }}</td>
                    </tr>

                </table>

            </div>
        </div>
    </div>
</div>
@endsection
