@extends('layouts.master')

@section('content')
	<div class="jumbotron">
		<div class="container content-container">
			{!! Form::open(['route' => ['pokemon.comments.update', $pokemon->id, $comment->id], 'class' => 'form-horizontal', 'method' => 'PUT']) !!}
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