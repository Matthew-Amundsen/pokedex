{!! Form::hidden('slot', $slot_number) !!}
{!! Form::hidden('id', $pokemon->id) !!}	
{!! Form::submit( $action . ' slot ' . $slot_number) !!}