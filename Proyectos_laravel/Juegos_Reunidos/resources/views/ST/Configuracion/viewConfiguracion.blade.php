@extends('layouts.masterST')
<link rel="stylesheet" href="{{ asset('css/cssST/CSS.css') }}" />
<link rel="stylesheet" href="{{ asset('css/cssST/config.css') }}" />
<script src="{{ asset('js/jsST/config.js') }}"></script>

@section('Titulo', 'Opciones Puzzle')

@section('sidebar')
    <h1>Juegos Reunidos - Sliding Tiles</h1>
    <a href="{{route('TematicasST.index')}}">Tematicas</a>
    <a href="{{route('RankingST.index')}}">Ranking</a>

@endsection

@section('content')
<div id="container">
  <div class="button-tematica">
    <img src="../../../../images/imagesST/celia.jpg"width="450px"height="300px"alt="imagen-tematica">
    <a href="{{route('TematicasST.show')}}" alt="boton">Seleccionar</a>
  </div>
      <div class="button-tematica">
        <img src="../../../../images/imagesST/alcazaba.jpg"width="450px"height="300px"alt="imagen-tematica">
        <a href="{{route('TematicasST.show')}}" alt="boton">Seleccionar</a>
      </div>


    </div>



@endsection
