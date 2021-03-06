@extends('layouts.masterST')
<link rel="stylesheet" href="{{ asset('css/cssST/CSS.css') }}" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('js/jsST/formST.js') }}"></script>
<script src="{{ asset('js/jsST/javascript.js') }}"></script>


@section('Titulo', 'Sliding-Tiles')

@section('content')
<script>
//Funcion para mandar las imagenes al juego , desde servidor.(revisar el bucle, posible causa de cuadrado blanco)
document.addEventListener("DOMContentLoaded", function () {
  var fondo = document.getElementById("img-container");
  fondo.style.backgroundImage="url({{url('images/imagesST',$name_fondo)}})";

  @for ($i=1;$i<26;$i++)
  var puzzle =  document.getElementsByClassName("tile" + {{$i}})[0];
  puzzle.style.backgroundImage="url({{url('images/imagesST',$name_puzzle)}})";
  @endfor

});

</script>
<!-- Informacion al acabar -->
<div class="game-end">

  <div class="formUpload flex-item">

      <form class="form flex-item" action="{{ route('RankingST.store') }}" method="POST">

          <div class="game-end-info title">¡ENHORABUENA!</div>
          @csrf
          <div class="game-end-info">Introduce tus iniciales (3 carácteres)</div>
          <input class="name" type="text" name="name" autocomplete="off">

          <div class="game-end-info">Tus movimientos han sido:</div>
          <div class="moves">0</div>
          <input type="text" name="moves" id="moves1"hidden>
          <input type="hidden" name="mode" id="mode" value="5x5">
          <div class="game-buttons">

              <a class="retry" href="{{route('opciones')}}">Volver a Elegir Puzzle</a>
              <input class="btn-submit" type="submit" value="Aceptar">

          </div>

      </form>
  </div>
</div>
<center><!-- Tabla de puzzle -->
  <div id="puzzle-contenedor">
<div id="table1" style="display: inline-table;">
   <div id="row1" style="display: table-row;">
      <div id="cell11" class="tile1 " onClick="clickTile(1,1);"><div class="numeroImg">1</div></div>
      <div id="cell12" class="tile2" onClick="clickTile(1,2);"><div class="numeroImg">2</div></div>
      <div id="cell13" class="tile3" onClick="clickTile(1,3);"><div class="numeroImg">3</div></div>
	  <div id="cell14" class="tile4" onClick="clickTile(1,4);"><div class="numeroImg">4</div></div>
	  <div id="cell15" class="tile5" onClick="clickTile(1,5);"><div class="numeroImg">5</div></div>
   </div>
   <div id="row2" style="display: table-row;">
      <div id="cell21" class="tile6" onClick="clickTile(2,1);"><div class="numeroImg">6</div></div>
      <div id="cell22" class="tile7" onClick="clickTile(2,2);"><div class="numeroImg">7</div></div>
      <div id="cell23" class="tile8" onClick="clickTile(2,3);"><div class="numeroImg">8</div></div>
	  <div id="cell24" class="tile9" onClick="clickTile(2,4);"><div class="numeroImg">9</div></div>
	  <div id="cell25" class="tile10" onClick="clickTile(2,5);"><div class="numeroImg">10</div></div>
   </div>
   <div id="row3" style="display: table-row;">
      <div id="cell31" class="tile11" onClick="clickTile(3,1);"><div class="numeroImg">11</div></div>
      <div id="cell32" class="tile12" onClick="clickTile(3,2);"><div class="numeroImg">12</div></div>
      <div id="cell33" class="tile13" onClick="clickTile(3,3);"><div class="numeroImg">13</div></div>
	  <div id="cell34" class="tile14" onClick="clickTile(3,4);"><div class="numeroImg">14</div></div>
	  <div id="cell35" class="tile15" onClick="clickTile(3,5);"><div class="numeroImg">15</div></div>
   </div>
   <div id="row4" style="display: table-row;">
      <div id="cell41" class="tile16" onClick="clickTile(4,1);"><div class="numeroImg">16</div></div>
      <div id="cell42" class="tile17" onClick="clickTile(4,2);"><div class="numeroImg">17</div></div>
      <div id="cell43" class="tile18" onClick="clickTile(4,3);"><div class="numeroImg">18</div></div>
	  <div id="cell44" class="tile19" onClick="clickTile(4,4);"><div class="numeroImg">19</div></div>
	  <div id="cell45" class="tile20" onClick="clickTile(4,5);"><div class="numeroImg">20</div></div>
   </div>
   <div id="row5" style="display: table-row;">
      <div id="cell51" class="tile21" onClick="clickTile(5,1);"><div class="numeroImg">21</div></div>
      <div id="cell52" class="tile22" onClick="clickTile(5,2);"><div class="numeroImg">22</div></div>
      <div id="cell53" class="tile23" onClick="clickTile(5,3);"><div class="numeroImg">23</div></div>
	  <div id="cell54" class="tile24" onClick="clickTile(5,4);"><div class="numeroImg">24</div></div>
	  <div id="cell55" class="tile25" onClick="clickTile(5,5);"></div>
   </div>


</div>

<!-- Pantalla de informacion -->
<div class="screen">

	<p>Tiempo</p>

<div id="number"></div>
  <p>Movimientos</p>
    <div class="moves"id="moves"></div>
    <button class="button" onclick="resolver();"style="color:black;background-color:Lightblue;">Resolver</button>
    <button class="button"onClick="shuffle();"style="color:black;background-color:Lightblue;">Juego Nuevo</button>
    <button class="button show"style="color:black;background-color:Lightblue;">Numeros</button>


</div>
</div>
<!-- imagen de fondo -->
<div id="img-container"></div>


@endsection
