@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <p id="alert-message" class="alert collapse"></p>


            {{-- <div class="card-header">
              messages

        </div> --}}

            {{-- if there are no profiles display the following message --}}

            @if (count($messages)=== 0)
            <p>There are no Messages!</p>
            @else

            {{-- <table id="table-messages" class="table table-hover"> --}}

            {{-- <tbody> --}}
            @foreach ($messages as $message)
            {{-- get profiles by id and display the following information --}}
            <div class="card" style="width:600px;">
            <div class="row">
                <div class="name" style="padding-left:20px; padding-top: 20px; font-weight:bold;">
                    {{ \App\Models\Profile::findOrFail($message->sender_id)->user->name }}
                </div>
            </div><br>
            <div data-id="{{ $message->id }}"></div>
            <div class="row" style="padding-left:20px; padding-bottom: 20px; width:600px;">
                {{ $message->message }}
            </div>
          </div>
<br>
            {{-- <td><p >{{ $messages->sender->user->name }}</p>
            </td> --}}
            {{-- </tr> --}}
  <div class="card" style="width:680px; margin-left:420px;">
            <div class="row">
                <div class="name" style="padding-left:20px; padding-top: 20px; font-weight:bold;">
                    {{ \App\Models\Profile::findOrFail($message->conversation->recipient_id)->user->name }}
                </div>
            </div> <br>
            <div data-id="{{ $message->id }}"></div>
            <div class="row" style="padding-bottom: 20px; margin-left:5px; width:600px;">
                {{ $message->message }}
            </div>
</div>
<br>
            {{-- </td> --}}
            {{-- <td><p >{{ $messages->sender->user->name }}</p>
            </td> --}}
            {{-- </tr> --}}

            @endforeach
            {{--
                        </tbody>
                    </table> --}}

            @endif


        </div>
    </div>
</div>
@endsection
