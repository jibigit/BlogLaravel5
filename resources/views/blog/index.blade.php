@extends('main')

@section('title', '|Blog')

@section('content')
  
  <div class="row">
      <div class="col-md-12">
       <h1>Blog</h1>
     </div>
  </div>
	@foreach ($posts as $post)
  <div class="row">
  	<div class="col-md-8 ol-md-offset-2">
  		<h2>{{ $post->title }}</h2>
  		<h5>Published: {{ date('M j, Y', strtotime($post->created_at)) }}</h5>

  		<p>{{ $post->body }}</p>

  		<a href="{{ route('blog.single,')  }}">read more</a>
  	</div>

  </div>
  @endforeach

@endsection