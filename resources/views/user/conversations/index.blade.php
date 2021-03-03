@extends('layouts.user')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">

      <p id="alert-message" class="alert collapse"></p>


        <div class="header">
          <div class="text-center">
            <h3><u>Conversations</u></h3>
        </div>

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
              <td><h5 style="padding-left:80px">{{ $conversation->title }}</h5></td>
              <td><p style="padding-left:140px">{{ $conversation->sender->user->name }}</p></td>
              <td>
                  {{-- creating a view, edit and delete button --}}
                <a href="{{ route('user.messages.index') }}" class="btn btn-primary" style="margin-left:140px">View Conversation</a>

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
@endsection
