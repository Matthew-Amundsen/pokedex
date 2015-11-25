@extends('layouts.master')

@section('content')

	<div class="container content-container">
		<div class="text-center heading">
			<h1>{{ $user->name }}</h1> 
		</div>
		<div class="row text-center">
		@if( !array_filter($allPokemon))
			<h4>You have no pokemon in your team</h4>
			<a class="btn btn-primary" href="{{ route('pokemon.index') }}">Click here to view all the Pokemon</a>
		@endif
			@foreach ($allPokemon as $slot_number => $pokemon) 
				@include('partials.pokemon-preview', ['showRemove' => true])
			@endforeach
		</div>
	</div>

@endsection