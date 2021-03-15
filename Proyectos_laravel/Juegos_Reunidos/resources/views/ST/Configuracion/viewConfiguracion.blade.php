@extends('layouts.masterST')
<link rel="stylesheet" href="{{ asset('css/cssST/CSS.css') }}" />
<script src="{{ asset('js/jsST/config.js') }}"></script>

@section('Titulo', 'Opciones Puzzle')

@section('sidebar')
    <h1>Juegos Reunidos - Sliding Tiles</h1>
    <a href="{{route('TematicasST.index')}}">Tematicas</a>
    <a href="{{route('RankingST.index')}}">Ranking</a>

@endsection

@section('content')
<div id="container2">
  <div class="button-tematica">
    <img src="../../../../images/imagesST/celia.jpg"width="450px"height="300px"alt="imagen-tematica">

  </div>
  <a href="{{route('TematicasST.show')}}"><input type="button"class="button" value="Seleccionar"></a>
      <div class="button-tematica">
        <img src="../../../../images/imagesST/alcazaba.jpg"width="450px"height="300px"alt="imagen-tematica">

      </div>
      <a href="{{route('TematicasST.show')}}"><input type="button"class="button" value="Seleccionar"></a>


    </div>



@endsection
