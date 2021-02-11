<html>
    <head>
        <title>@yield('Titulo')</title>
    </head>
    <body>
        <div class="nav">
            <h1>Juegos Reunidos - MataMarcianos</h1>
            <a href="{{route('ships.index')}}">Naves</a>
            <a href="{{route('enemies.index')}}">Enemigos</a>
            <a href="{{route('rankingMM.index')}}">Ranking</a>
            <a href="{{route('mapMM.index')}}">Mapas</a></div>

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>