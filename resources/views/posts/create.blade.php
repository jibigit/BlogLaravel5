@extends('main')

@section('title', '| Create New Post')

@section('stylesheets')


 {!! Html::style('css/parsley.css') !!}

@endsection

@section('content')

	<div class='row'>
		<div class="col-md-8 col-md-offset-2">
		<h1>Nouvel article</h1>
		<hr>
<?php

		echo Form::open(array('route' => 'posts.store','data-parsley-validate' => '')) ;
			echo Form::label('title','Titre:');
			echo Form::text('title',null, array('class' => 'form-control','required' => '','maxlength' => '255'));

			echo Form::label('slug','Slug');
			echo Form::text('slug', null, array('class' => 'form-control','required' => '','minlength' => '5', 'maxlength' => '255'));

			echo Form::label('body',"Votre message:");
			echo Form::Textarea('body',null, array('class' => 'form-control','required' => '')) ;
			echo Form::submit('Créer post', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px'));

	echo Form::close();
		
?>



		</div>
	</div>

@endsection

@section('scripts')

{!! Html::script('js/parsley.min.js')!!}

@endsection

