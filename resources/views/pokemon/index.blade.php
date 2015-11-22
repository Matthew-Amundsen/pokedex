@extends('layouts.master')

@section('content')

	<div class="container content-container">
		<div class="row">
		<h2 class="text-center">Pokemon: All</h2>
			@foreach($pokemon as $pokemon)
				@include('partials.pokemon-preview')
			@endforeach
		</div>
	</div>

@endsection