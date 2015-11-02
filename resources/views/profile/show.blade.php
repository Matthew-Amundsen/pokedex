@extends('layouts.master')

@section('content')

	<div class="container content-container">
		<div class="text-center heading">
			<h1>{{ $user->name }}</h1> 
			@if(Auth::check() && ($user->id === Auth::user()->id))
				<a href="{{ route('profile.edit', $user->id) }}">Edit Profile</a>
			@endif
		</div>
		<div class="row text-center">
			@for($i = 1; $i <= 6; $i += 1)
				<?php $pokemon = $user->team_slot($i)->first() ?>
				@if ($pokemon)
				<div class="col-sm-4">
					<img src="..\..\images\pokemon\{{ $pokemon->id }}.png" width="200">
					<h3>{{ $pokemon->id }} {{ $pokemon->name }}</h3>
				</div>
				@endif
			@endfor
		</div>
	</div>

@endsection