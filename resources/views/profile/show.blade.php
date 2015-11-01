@extends('layouts.master')

@section('content')

	<div class="container content-container">
		<div class="text-center heading">
			<h1>{{ $user->name }}</h1> 
			@if(Auth::check() && ($user->id === Auth::user()->id))
				<a href="{{ route('profile.edit', $user->id) }}">Edit Profile</a>
			@endif
		</div>
	</div>

@endsection