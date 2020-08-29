@extends('layouts.app')

@section('content')
<h1>Edit Video</h1>
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
    'url' => 'videos/'.$video->id, 'method' => 'post', 'files' => true
]) !!}
{{ csrf_field() }}


<div class="form-group">
    {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
    {!! Form::text('name', $video->name, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
    {!! Form::textarea('description', $video->description, ['class' => 'form-control']) !!}
</div>
<div class="row">
	<div class="col-sm-4">
	<img style="width:300px;" src= "{{ Storage::url($video->image)  }}"/>
	</div>
	<div class="col-sm-8">
	<div class="form-group">
	    {!! Form::label('image', 'Change Image :', ['class' => 'control-label']) !!}
	    {!! Form::file('image') !!}
	</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-4">
	<img style="width:300px;" src= "{{ Storage::url($video->watermark)  }}"/>
	</div>
	<div class="col-sm-8">
	<div class="form-group">
	    {!! Form::label('watermark', 'Change Watermark Image :', ['class' => 'control-label']) !!}
            {!! Form::file('watermark') !!}
	</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-4">
	<video width="320" height="240" controls poster="{{ Storage::url($video->image)  }}">
        <source src="{{ Storage::url($video->video)  }}" type="video/mp4">
        </video>
	</div>
	<div class="col-sm-8">
	<div class="form-group">
	    {!! Form::label('video', 'Change Video :', ['class' => 'control-label']) !!}
            {!! Form::file('video') !!}
	</div>
	</div>
</div>

{!! Form::submit('Update', ['class' => 'btn btn-primary text-center']) !!}
<a href="/videos" class="btn btn-primary">Back </a>
{!! Form::close() !!}
@else
     You can't add video
@endif

@endsection

