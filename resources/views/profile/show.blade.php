@extends('layouts.master')

@section('content')

	<div class="container content-container">
		<div class="text-center heading">
			<h1>{{ $user->name }}</h1> 
		</div>
		<div class="row text-center">
			@foreach ($allPokemon as $pokemon) 
				<a href="{{ route('pokemon.show', $pokemon->id) }}">
					@include('partials.pokemon-preview', ['showRemove' => true])
				</a>
			@endforeach
		</div>
	</div>

@endsection