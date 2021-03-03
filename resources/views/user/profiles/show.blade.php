@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            {{-- <div class="card-header">{{ __('Dashboard') }}
        </div> --}}

<div class="card" style="height:600px; width:800px; margin-top:20px; padding-top:20px;">
        <div class="card-body">
            {{-- <td>{{ $profile->photo->filename }}</td> --}}
            <div class="text-center">
                <img src="{{url ('/'. $profile->photo->filename)}}" style="width:260px; height:260px; border-radius:125px; border: 2px solid #2e164f;" />
            </div>


            <div class="text-center">
                <td>
                    <h4 style="padding-top:40px;">{{ $profile->user->name }}</h4>
                </td>
            </div>

            <div class="row text-center" style="padding-top:20px; padding-bottom:20px;">
                <div class="col-sm">
                    <p>{{ $profile->sign->title }}</p>
                </div>
                <div class="col-sm">
                    <p>{{ $profile->dob }}</p>
                </div>
                <div class="col-sm">
                    <p>{{ $profile->location }}</p>
                </div>
            </div>
            <div class="row" style="width:750px;">

                    <p style="padding-left:60px;">{{ $profile->bio }}</p>

            </div>
        </div>
</div>
    </div>
</div>
</div>
@endsection
