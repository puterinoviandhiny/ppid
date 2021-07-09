<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/img/favicon-pontianak.png') }}">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Pontianak') }}</title>
        <!-- CSS FILES -->
		<link rel="stylesheet" type="text/css" href="{{ asset('css/uikit.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/marketing.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('js/bootstrap-fileinput/css/fileinput.min.css') }}">
        <link rel="stylesheet" href="{{ asset('js/bootstrap-fileinput/themes/explorer-fas/theme.min.css') }}">
    </head>

<body>

    
