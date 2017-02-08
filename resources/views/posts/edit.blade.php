@extends('main')

@section('title', '| Edit Blog Post')

@section('content')

<div class="row">

    <?php

	echo Form::model($post, ['route' => ['posts.update', $post->id], 'method' =>'PUT']) 

	?>

	<div class="col-md-8">
	
	<?php

	echo Form::label('title', 'Title:');

	echo Form::text('title', null, ['class' => 'form-control input-lg']);

	echo Form::label('slug', 'Slug:',['class' => 'form-spacing-top']);
	echo Form::text('slug', null, ['class' => 'form-control']);


	echo Form::label('body', 'Body', ['class' => 'form-spacing-top']);

    echo Form::textarea('body', null, ['class' => 'form-control']); 

    ?>

	</div>


	<div class="col-md-4">
	  <div class="well">
		 	<dl class="dl_horizontal">
		       <dt>Crée le: </dt>
		       <dd>{{ date( 'M j,Y H:i', strtotime($post->created_at)) }}</dd>
		    </dl>

		    <dl class="dl_horizontal">
		       <dt>Mis à jour le: </dt>
		       <dd>{{ date( 'M j,Y H:i', strtotime($post->updated_at)) }}</dd>
		    </dl>

		    <hr>
		 <div class="row">
		  	<div class="col-sm-6">
		  	{!! Html::linkRoute('posts.show', 'Annuler', array($post->id), array('class'=> 'btn btn-danger btn-block')) !!}
		  	</div>

		  	<div class="col-sm-6">
		  	
		
		  	<?php 

		  		echo Form::submit('Sauvegarder', ['class' => 'btn btn-success btn-block']); 
		  	?>



		  	
		  	</div>
		 </div>


	 </div>
  </div>

  <?php
  echo Form::close();

  ?>


</div>

@endsection