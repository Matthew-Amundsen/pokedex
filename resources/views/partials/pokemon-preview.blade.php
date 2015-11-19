<?php 
	$showRemove = $showRemove || false;
?>
<div class="col-sm-6 col-md-4 pokemon-index">
	<img src="../../../images/pokemon/{{ $pokemon->id }}.png">
	<div class="pokemon-footer">
		<span class="pokemon-number"><p>{{ $pokemon->id}}</p></span><span class="pokemon-name"><p>{{ substr($pokemon->name, 0, 12) }}</p></span>
	</div>
	@if($showRemove && Auth::check() && ($user->id === Auth::user()->id))
		{!! Form::open(['route' => ['profile.removePokemon'], 'method' => 'POST']) !!}
			<?php 
				$slot_number = 1;
				$action_words = 'Remove ' . $pokemon->name . ' from slot ';
				$action = "<img src='../../../../images/pokeball.png'>$action_words $slot_number";
			?>
			<div class="btn btn-default ">
				{!! Form::hidden('slot', $slot_number) !!}
				{!! Form::hidden('id', $pokemon->id) !!}	
				{!! Form::button($action, ['class' => 'btn-block', 'type' => 'submit']) !!}
			</div>
		{!! Form::close() !!}
	@endif
</div>