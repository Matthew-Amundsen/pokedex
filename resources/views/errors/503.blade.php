<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Pokedex</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">

        <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">

        <link rel="icon" type="image/png" href="/favicon-192x192.png" sizes="192x192">
    </head>
    <body>
        <div class="container content-container">
            <div class="row missing-no">
                <img src="{{ asset('/images/missing-no.png') }}">
            </div>
            <div class="row missing-no">
                <img src="{{ asset('/images/503-image.png') }}">
            </div>
            <div class="row missing-no">
                <h2>Oh no! Something went wrong</h2>
                <a class="btn btn-primary" href="{{ route('pokemon.index') }}">Click here to get back to our home page</a>
            </div>
        </div>
    </body>
</html>
