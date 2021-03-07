<html>
    <head>
        <title>@yield('Titulo')</title>
    </head>
    <body>
      <div class="wrap">
          <h1>Juegos Reunidos - SlidingTiles</h1>
          <a href="{{route('TematicasST.index')}}">Tematicas</a>
          <a href="{{route('RankingST.index')}}">Ranking</a>
          </div>

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
