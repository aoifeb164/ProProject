@extends('layouts.user')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">

      <p id="alert-message" class="alert collapse"></p>

      <div class="card">
        <div class="card-header">
              Conversations

        </div>

        {{-- if there are no profiles display the following message --}}
        <div class="card-body">
          @if (count($conversations)=== 0)
            <p>There are no Messages!</p>
          @else
            <table id ="table-messages" class="table table-hover">

            <tbody>
          @foreach ($conversations as $conversation)
              {{-- get profiles by id and display the following information --}}
            <tr data-id="{{ $conversation->id }}">
              <td>{{ $conversation->title }}</td>
              <td>{{ $conversation->sender->user->name }}</td>
              <td>
                  {{-- creating a view, edit and delete button --}}
                <a href="{{ route('user.messages.index') }}" class="btn btn-primary">View Conversation</a>

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
