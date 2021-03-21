<html>
    <head>
        <title>@yield('Titulo')</title>
    </head>
    <body>
      <div class="wrap">
          <h1>Juegos Reunidos - SlidingTiles</h1>
          <nav>
          	<a href="{{route('inicio.show')}}">Inicio</a>
          	<a href="{{route('TematicasST.index')}}">Imagenes</a>
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
