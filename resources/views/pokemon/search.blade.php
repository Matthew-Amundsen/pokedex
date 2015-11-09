@extends('layouts.master')

@section('content')

	<div class="container content-container">
		<h1>Search Results</h1>
		
		@foreach($result as $pokemon)
			<a href="{{ route('pokemon.show', $pokemon->id) }}">
				@include('partials.pokemon-preview')
			</a>	
		@endforeach
		
	</div>

@endsection