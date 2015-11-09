@extends('layouts.master')

@section('content')

	<div class="container content-container">
		<h1>Search Results</h1>
		
		@foreach($result as $pokemon)
			<a href="{{ route('pokemon.show', $pokemon->id) }}">
				<div class="col-sm-6 col-md-4 pokemon-index">
					<img src="..\images\pokemon\{{ $pokemon->id }}.png" width="270">
					<div class="pokemon-number"><p>{{ $pokemon->id}}</p></div><div class="pokemon-name"><p>{{ $pokemon->name}}</p></div>
				</div>
			</a>	
		@endforeach
		
	</div>

@endsection