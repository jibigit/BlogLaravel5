

@extends('main')

@section('title', '| View Post')


@section('content')




<div class="row">
	<div class="col-md-8">

			<h1>{{ $post->title }}</h1>

			<p class="lead">{{ $post->body }}</p>
	</div>


	<div class="col-md-4">
	  <div class="well">

	  		<dl class="dl_horizontal">
	  			<label>Url: </label>
		       <p><a href="{{ route('blog.single', $post->slug) }}"></dt>{{ route('blog.single', $post->slug) }}</a></p>
		    </dl>

		 	<dl class="dl_horizontal">
		       <label>Crée le: </label>
		       <p>{{ date( 'M j,Y H:i', strtotime($post->created_at)) }}</p>
		    </dl>

		    <dl class="dl_horizontal">
		       <label>Mis à jour le: </label>
		       <p>{{ date( 'M j,Y H:i', strtotime($post->updated_at)) }}</p>
		    </dl>

		    <hr>
		 <div class="row">
		  	<div class="col-sm-6">
		  	{!! Html::linkRoute('posts.edit', 'Editer', array($post->id), array('class'=> 'btn btn-primary btn-block')) !!}
		  	</div>

		  	<div class="col-sm-6">

		  	{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
		  	
		  	{!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block']) !!}

			{!! Form::close() !!}
		  	</div>
		 </div>

		 <div class="row">
		 	<div class="col-md-12">
		 		{!! Html::linkRoute('posts.index', 'Voir tous les posts', [], ['class' => 'btn btn-default btn-block btn-h1-spacing']) !!}
		 	</div>
		 	

		 </div>


	 </div>
  </div>
</div>







@endsection