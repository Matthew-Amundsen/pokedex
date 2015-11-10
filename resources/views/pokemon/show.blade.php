@extends('layouts.master')

@section('content')

		<!-- Main jumbotron for a primary marketing message or call to action -->
		<div class="container content-container">
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<h2>{{ $pokemonData->name }}</h2>
					<img src="..\images\pokemon\{{ $pokemon->id }}.png">
					<h4>National ID: {{ $pokemonData->national_id }}</h4>
				</div>
				<div class="col-xs-12 col-sm-6">
					<p class="type-block {{ $pokemonData->types[0]->name }}">{{ ucfirst($pokemonData->types[0]->name) }}</p>
					@if(count($pokemonData->types) > 1)
						<p class="type-block {{ $pokemonData->types[1]->name }}">{{ ucfirst($pokemonData->types[1]->name) }}</p>
					@endif

					<table>
						<tr>
							<th class="stat-detail">HP:</th>
							<td class="stat-info">{{ $pokemonData->hp }}</td>
							<td><p class="stat-bar" style="width: {{ $pokemonData->hp / 1.5}}px">&nbsp;</p></td>
						</tr>
						<tr>
							<th class="stat-detail">Attack:</th>
							<td class="stat-info">{{ $pokemonData->attack }}</td>
							<td><p class="stat-bar" style="width: {{ $pokemonData->attack / 1.5}}px">&nbsp;</p></td>
						</tr>
						<tr>
							<th class="stat-detail">Defense:</th>
							<td class="stat-info">{{ $pokemonData->defense }}</td>
							<td><p class="stat-bar" style="width: {{ $pokemonData->defense / 1.5}}px">&nbsp;</p></td>
						</tr>
						<tr>
							<th class="stat-detail">Sp.Atk:</th>
							<td class="stat-info">{{ $pokemonData->sp_atk }}</td>
							<td><p class="stat-bar" style="width: {{ $pokemonData->sp_atk / 1.5}}px">&nbsp;</p></td>
						</tr>
						<tr>
							<th class="stat-detail">Sp.Def:</th>
							<td class="stat-info">{{ $pokemonData->sp_def }}</td>
							<td><p class="stat-bar" style="width: {{ $pokemonData->sp_def / 1.5}}px">&nbsp;</p></td>
						</tr>
						<tr>
							<th class="stat-detail">Speed:</th>
							<td class="stat-info">{{ $pokemonData->speed }}</td>
							<td><p class="stat-bar" style="width: {{ $pokemonData->speed / 1.5}}px">&nbsp;</p></td>
						</tr>
					</table>

				</div>
			</div>

			<div class="row">
				<div class="col-xs-2">
					@if(Auth::check())
					<?php $action = '<span class="glyphicon glyphicon-record"></span>'; ?>
						<div class="row">
							<div class="col-xs-6">
								{{-- Button to add Pokemon to slot 1 --}}
								{!! Form::open(['route' => ['profile.addPokemon'], 'method' => 'POST']) !!}
									<?php $slot_number = 1 ?>
									@include('partials.slot-form')
								{!! Form::close() !!}
							</div>
							<div class="col-xs-6">
								{{-- Button to add Pokemon to slot 2 --}}
								{!! Form::open(['route' => ['profile.addPokemon'], 'method' => 'POST']) !!}
									<?php $slot_number = 2 ?>
									@include('partials.slot-form')
								{!! Form::close() !!}
							</div>
							<div class="col-xs-6">
								{{-- Button to add Pokemon to slot 3 --}}
								{!! Form::open(['route' => ['profile.addPokemon'], 'method' => 'POST']) !!}
									<?php $slot_number = 3 ?>
									@include('partials.slot-form')
								{!! Form::close() !!}
							</div>
							<div class="col-xs-6">
								{{-- Button to add Pokemon to slot 4 --}}
								{!! Form::open(['route' => ['profile.addPokemon'], 'method' => 'POST']) !!}
									<?php $slot_number = 4 ?>
									@include('partials.slot-form')
								{!! Form::close() !!}
							</div>
							<div class="col-xs-6">
								{{-- Button to add Pokemon to slot 5 --}}
								{!! Form::open(['route' => ['profile.addPokemon'], 'method' => 'POST']) !!}
									<?php $slot_number = 5 ?>
									@include('partials.slot-form')
								{!! Form::close() !!}
							</div>
							<div class="col-xs-6">
								{{-- Button to add Pokemon to slot 6 --}}
								{!! Form::open(['route' => ['profile.addPokemon'], 'method' => 'POST']) !!}
									<?php $slot_number = 6 ?>
									@include('partials.slot-form')
								{!! Form::close() !!}
							</div>
						</div>
					@endif
				</div>

				<div class="col-xs-12">
					<h3>Learn By Level Up</h3>
					<table class="table table-striped">
						<th>Name</th>
						<th>Level</th>

						@foreach($pokemonData->moves as $move)
							@if($move->learn_type === "level up" && $move->level)
								<tr>
									<td>{{$move->name}}</td>
									<td>{{$move->level}}</td>
								</tr>
							@endif
						@endforeach
					</table>

					<h3>Learn By Machine</h3>
					<table class="table table-striped">
						<th>Name</th>

						@foreach($pokemonData->moves as $move)
							@if($move->learn_type === "machine")
								<tr>
									<td>{{$move->name}}</td>
								</tr>
							@endif
						@endforeach
					</table>

					<h3>Learn By Tutor</h3>
					<table class="table table-striped">
						<th>Name</th>
						
						@foreach($pokemonData->moves as $move)
							@if($move->learn_type === "tutor")
								<tr>
									<td>{{$move->name}}</td>
								</tr>
							@endif
						@endforeach
					</table>

					<h3>Learn By Breeding</h3>
					<table class="table table-striped">
						<th>Name</th>
						
						@foreach($pokemonData->moves as $move)
							@if($move->learn_type === "egg move")
								<tr>
									<td>{{$move->name}}</td>
								</tr>
							@endif
						@endforeach
					</table>
				</div>
			</div>

			@foreach ($comments as $comment)
				<p>
					{{ $comment->comment }} - Posted by: {{ $comment->user->name }}
					
					@if(Auth::check() && Auth::user()->role === "admin")
						{!! Form::open(['route' => ['pokemon.comments.destroy', $pokemon->id, $comment->id], 'method' => 'delete']) !!}
							{!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
							<a href="{{ route('pokemon.comments.edit', [$pokemon->id, $comment->id]) }}" class="btn btn-warning">Edit Comment</a>
						{!! Form::close() !!}
					@endif
				</p>
			@endforeach
		</div>

	@if(Auth::check())
		<div class="container">
			<h4>Comment on {{ $pokemon->name }}</h4>
			
			{!! Form::open(['route' => ['pokemon.comments.store', $pokemon->id], 'class' => 'form-horizontal', 'method' => 'POST']) !!}
				<div class="form-group">
					{!! Form::hidden('pokemon_id', $pokemon->id) !!}
					{!! Form::label('Comment:') !!}
					{!! Form::textarea('comment', $newComment->comment, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::submit('Add Comment', ['class' => 'btn btn-primary form-control']) !!}
				</div>
			{!! Form::close() !!}
		</div>
	@endif
	
@endsection