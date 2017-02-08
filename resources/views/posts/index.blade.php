@extends('main')

@section('title', '| All Posts')

@section('content')

	<div class="row">
		<div class="col-md-10">
			<h1>Posts</h1>
		</div>


		<div class="col-md-2">
			<a href="{{ route('posts.create') }}" class="btn btn-lg btn block btn-primary btn-h1-spacing">Create New Post</a>
		</div>

		<div class="col-md-12">
			<hr>
		</div>

		<hr>
	</div>  <!-- end of row -->
 
	<div class="row">
		
		<div class="col-md-12">
			
			<table class="table">
				<thead>
					<th>#</th>
					<th>Title</th>
					<th>Body</th>
					<th>Crée le:</th>
					<th></th>
				</thead>

				<tbody>
					@foreach ($posts as $post)
						
						<tr>
							
							<th>{{ $post->id }}</th>
							<td>{{ $post->title }}</td>
							<td>{{ substr($post->body, 0, 250) }}{{ strlen($post->body) > 250 ? "..." : ""  }}</td>
							<td>{{ date('M j, Y', strtotime($post->created_at)) }}</td>
							<td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-sm">View</a> <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-default btn-sm">Edit </a> </td>
						</tr>


					@endforeach
				</tbody>
			</table>

		<div class="text-center">
			
             {!! $posts->render(); !!}  <!-- Je crée une pagination en bas de page -->

		</div>


		</div>
	</div>





@stop