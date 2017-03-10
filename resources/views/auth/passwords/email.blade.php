@extends ('main')

@section('title', '|Forgot my password')

@section('content')


	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-defaut">
				<div class="panel-heading">Reset Password</div>
					<div class="panel-body">
						{!! Form::open(['url' => 'password/email', 'method' => "POST"]) !!}

						<?php
						echo Form::label('email', 'Email Adress:');

						echo Form::email('email', null, ['class' => 'form-control']);

						echo Form::submit('Reset Password', ['class' => 'btn btn-primary']);

						echo Form::close();
						?>
						
					</div>
				</div>
			</div>
		</div>	
	</div>

	@endsection