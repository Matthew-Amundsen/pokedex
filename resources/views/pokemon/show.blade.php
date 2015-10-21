@extends('layouts.master')

@section('content')

	<!-- Main jumbotron for a primary marketing message or call to action -->
	<div class="jumbotron">
	  <div class="container">
		<h1>Pokemon</h1>
		<h2>{{ $pokemon->name }}</h2>
		<img src="images\pokemon\00{{ $pokemon->id }}.png">
		@foreach ($comments as $comment)
			<p>{{ $comment->comment }}</p>
		@endforeach
	  </div>
	</div>

	<h4>Comment on {{ $pokemon->name }}</h4>
	
	<form method="POST" action="./?page=comment.create" class="form-horizontal" enctype="multipart/form-data">
		<input type="hidden" name="pokemon_id" value="<?= $pokemon->id ?>">

		<div class="form-group">
			<label for="comment" class="col-sm-4 col-md-2 control-label">Comment</label>
			<div class="col-sm-8 col-md-10">
				<textarea id="comment" class="form-control" name="comment" rows="5"></textarea>
				<div class="help-block"></div>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-4 col-sm-10 col-md-offset-2 col-md-10">
				<button class="btn btn-default">
					<span class="glyphicon glyphicon-comment"></span> Add Comment
				</button>
			</div>
		</div>

	</form>

@endsection