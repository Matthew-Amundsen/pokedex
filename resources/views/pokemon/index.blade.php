@extends('layouts.master')

@section('content')

	<!-- Main jumbotron for a primary marketing message or call to action -->

	<div class="container content-container">
		<div class="row">
			@foreach($pokemon as $pokemon)
				<a href="{{ route('pokemon.show', $pokemon->id) }}">
					<div class="col-sm-6 col-md-4 text-center">
						<img src="..\images\pokemon\{{ $pokemon->id }}.png" width="200">
						<h3>{{ $pokemon->id}} {{ $pokemon->name}}</h3>
					</div>
				</a>
			@endforeach
		</div>

@endsection