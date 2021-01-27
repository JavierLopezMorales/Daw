<html>
    <head>
        <title>@yield('Titulo')</title>
    </head>
    <body>
        @section('sidebar')
            Este es mi plantilla Master
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
