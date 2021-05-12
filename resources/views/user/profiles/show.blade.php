@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        <div class="card" style=" width:800px; margin-top:20px; padding-top:20px;">
            <div class="card-body">

                <div class="text-center">
                    <img src="{{url ('/'. $profile->photo->filename)}}" style="width:200px; height:240px; border-radius:125px;" />
                </div>


                <div class="text-center">
                    <td>
                        <h3 style="padding-top:40px;">{{ $profile->user->name }}</h3>
                    </td>
                </div>

                <div class="row text-center" style="padding-top:20px; padding-bottom:20px;">
                    <div class="col-md">
                        <h5>{{ $profile->sign->title }}</h5>
                    </div>
                    <div class="col-md">
                        <h5>{{ $profile->dob }}</h5>
                    </div>
                    <div class="col-md">
                        <h5>{{ $profile->gender->title }}</h5>
                    </div>
                    <div class="col-md">
                        <h5>{{ $profile->location }}</h5>
                    </div>
                </div>
                <div class="row" style="width:750px;">

                    <p style="padding-left:60px;">{{ $profile->bio }}</p>

                </div>

                <div class="row" style="width:750px;">

                    <div class="bd-example">


                        <div>

                            <div class="row">
                                <h5 style="padding-left:75px; padding-top: 20px;">Photos:</h5>
                            </div>
                            <div class="row">
                                <div class="col" style="padding-left:80px; padding-right:30px">

                                    <img src="{{url ('/'. $profile->photo->filename)}}" style="margin-top:30px; " a class="rounded mx-auto d-block" height="150" width="120">


                                </div>


                                <div class="col" style="padding-left:30px; padding-right:30px">

                                    <img src="{{url ('/'. $profile->photo->filename)}}" style="margin-top:30px;" a class="rounded mx-auto d-block" height="150" width="120">

                                </div>



                                <div class="col" style="padding-left:30px; padding-right:30px">

                                    <img src="{{url ('/'. $profile->photo->filename)}}" style="margin-top:30px;" a class="rounded mx-auto d-block" height="150" width="120">


                                </div>

                                <div class="col" style="padding-left:30px; padding-right:30px">

                                    <img src="{{url ('/'. $profile->photo->filename)}}" style="margin-top:30px;" a class="rounded mx-auto d-block" height="150" width="120">


                                </div>
                            </div>


                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
