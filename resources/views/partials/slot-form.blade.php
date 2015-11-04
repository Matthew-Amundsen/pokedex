{!! Form::hidden('slot', $slot_number) !!}
{!! Form::hidden('id', $pokemon->id) !!}	
{!! Form::submit('Add to slot ' . $slot_number) !!}