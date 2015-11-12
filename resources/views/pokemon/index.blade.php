@extends('layouts.master')

@section('content')

	<!-- Main jumbotron for a primary marketing message or call to action -->

	<div class="container content-container">
		<div class="row">
		<h2 class="text-center">Pokemon: All</h2>
			@foreach($pokemon as $pokemon)
				<a href="{{ route('pokemon.show', $pokemon->id) }}">
					@include('partials.pokemon-preview')
				</a>
			@endforeach
		</div>

@endsection