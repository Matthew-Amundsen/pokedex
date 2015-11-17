@extends('layouts.master')

@section('content')
	<div class="jumbotron">
		<div class="container content-container">
			{!! Form::open(['route' => ['pokemon.comments.update', $pokemon->id, $comment->id], 'class' => 'form-horizontal', 'method' => 'PUT']) !!}
				{!! Form::label('Comment:') !!}
				{!! Form::textarea('comment', $comment->comment, ['class' => 'form-control']) !!}
				{!! Form::submit('Edit Comment', ['class' => 'btn btn-primary form-control']) !!}
			{!! Form::close() !!}
			
			{!! Form::open(['route' => ['pokemon.comments.destroy', $pokemon->id, $comment->id], 'method' => 'delete']) !!}
				{!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
			{!! Form::close() !!}
		</div>
	</div>
@endsection