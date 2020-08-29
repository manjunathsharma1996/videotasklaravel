@extends('layouts.app')

@section('content')





<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a class="btn btn-primary" href="/videos">Watch Videos</a>
		    @if(auth()->check() && auth()->user()->hasRole('admin'))
    			  <a class="btn btn-primary" href="/users">Manage Users</a>
			@endif
		    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
