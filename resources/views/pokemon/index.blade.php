@extends('layouts.master')

@section('content')

	<!-- Main jumbotron for a primary marketing message or call to action -->

	<div class="container content-container">
		<div class="row">
			@foreach($pokemon as $pokemon)
				<a href="{{ route('pokemon.show', $pokemon->id) }}">
				<div class="col-sm-6 col-md-4 pokemon-index">
					<img src="..\images\pokemon\{{ $pokemon->id }}.png" width="270">
					<div class="pokemon-number"><p>{{ $pokemon->id}}</p></div><div class="pokemon-name"><p>{{ $pokemon->name}}</p></div>
				</div>
			</a>
			@endforeach
		</div>

@endsection