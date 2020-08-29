@extends('layouts.app')

@section('content')
@if(auth()->check() && auth()->user()->hasRole('manager'))


<table class="table table-hover">

    <thead>

      <th>Username</th>
      <th>Role</th>
      <th>Edit</th>
      
      
    </thead>

    <tbody>
@foreach($users as $user)

        <tr>

          <td>{{$user->name}} </td>

          <td> {{ $user->roles->first()['name'] }} </td>

          <td> Edit </td>

	 
        </tr>
@endforeach

    </tbody>

</table>

@else
     You don't have access to manage users
@endif

@endsection
