@extends('layouts.master')

@section('content')

	<!-- Main jumbotron for a primary marketing message or call to action -->
	<div class="jumbotron">
	  <div class="container">
		<h1>Pokemon</h1>
		<h2>{{ $pokemon->name }}</h2>
		<img src="..\images\pokemon\00{{ $pokemon->id }}.png">
		@foreach ($comments as $comment)
			<p>
				{{ $comment->comment }} - Posted by: {{ $comment->user->name }} 
				<a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-warning">Edit Comment</a>

				{!! Form::open(['action' => ['CommentsController@destroy', $comment->id], 'method' => 'delete']) !!}
					{!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
				{!! Form::close() !!}
			</p>
		@endforeach
	  </div>
	</div>

	<div class="container">
		<h4>Comment on {{ $pokemon->name }}</h4>
		
		{!! Form::open(['route' => ['comments.store', $pokemon->id], 'class' => 'form-horizontal', 'method' => 'POST']) !!}
			<div class="form-group">
				
				{!! Form::label('Comment:') !!}
				{!! Form::textarea('comment', $newComment->comment, ['class' => 'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::submit('Add Comment', ['class' => 'btn btn-primary form-control']) !!}
			</div>
		{!! Form::close() !!}
	</div>

@endsection