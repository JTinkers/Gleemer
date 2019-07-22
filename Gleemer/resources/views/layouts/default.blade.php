<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script defer src="{{ asset('js/app.js') }}"></script>
        <link rel="stylesheet" href="/css/main.min.css">
        <title>Gleemer - @yield('title')</title>
    </head>
    <body>
		<div id="app">
			@if(session('alert') != null)
				@alert(['alert' => session('alert'), 'alert_type' => session('alert_type')])
			@endif
			@header
	        <div id="content">
	            @yield('content')
				@footer
	        </div>
		</div>
    </body>
</html>
