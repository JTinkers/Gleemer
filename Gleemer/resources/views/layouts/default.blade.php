<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="/css/core.min.css">
        <title>@yield('title', 'Gleemer') - Gleemer</title>
    </head>
    <body>
        <header>
            <div id="logo">
                <span>Gleemer</span>
            </div>
            @include('components.nav')
        </header>
        @include('components.subheader')
        <main>
            @yield('content')
        </main>
        @include('components.footer')
    </body>
</html>
