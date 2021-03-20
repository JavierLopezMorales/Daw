@extends('layouts.masterST')
<link rel="stylesheet" href="{{ asset('css/cssST/CSS.css') }}" />

@section('Titulo', 'Opciones Puzzle')

@section('sidebar')
    <h1>Juegos Reunidos - Sliding Tiles</h1>


@endsection

@section('content')
<div id="container3"style="display:flex;justify-content:space-around;align-items:center;margin-top:20vh;flex-wrap:wrap;max-width:100vw;">
@foreach($tematicasList as $tematicas)

  <div class="button-tematica"style="display:flex;flex-direction:column;align-items:center;flex-wrap:wrap;">
    <img src="../../../../images/imagesST/{{$tematicas->img_fondo}}"width="300px"height="200px">
  <a href="{{ route('Juego.show', ['id' => $tematicas->id]) }}"><input type="button"class="button" value="Seleccionar"></a>
</div>

@endforeach
</div>
@endsection
