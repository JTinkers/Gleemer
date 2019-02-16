<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/core.min.css">
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
