@extends('layouts.master')

@section('content')

	<div class="container content-container">
		<h2 class="text-center">Search Results</h2>
		
		@foreach($result as $pokemon)
			<a href="{{ route('pokemon.show', $pokemon->id) }}">
				@include('partials.pokemon-preview')
			</a>	
		@endforeach
		
	</div>

@endsection