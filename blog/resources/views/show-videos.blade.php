@extends('layouts.app')

@section('content')
<h1>Watch Videos</h1>
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


      <div class="text-right">
@if(auth()->check() && auth()->user()->hasRole('admin'))
<a class="btn btn-primary" href="add-video">Upload Video</a>
@endif
<a class="btn btn-primary" href="/home">Back</a>
</div>

<div class="row">
@if($videos->isEmpty())
<div class="text-center">No videos</div>
@endif
@foreach ($videos as $v)
<div class="col-sm-3 each-video text-center">
<div class="video-wrapper">
<img style="height: 60px;
    width: 60px;
    box-shadow: 2px 2px 2px black;
    position: absolute;
    left: 20px;
    top: 4px;
    object-fit: cover;
    object-position: center top;" src="{{ Storage::url($v->watermark)  }}"/>
<video width="320" height="240" controls poster="{{ Storage::url($v->image)  }}">
  <source src="{{ Storage::url($v->video)  }}" type="video/mp4">
</video>
</div>
<p style="font-weight: 900;font-size: 25px;">{{ $v->name }}</p>
<p><i>{{ $v->description }}</i></p>
@if(auth()->check() && auth()->user()->hasRole('admin'))
      <a class="btn btn-primary" href="/videos/{{ $v->id }}/edit">Edit</a>
      <a class="btn btn-primary" href="/delvideo/{{ $v->id }}">Delete</a>
@endif
</div>
@endforeach

</div>
@endsection
