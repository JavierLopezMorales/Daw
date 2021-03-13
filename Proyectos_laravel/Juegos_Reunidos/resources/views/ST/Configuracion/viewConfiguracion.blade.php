@extends('layouts.masterST')
<link rel="stylesheet" href="{{ asset('css/cssST/config.css') }}" />
<script src="{{ asset('js/jsST/config.js') }}"></script>
@section('Titulo', 'Opciones Puzzle')

@section('sidebar')
    <h1>Juegos Reunidos - Sliding Tiles</h1>
    <a href="{{route('TematicasST.index')}}">Tematicas</a>
    <a href="{{route('RankingST.index')}}">Ranking</a>

@endsection

@section('content')
      <div class="container">
          <div id="tematica1" class="tematica">
              <img src="{{url('images/imagesST/$name_fondo') }}">
              <h3>Alcazaba de Almeria</h3>
          </div>
          <div id="tematica2" class="tematica">
            <img src="{{url('images/imagesST/$name_fondo') }}">
            <h3>IES Celia Viñas</h3>
          </div>
          <div id="tematica3" class="tematica">
            <img src="{{url('images/imagesST/$name_fondo') }}">
            <h3>Cabo de Gata</h3>
          </div>
      </div>

@endsection
