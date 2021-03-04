@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <p id="alert-message" class="alert collapse"></p>

            <div class="card">
                {{-- <div class="card-header">
              messages

        </div> --}}

                {{-- if there are no profiles display the following message --}}
                <div class="card-body">
                    @if (count($messages)=== 0)
                    <p>There are no Messages!</p>
                    @else
                    <table id="table-messages" class="table table-hover">

                        <tbody>
                            @foreach ($messages as $message)
                            {{-- get profiles by id and display the following information --}}
                            <tr data-id="{{ $message->id }}">
                                <td>{{ $message->message }}</td>
                                <td>{{ $message->sender_id}}</td>
                                {{-- <td><p >{{ $messages->sender->user->name }}</p>
  </td> --}}
                                <td>
                                    {{-- creating a view, edit and delete button --}}
                                    {{-- <a href="{{ route('user.messages.show') }}" class="btn btn-primary">View message</a> --}}

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
