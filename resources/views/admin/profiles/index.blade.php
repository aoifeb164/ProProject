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

                    <form action="/search" method="POST" role="search">
                        {{-- {{ csrf_field() }} --}}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" name="q" placeholder="Search users" value={{ isset($q) ? $q : ""}}> <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                    <span class="glyphicon glyphicon-search btn btn-primary ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                        </svg>
                                    </span>
                                </button>
                            </span>
                        </div>
                        <div class="form_group mb-2">
                            <label for="gender">Gender</label>
                            <br>

                            <select name="gender_id">
                                {{-- <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $profile->user->name) }}" /> --}}
                                <option value="0"> Choose a gender</option>
                                @foreach ($genders as $gender)

                                  <option value="{{ $gender->id }}" {{ ($request->input('gender_id') == $gender->id) ? "selected" : "" }}>{{ $gender->title }}</option>

                                @endforeach
                            </select>
                        </div>

                        <div class="form_group mb-2">
                            <label for="sign">Sign</label>
                            <br>
                            <select name="sign_id">
                              <option value="0"> Choose a sign</option>
                                @foreach ($signs as $sign)
                                <option value="{{ $sign->id }}" {{ ($request->input('sign_id') == $sign->id) ? "selected" : "" }}>{{ $sign->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>

                    {{-- <p> The Search results for your query <b> {{ $query }} </b> are :</p> --}}

                    @if (count($profiles)=== 0)
                    <p>There are no profiles!</p>
                    @else
                    <table id="table-profiles" class="table table-hover">
                        <thead>
                            {{-- table headings --}}
                            <th>Name</th>
                            <th>Email</th>
                            <th>D.O.B</th>
                            <th>Gender</th>
                            <th>Sign</th>
                            <th>Actions</th>
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
                                    <a href="{{ route('admin.profiles.edit', $profile->id) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('admin.profiles.destroy', $profile->id) }}" class="btn btn-danger">Delete</a>

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
