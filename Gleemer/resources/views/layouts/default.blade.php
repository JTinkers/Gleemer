<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script defer src="{{ asset('js/app.js') }}"></script>
        <link rel="stylesheet" href="/css/core.min.css">
        <title>@section('title') - Gleemer</title>
    </head>
    <body>
        @header
        <div id="main">
            @yield('content')
        </div>
        @footer
    </body>
</html>
