@extends('layouts.master')

@section('content')

		<!-- Main jumbotron for a primary marketing message or call to action -->
		<div class="container content-container">
			<div class="row">
				<div class="col-xs-12">
					<h2>{{ $pokemonData->name }}</h2>
					<h4 class="national-id">National ID: {{ $pokemonData->national_id }}</h4>
					
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#data" aria-controls="data" role="tab" data-toggle="tab">Data</a></li>
						<li role="presentation"><a href="#moves" aria-controls="moves" role="tab" data-toggle="tab">Moves</a></li>
						<li role="presentation"><a href="#comments" aria-controls="comments" role="tab" data-toggle="tab">Comments <span class="badge">{{ count($comments) }}</span></a></li>
					</ul>

					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="data">
							<div class="row">
								<div class="col-sm-6">
									<img src="{{asset('/images/pokemon/' . $pokemon->id . '.png')}}">
								</div>
								<div class="col-sm-6">
									@foreach($pokemonData->types as $type)
										<a href="{{ route('search', 'search=' . $type->name) }}">
											<p class="type-block {{ $type->name }}">{{ ucfirst($type->name) }}</p>
										</a>
									@endforeach

									<div class="pokemon-stats">
										<div class="stat-row">
											<p class="stat-detail">HP:</p>
											<p class="stat-info">{{ $pokemonData->hp }}</p>
											<p class="stat"><span class="stat-bar" style="width: {{ $pokemonData->hp / 1.5}}px">&nbsp;</span><span class="stat-bar-2" style="width: {{ 170 - $pokemonData->hp / 1.5}}px">&nbsp;</span></p>
										</div>
										<div class="stat-row">
											<p class="stat-detail">Attack:</p>
											<p class="stat-info">{{ $pokemonData->attack }}</p>
											<p class="stat"><span class="stat-bar" style="width: {{ $pokemonData->attack / 1.5}}px">&nbsp;</span><span class="stat-bar-2" style="width: {{ 170 - $pokemonData->attack / 1.5}}px">&nbsp;</span></p>
										</div>
										<div class="stat-row">
											<p class="stat-detail">Defense:</p>
											<p class="stat-info">{{ $pokemonData->defense }}</p>
											<p class="stat"><span class="stat-bar" style="width: {{ $pokemonData->defense / 1.5}}px">&nbsp;</span><span class="stat-bar-2" style="width: {{ 170 - $pokemonData->defense / 1.5}}px">&nbsp;</span></p>
										</div>
										<div class="stat-row">
											<p class="stat-detail">Sp.Atk:</p>
											<p class="stat-info">{{ $pokemonData->sp_atk }}</p>
											<p class="stat"><span class="stat-bar" style="width: {{ $pokemonData->sp_atk / 1.5}}px">&nbsp;</span><span class="stat-bar-2" style="width: {{ 170 - $pokemonData->sp_atk / 1.5}}px">&nbsp;</span></p>
										</div>
										<div class="stat-row">
											<p class="stat-detail">Sp.Def:</p>
											<p class="stat-info">{{ $pokemonData->sp_def }}</p>
											<p class="stat"><span class="stat-bar" style="width: {{ $pokemonData->sp_def / 1.5}}px">&nbsp;</span><span class="stat-bar-2" style="width: {{ 170 - $pokemonData->sp_def / 1.5}}px">&nbsp;</span></p>
										</div>
										<div class="stat-row">
											<p class="stat-detail">Speed:</p>
											<p class="stat-info">{{ $pokemonData->speed }}</p>
											<p class="stat"><span class="stat-bar" style="width: {{ $pokemonData->speed / 1.5}}px">&nbsp;</span><span class="stat-bar-2" style="width: {{ 170 - $pokemonData->speed / 1.5}}px">&nbsp;</span></p>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-6">
									<h3>Abilities</h3>
									@foreach($pokemonData->abilities as $ability)
										<p>{{ ucfirst($ability->name) }}</p>
									@endforeach
								</div>
								<div class="col-sm-6">
									@if(Auth::check())
										@for($i = 1; $i <= 6; $i += 1)
											<?php 
												$slot_number = $i;
												$action_words = ' Add ' . $pokemon->name . ' to slot ';
												$action = "<img class='svgPokeball' src='". asset('/images/pokeball.svg') . "'> $action_words " . $slot_number;									
											?>
											{!! Form::open(['route' => ['profile.addPokemon'], 'method' => 'POST']) !!}
												{!! Form::hidden('slot', $slot_number) !!}
												{!! Form::hidden('id', $pokemon->id) !!}	
												{!! Form::button($action, ['class' => 'btn btn-addRemove', 'type' => 'submit']) !!}
											{!! Form::close() !!}
										@endfor
									@endif
								</div>
							</div>
						</div>

						<div role="tabpanel" class="tab-pane" id="moves">
							<div class="col-xs-12 col-sm-6">
								<h3>Learn By Level Up</h3>
								<table class="table table-striped">
									<th>Level</th>
									<th>Name</th>

									@foreach($pokemonData->moves as $move)
										@if($move->learn_type === "level up" && $move->level)
											<tr>
												<td>{{$move->level}}</td>
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

							<div class="col-xs-12 col-sm-6">
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
							</div>
						</div>

						<div role="tabpanel" class="tab-pane" id="comments">
							<div>
								@foreach ($comments as $comment)
									<div class="comment-bubble">
										<p class="username">{{ $comment->user->name }}</p>
										<p class="created-at">{{ $comment->created_at }}</p>
										<p class="comment">{{ $comment->comment }}</p>
									</div>
																				
									@if(Auth::check() && (Auth::user()->id === $comment->user_id || Auth::user()->role === "admin"))
										<a href="{{ route('pokemon.comments.edit', [$pokemon->id, $comment->id]) }}" class="btn btn-default btn-edit">Edit Comment</a>
									@endif
									<hr class="comment-hr">
								@endforeach
							</div>
							<div>
								@if(Auth::check())
									<div class="comment-block">
										<h4>Comment on {{ $pokemon->name }}</h4>
										{!! Form::open(['route' => ['pokemon.comments.store', $pokemon->id], 'class' => 'form-horizontal', 'method' => 'POST']) !!}
											{!! Form::hidden('pokemon_id', $pokemon->id) !!}
											{!! Form::label('Comment:') !!}
											{!! Form::textarea('comment', $newComment->comment, ['class' => 'form-control']) !!}
											{!! Form::submit('Add Comment', ['class' => 'btn btn-primary form-control']) !!}
										{!! Form::close() !!}
									</div>
								@else
									<div class="comment-block text-center">
										<a href="{{ route('auth.login') }}"><h4>Please log in to post a comment</h4></a>
									</div>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection