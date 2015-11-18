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
		<link rel="stylesheet" href="{{ asset('css/bootstrap-theme.min.css') }}">
		<link rel="stylesheet" href="{{ asset('css/main.css') }}">

		<link rel="icon" type="image/png" href="/favicon-192x192.png" sizes="192x192">
	</head>
	<body>
		<!--[if lt IE 8]>
			<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->
		<nav class="navbar navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						{{-- <span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span> --}}
						<img src="../../images/triangle.png">
					</button>
					<img class="camera-lens" src="../../../../images/camera-lens.png">
				</div>
				
				<div id="navbar" class="navbar-collapse collapse">

					<ul class="nav navbar-nav">
						<li><a href="{{ route('pokemon.index') }}">Pokedex</a></li>
					</ul>

					{!! Form::open(['route' => 'search', 'method' => 'get', 'id' => 'search-bar']) !!}
						<div class="input-group">
							{!! Form::text('search', null, ['class' => 'form-control', 'placeholder'=>'Search']) !!}
							<span class="input-group-btn">
							{!! Form::button('<span class="glyphicon glyphicon-search"></span>', ['class' => 'btn btn-search', 'type' => 'submit']) !!}
							</span>
						</div>
					{!! Form::close() !!}

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

		@if( Session::has( 'success' ))
			<div class="flash-message">
				<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>Success!</strong> {{ Session::get( 'success' ) }}
				</div>
			</div>
		@elseif( Session::has( 'warning' ))
			{{ Session::get( 'warning' ) }} <!-- here to 'withWarning()' -->
		@endif

			

	@yield('content')

		<footer>
			<div class="container-fluid">
				<div class="row footer-row">
					<p class="footer-link"><a href="https://github.com/Matthew-Amundsen/pokedex" target="_blank">View on Github<img src="../../../../images/GitHub-Mark-Light-32px.png"></a><span class="footer-triangle"></span></p>
					<p class="footer-link"><a href="http://pokeapi.co/" target="_blank">Data provided by Pokeapi</a><span class="footer-triangle"></span></p>
					<p class="footer-link"><a href="https://github.com/veekun/pokedex" target="_blank">Data provided by Veekun</a><span class="footer-triangle"></span></p>
				</div>
			</div>
		</footer>
		
		<script src="{{ asset('js/all.js') }}"></script>

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
