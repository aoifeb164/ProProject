@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header">{{ __('Dashboard') }}</div> --}}

                <div class="card-body">
                    <table class="table table-hover">

                            <tr>
                                <td>{{ $messages->message }}</td>
                            </tr>


                    </table>

            </div>
        </div>
    </div>
</div>
@endsection
