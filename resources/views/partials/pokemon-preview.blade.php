<?php 
	$showRemove = isset($showRemove) ? $showRemove : false;
?>
@if($pokemon)
<a href="{{ route('pokemon.show', $pokemon->id) }}">
	<div class="col-sm-6 col-md-4 pokemon-index">
		<img src="{{ asset('/images/pokemon/' . $pokemon->id . '.png') }}">
		<div class="pokemon-footer">
			<span class="pokemon-number"><p>{{ $pokemon->id}}</p></span><span class="pokemon-name"><p>{{ substr($pokemon->name, 0, 12) }}</p></span>
		</div>
		@if($showRemove && Auth::check() && ($user->id === Auth::user()->id))
			{!! Form::open(['route' => ['profile.removePokemon'], 'method' => 'POST']) !!}
				<?php 
					$action_words = ' Remove ' . substr($pokemon->name, 0, 12) . ' from slot ';
					$action = "<span class='glyphicon glyphicon-remove'></span>" . $action_words . ($slot_number + 1);
				?>
					{!! Form::hidden('slot', ($slot_number + 1)) !!}
					{!! Form::hidden('id', $pokemon->id) !!}	
					{!! Form::button($action, ['class' => 'btn btn-addRemove', 'type' => 'submit']) !!}
			{!! Form::close() !!}
		@endif
	</div>
</a>
@endif