@extends('layouts.masterST')
<link rel="stylesheet" href="{{ asset('css/cssST/CSS.css') }}" />
<script src="{{ asset('js/jsST/javascript.js') }}"></script>

@section('Titulo', 'Sliding-Tiles')

@section('content')
<script>

document.addEventListener("DOMContentLoaded", function () {
  var fondo = document.getElementById("img-container");
  fondo.style.backgroundImage="url({{url('images/imagesST',$name_fondo)}})";

  @for ($i=1;$i<26;$i++)
  var puzzle =  document.getElementsByClassName("tile" + {{$i}})[0];
  puzzle.style.backgroundImage="url({{url('images/imagesST',$name_puzzle)}})";
  @endfor

});

</script>


<br>
<br>
<center>
  <div id="puzzle-contenedor">
<div id="table" style="display: inline-table;">
   <div id="row1" style="display: table-row;">
      <div id="cell11" class="tile1" onClick="clickTile(1,1);"></div>
      <div id="cell12" class="tile2" onClick="clickTile(1,2);"></div>
      <div id="cell13" class="tile3" onClick="clickTile(1,3);"></div>
	  <div id="cell14" class="tile4" onClick="clickTile(1,4);"></div>
	  <div id="cell15" class="tile5" onClick="clickTile(1,5);"></div>
   </div>
   <div id="row2" style="display: table-row;">
      <div id="cell21" class="tile6" onClick="clickTile(2,1);"></div>
      <div id="cell22" class="tile7" onClick="clickTile(2,2);"></div>
      <div id="cell23" class="tile8" onClick="clickTile(2,3);"></div>
	  <div id="cell24" class="tile9" onClick="clickTile(2,4);"></div>
	  <div id="cell25" class="tile10" onClick="clickTile(2,5);"></div>
   </div>
   <div id="row3" style="display: table-row;">
      <div id="cell31" class="tile11" onClick="clickTile(3,1);"></div>
      <div id="cell32" class="tile12" onClick="clickTile(3,2);"></div>
      <div id="cell33" class="tile13" onClick="clickTile(3,3);"></div>
	  <div id="cell34" class="tile14" onClick="clickTile(3,4);"></div>
	  <div id="cell35" class="tile15" onClick="clickTile(3,5);"></div>
   </div>
   <div id="row4" style="display: table-row;">
      <div id="cell41" class="tile16" onClick="clickTile(4,1);"></div>
      <div id="cell42" class="tile17" onClick="clickTile(4,2);"></div>
      <div id="cell43" class="tile18" onClick="clickTile(4,3);"></div>
	  <div id="cell44" class="tile19" onClick="clickTile(4,4);"></div>
	  <div id="cell45" class="tile20" onClick="clickTile(4,5);"></div>
   </div>
   <div id="row5" style="display: table-row;">
      <div id="cell51" class="tile21" onClick="clickTile(5,1);"></div>
      <div id="cell52" class="tile22" onClick="clickTile(5,2);"></div>
      <div id="cell53" class="tile23" onClick="clickTile(5,3);"></div>
	  <div id="cell54" class="tile24" onClick="clickTile(5,4);"></div>
	  <div id="cell55" class="tile25" onClick="clickTile(5,5);"></div>
   </div>


</div>

<div class="screen">

	<p>Tiempo</p>

<div id="number"></div>
  <p>Movimientos</p>
    <div id="moves"></div>

    <button onClick="temporizador(false);shuffle();">New Game</button>
  	<button onClick="Comprobar();">Comprobar</button>
</div>
</div>



<div id="img-container"></div>





@endsection
