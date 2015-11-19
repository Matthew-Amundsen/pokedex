@extends('layouts.master')

@section('content')

	<div class="container content-container">
		<div class="row">
		<h2 class="text-center">Pokemon: All</h2>
			@foreach($pokemon as $pokemon)
				<a href="{{ route('pokemon.show', $pokemon->id) }}">
					@include('partials.pokemon-preview', ['showRemove' => false])
				</a>
			@endforeach
		</div>
	</div>

@endsection