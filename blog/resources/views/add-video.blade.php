@extends('layouts.app')

@section('content')
<h1>Add Video</h1>
@if(auth()->check() && auth()->user()->hasRole('admin'))
      


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

{!! Form::open([
    'url' => 'create-video', 'method' => 'post', 'files' => true
]) !!}

<div class="form-group">
    {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
    {!! Form::text('title', null, ['class' => 'form-control','required']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control','required']) !!}
</div>

<div class="form-group">
    {!! Form::label('image', 'Image :', ['class' => 'control-label']) !!}
    {!! Form::file('image',['required']) !!}
</div>

<div class="form-group">
    {!! Form::label('watermark', 'Watermark Image :', ['class' => 'control-label']) !!}
    {!! Form::file('watermark',['required']) !!}
</div>

<div class="form-group">
    {!! Form::label('video', 'Video :', ['class' => 'control-label']) !!}
    {!! Form::file('video',['required']) !!}
</div>

{!! Form::submit('Create New Video', ['class' => 'btn btn-primary text-center']) !!}
<a href="/videos" class="btn btn-primary">Back </a>
{!! Form::close() !!}
@else
     You can't add video
@endif

@endsection

