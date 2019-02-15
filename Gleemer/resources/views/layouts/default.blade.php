<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/core.min.css">
        <title>@section('title') - Gleemer</title>
    </head>
    <body class="flex flex-direction(column) margin(0)">
        @header
        <main class="flex-grow(1)">
            @yield('content')
        </main>
        @footer
    </body>
</html>
