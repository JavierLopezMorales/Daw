<html>
    <head>
        <title>@yield('Titulo')</title>

    </head>
    <body>
        <div class="nav">
            <div class="nav-title nav-item"><a href="{{route('inicio.show')}}">Juegos Reunidos - Shoot'em Up!</a></div>
            <div class="nav-links nav-item">
                <!--<a href="{{route('ships.index')}}">Naves</a>-->
                <!--<a href="{{route('enemies.index')}}">Enemigos</a>-->
                <a class="ranking-link" href="{{route('rankingMM.index')}}">Ranking</a>
                <!--<a href="{{route('mapMM.index')}}">Mapas</a>-->
                <a class="boost-link" href="{{route('boosts.index')}}">Boosts</a>
                <a class="game-link" href="{{route('JuegoMM.index')}}">Juego Shoot'em Up!</a>
            </div>
        </div>
        <div class="container">
            @yield('content')
        </div>

        <div class="footer"></div>
    </body>
</html>
