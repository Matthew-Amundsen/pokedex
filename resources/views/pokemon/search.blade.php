@extends('layouts.master')

@section('content')

	<div class="container content-container">
		<h1>Search Results</h1>
		
		@foreach($result as $pokemon)
			<a href="{{ route('pokemon.show', $pokemon->id) }}">
				<div class="col-sm-6 col-md-4 text-center pokemon-index">
					{{-- <img src="..\images\pokemon\{{ $pokemon->id }}.png" width="200"> --}}
					<h3 class="pokemon-number"><p>{{ $pokemon->id}}</p></h3><h3 class="pokemon-name"><p>{{ $pokemon->name}}</p></h3>
				</div>
			</a>	
		@endforeach
		
	</div>

@endsection