@extends('layouts.app')

@section('content')
<h1>Manage Users</h1>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif

@if(auth()->check() && auth()->user()->hasRole('admin'))

<table class="table table-hover">

    <thead>

      <th>Username</th>
      <th>Role</th>
      <th>Email</th>
      <th>Edit</th>
      <th>Delete</th>
      
      
    </thead>

    <tbody>
@foreach ($users as $user)

<tr>

<td> {{ $user->name }} </th>
<td>{{ $user->roles->first()['name'] }}</th>
<td>{{ $user->email }}</th>
<td>
<a class="btn btn-primary" href="/users/{{ $user->id }}">Edit</a>
</td>
<td>
@if(auth()->user()->id != $user->id)
<a class="btn btn-primary" href="/destroy/{{ $user->id }}">Delete</a>
@endif
</td>

</tr>

@endforeach

    </tbody>

</table>


@else
	Access Denied
@endif

@endsection
