@extends('layouts.master')

@section('content')
	<div class="jumbotron">
		<div class="container">
			{!! Form::open(['route' => ['comments.update'], 'class' => 'form-horizontal', 'method' => 'POST']) !!}
				<div class="form-group">
					
					{!! Form::label('Comment:') !!}
					{!! Form::textarea('comment', $comment->comment, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::submit('Edit Comment', ['class' => 'btn btn-primary form-control']) !!}
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection