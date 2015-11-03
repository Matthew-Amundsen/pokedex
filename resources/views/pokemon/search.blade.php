@extends('layouts.master')

@section('content')

	<!-- Main jumbotron for a primary marketing message or call to action -->
	<div class="jumbotron">
		<div class="container">
			<h1>Search Results</h1>
			
			@foreach($result as $pokemon)
				<a href="{{ route('pokemon.show', $pokemon->id) }}">
					<div class="col-sm-6 col-md-4 text-center">
						<img src="..\images\pokemon\{{ $pokemon->id }}.png" width="200">
						<h3>{{ $pokemon->id}} {{ $pokemon->name}}</h3>
					</div>
				</a>
			@endforeach
			
		</div>
	</div>	
@endsection