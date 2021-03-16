<html>
    <head>
        <title>@yield('Titulo')</title>
    </head>
    <body>
      <div class="wrap">
          <h1>Juegos Reunidos - SlidingTiles</h1>
          <nav>
          	<a href="#">Inicio</a>
          	<a href="{{route('TematicasST.index')}}">Tematica</a>
          	<a href="{{route('RankingST.index')}}">Ranking</a>
          	<a href="{{route('opciones')}}">Opciones</a>
          	<div class="animation start-home"></div>
          </nav>
          </div>

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
