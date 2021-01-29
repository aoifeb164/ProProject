@extends('layouts.nav')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                  {{-- getting profile name to be displayed --}}
                    User: {{$profile->user->name}}
                </div>

                <div class="card-body">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td>Name</td>
                                <td>{{ $profile->user->name }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{ $profile->user->email }}</td>
                            </tr>
                            <tr>
                                <td>D.O.B</td>
                                <td>{{ $profile->dob }}</td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td>{{ $profile->gender->title }}</td>
                            </tr>
                            <tr>
                                <td>Sign</td>
                                <td>{{ $profile->sign->title }}</td>
                            </tr>
                        </tbody>
                    </table>

                      {{-- creating back, edit and delete button --}}
                    <a href="{{ route('admin.profiles.index') }}" class="btn btn-default">Back</a>
                    {{-- <a href="{{ route('admin.profiles.edit', $profile->id) }}" class="btn btn-warning">Edit</a> --}}
                    <form style="display:inline-block" method="POST" action="">
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <button type="button" class="form-control btn btn-danger">Delete</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
