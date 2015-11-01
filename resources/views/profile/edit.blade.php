@extends('layouts.master')

@section('content')
	<div class="container content-container">
		<h1>Edit Profile</h1>

		{!! Form::open(['route' => ['profile.update'], 'class' => 'form-horizontal form-edit', 'method' => 'PUT']) !!}

			@if(count($errors) > 0)
				<div class="alert alert-danger">There were problems with your form. Please fix them.</div>
			@endif

			<div class="form-group required {{ $errors->has('name') ? 'has-error text-danger' : '' }}">
				<label for="name" class="control-label">Full Name</label>
				{!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
				@include('partials.error-help-block', ['field' => 'name'])
			</div>

			<div class="form-group required {{ $errors->has('email') ? 'has-error text-danger' : '' }}">
				<label for="email" class="control-label">Email</label>
				{!! Form::email('email', $user->email, ['class' => 'form-control']) !!}
				@include('partials.error-help-block', ['field' => 'email'])
			</div>

			<div class="form-group {{ $errors->has('password') ? 'has-error text-danger' : '' }}">
				<label for="password" class="control-label">New Password</label>
				{!! Form::password('password', ['class' => 'form-control']) !!}
				@include('partials.error-help-block', ['field' => 'password'])
			</div>

			<div class="form-group {{ $errors->has('password_confirmation') ? 'has-error text-danger' : '' }}">
				<label for="password" class="control-label">Confirm New Password</label>
				{!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
				@include('partials.error-help-block', ['field' => 'password_confirmation'])
			</div>

			<div class="help-block">Leave passwords blank to keep your existing password.</div>

			<div class="form-group">
				<div>
					<button type="submit" class="btn btn-danger btn-block"><span class="glyphicon glyphicon-ok"></span> Edit Profile</button>
				</div>
			</div>
		{!! Form::close() !!}
	</div>
@endsection