{!! Form::hidden('slot', $slot_number) !!}
{!! Form::hidden('id', $pokemon->id) !!}	
{!! Form::button($action, ['class' => 'btn btn-default', 'type' => 'submit']) !!}
<span>Add pokemon to slot {{ $slot_number }}</span>