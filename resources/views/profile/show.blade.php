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
				<?php $action = 'remove from'; $pokemon = $user->team_slot($i)->first() ?>
				@if ($pokemon)
					<div class="col-sm-6 col-md-4 text-center">
						<a href="{{ route('pokemon.show', $pokemon->id) }}">
							<img src="..\..\images\pokemon\{{ $pokemon->id }}.png" width="200">
							<h3>{{ $pokemon->id}} {{ $pokemon->name}}</h3>
						</a>
						@if(Auth::check() && ($user->id === Auth::user()->id))
							{!! Form::open(['route' => ['profile.removePokemon'], 'method' => 'POST']) !!}
								<?php $slot_number = $i ?>
								@include('partials.slot-form')
							{!! Form::close() !!}
						@endif
					</div>
				@endif
			@endfor
		</div>
	</div>

@endsection