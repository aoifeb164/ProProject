@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    This is the welcome page! TEST
                    </br>
                    </br>
                    Read more <a href="{{ route('about') }}">about us</a>
                </div>

                <form action="/search" method="POST" role="search">
                    {{-- {{ csrf_field() }} --}}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" placeholder="Search users"> <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                </form>
                <div class="container">
                    @if(isset($profiles))
                    <p> The Search results for your query <b> {{ $query }} </b> are :</p>
                    <h2>User Details:</h2>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Sign</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($profiles as $profile)
                            <tr>
                                <td>{{$profile->user->name}}</td>
                                <td>{{$profile->user->email}}</td>
                                <td>{{$profile->gender->title}}</td>
                                <td>{{$profile->sign->title}}</td>
                                <td><a href="{{ route('admin.profiles.show', $user->id) }}" class="btn btn-primary">View</a> </td>
                              </tr>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                    @elseif(isset($message))
                    <p>{{ $message }}</p>
                    @endif
                </div>

            </div>
        </div>
    </div>
    @endsection
