@extends('layouts.master')

@section('content')

	<!-- Main jumbotron for a primary marketing message or call to action -->
	<div class="jumbotron">
	  <div class="container">
		<h1>Pokemon</h1>
		<h2>{{ $pokemon->name }}</h2>
		@foreach ($comments as $comment)
			<p>{{ $comment->comment }}</p>
		@endforeach
	  </div>
	</div>

	<h4>Comment on {{ $pokemon->name }}</h4>
	<form>
		<label for="comment">Comment</label>
		<textarea id="comment"name="comment"></textarea>
		<button>Add Comment</button>
	</form>

@endsection