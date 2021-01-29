@extends('layouts.nav')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">

      <p id="alert-message" class="alert collapse"></p>

      <div class="card">
        <div class="card-header">
            {{-- profiles index --}}
          Profiles
          {{-- <a href="{{ route('admin.profiles.create') }}" class="btn btn-primary float-right">Add</a> --}}
        </div>

        {{-- if there are no profiles display the following message --}}
        <div class="card-body">
          @if (count($profiles)=== 0)
            <p>There are no profiles!</p>
          @else
            <table id ="table-profiles" class="table table-hover">
              <thead>
                {{-- table headings --}}
                <th>Name</th>
                <th>Email</th>
                <th>D.O.B</th>
                <th>Gender</th>
                <th>Sign</th>
            </thead>

            <tbody>
          @foreach ($profiles as $profile)
              {{-- get profiles by id and display the following information --}}
            <tr data-id="{{ $profile->id }}">
              <td>{{ $profile->user->name }}</td>
              <td>{{ $profile->user->email }}</td>
              <td>{{ $profile->dob }}</td>
              <td>{{ $profile->gender->title }}</td>
              <td>{{ $profile->sign->title}}</td>
              <td>
                  {{-- creating a view, edit and delete button --}}
                <a href="{{ route('admin.profiles.show', $profile->id) }}" class="btn btn-primary">View</a>
                {{-- <a href="{{ route('admin.profiles.edit', $profile->id) }}" class="btn btn-warning">Edit</a> --}}
                <form style="display:inline-block" method="POST" action="">
                  <input type="hidden" name="_method" value="DELETE">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="button" class="form-control btn btn-danger">Delete</a>
                      </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      @endif
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
