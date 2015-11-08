@extends('layouts.master')

@section('content')

		<!-- Main jumbotron for a primary marketing message or call to action -->
		<div class="container">
			<h1>Pokemon</h1>
			<h2>{{ $pokemonData->name }}</h2>
			<img src="..\images\pokemon\{{ $pokemon->id }}.png">
			<p>Type: {{$pokemonData->types[0]->name}}
				@if(count($pokemonData->types) > 1)
					| {{$pokemonData->types[1]->name}}
				@endif
			</p>

			<p>HP: {{$pokemonData->hp}}</p>
			<p>Attack: {{ $pokemonData->attack }}</p>
			<p>Defense: {{$pokemonData->defense}}</p>
			<p>Sp.Atk: {{$pokemonData->sp_atk}}</p>
			<p>Sp.Def: {{$pokemonData->sp_def}}</p>
			<p>Speed: {{$pokemonData->speed}}</p>
			<p>National ID: {{$pokemonData->national_id}}</p>

			<div>
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


			@if(Auth::check())
			<?php $action = 'Add to'; ?>
				{{-- Button to add Pokemon to slot 1 --}}
				{!! Form::open(['route' => ['profile.addPokemon'], 'method' => 'POST']) !!}
					<?php $slot_number = 1 ?>
					@include('partials.slot-form')
				{!! Form::close() !!}

				{{-- Button to add Pokemon to slot 2 --}}
				{!! Form::open(['route' => ['profile.addPokemon'], 'method' => 'POST']) !!}
					<?php $slot_number = 2 ?>
					@include('partials.slot-form')
				{!! Form::close() !!}

				{{-- Button to add Pokemon to slot 3 --}}
				{!! Form::open(['route' => ['profile.addPokemon'], 'method' => 'POST']) !!}
					<?php $slot_number = 3 ?>
					@include('partials.slot-form')
				{!! Form::close() !!}

				{{-- Button to add Pokemon to slot 4 --}}
				{!! Form::open(['route' => ['profile.addPokemon'], 'method' => 'POST']) !!}
					<?php $slot_number = 4 ?>
					@include('partials.slot-form')
				{!! Form::close() !!}

				{{-- Button to add Pokemon to slot 5 --}}
				{!! Form::open(['route' => ['profile.addPokemon'], 'method' => 'POST']) !!}
					<?php $slot_number = 5 ?>
					@include('partials.slot-form')
				{!! Form::close() !!}

				{{-- Button to add Pokemon to slot 6 --}}
				{!! Form::open(['route' => ['profile.addPokemon'], 'method' => 'POST']) !!}
					<?php $slot_number = 6 ?>
					@include('partials.slot-form')
				{!! Form::close() !!}
			@endif

			@foreach ($comments as $comment)
				<p>
					{{ $comment->comment }} - Posted by: {{ $comment->user->name }}
					
					@if(Auth::check() && Auth::user()->role === "admin")
						{!! Form::open(['action' => ['CommentsController@destroy', $comment->id], 'method' => 'delete']) !!}
							{!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
							<a href="{{ route('comments.edit', $comment->id, $pokemon->id) }}" class="btn btn-warning">Edit Comment</a>
						{!! Form::close() !!}
					@endif
				</p>
			@endforeach
		</div>

	@if(Auth::check())
		<div class="container">
			<h4>Comment on {{ $pokemon->name }}</h4>
			
			{!! Form::open(['route' => ['comments.store', $pokemon->id], 'class' => 'form-horizontal', 'method' => 'POST']) !!}
				<div class="form-group">
					
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