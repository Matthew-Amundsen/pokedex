<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title></title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">

		<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
		<style>
			body {
				padding-top: 70px;
				padding-bottom: 20px;
			}
		</style>
		<link rel="stylesheet" href="{{ asset('css/bootstrap-theme.min.css') }}">
		<link rel="stylesheet" href="{{ asset('css/main.css') }}">

		<script src="{{ asset('js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>
	</head>
	<body>
		<!--[if lt IE 8]>
			<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ route('home') }}">Pokedex</a>
			</div>
			
			<div id="navbar" class="navbar-collapse collapse">

				<ul class="nav navbar-nav">
					<li class="{{ Route::currentRouteName() === 'home' ? 'active' : null }}"><a href="{{ route('home') }}">Home</a></li>
					<li class="{{ Route::currentRouteName() === 'pokemon.index' ? 'active' : null }}"><a href="{{ route('pokemon.index') }}">Pokemon</a></li>
					<li class="{{ Route::currentRouteName() === 'search' ? 'active' : null }}"><a href="{{ route('search') }}">Search</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if(Auth::check())
						<li><a href="{{ route('profile.show', Auth::user()->id) }}">{{ Auth::user()->name }}</a></li>
						<li><a href="{{ route('profile.edit', Auth::user()->id) }}">Edit Profile</a></li>
						<li><a href="{{ route('auth.logout') }}">Logout</a></li>
					@else
						<li><a href="{{ route('auth.register') }}">Register</a></li>
						<li><a href="{{ route('auth.login') }}">Login</a></li>
					@endif
				</ul>

			</div><!--/.navbar-collapse -->
		</div>
	</nav>

	@yield('content')

		<script src="{{ asset('//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js') }}"></script>
		<script>window.jQuery || document.write('<script src="{{ asset('js/vendor/jquery-1.11.2.min.js') }}"><\/script>')</script>
		<script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
		<script src="{{ asset('js/main.js') }}"></script>
		<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
		<script>
			(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
			function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
			e=o.createElement(i);r=o.getElementsByTagName(i)[0];
			e.src='//www.google-analytics.com/analytics.js';
			r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
			ga('create','UA-XXXXX-X','auto');ga('send','pageview');
		</script>
	</body>
</html>
