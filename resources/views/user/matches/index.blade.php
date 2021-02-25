@extends('layouts.user')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">

      <p id="alert-message" class="alert collapse"></p>

      <div class="card">
        <div class="card-header">
            {{-- profiles index --}}
          Matches
          {{-- <a href="{{ route('admin.profiles.create') }}" class="btn btn-primary float-right">Add</a> --}}
        </div>

        {{-- if there are no profiles display the following message --}}
        <div class="card-body">
          @if (count($profiles)=== 0)
            <p>There are no Matches!</p>
          @else
            <table id ="table-profiles" class="table table-hover">

            <tbody>
          @foreach ($profiles as $profile)
              {{-- get profiles by id and display the following information --}}
            <tr data-id="{{ $profile->id }}">
              <td>{{ $profile->user->name }}</td>
              <td>{{ $profile->dob }}</td>
              <td>{{ $profile->location }}</td>
              <td>{{ $profile->sign->title}}</td>
              <td>
                  {{-- creating a view, edit and delete button --}}
                <a href="{{ route('user.profiles.show', $profile->id) }}" class="btn btn-primary">View Profile</a>
                  <a href="{{ route('user.conversations.create') }}" class="btn btn-primary">Message</a>
                  <form style="display:inline-block" method="POST" action="{{ route('user.matches.destroy', $profile->id ) }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="form-control btn btn-danger">Unmatch</a>
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
