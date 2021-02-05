@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header">{{ __('Dashboard') }}</div> --}}

                <div class="card-body">
                    <table class="table table-hover">

                          <tr>
                              {{-- <td>{{ $profile->photo->filename }}</td> --}}
                              <img src="{{url ('/'. $profile->photo->filename)}}"/>
                          </tr>
                            <tr>
                                <td>{{ $profile->user->name }}</td>
                            </tr>
                            <tr>
                                <td>{{ $profile->sign->title }}</td>
                                <td>{{ $profile->dob }}</td>
                                <td>{{ $profile->location }}</td>
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
