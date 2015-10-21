@extends('layouts.master')

@section('content')

	<!-- Main jumbotron for a primary marketing message or call to action -->
	<div class="jumbotron">
	  <div class="container">
		<ul>
			@foreach($pokemon as $pokemon)
				<li>
					<h3><a href="{{ route('pokemon.show', $pokemon->id) }}">{{ $pokemon->name}}</a></h3>
					<img src="images\pokemon\00{{ $pokemon->id }}.png">
				</li>
			@endforeach
		</ul>
	</div>
@endsection