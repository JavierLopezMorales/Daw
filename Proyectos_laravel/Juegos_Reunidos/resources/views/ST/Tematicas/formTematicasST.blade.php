@extends('layouts.masterST')
<link rel="stylesheet" href="{{ asset('css/cssST/CSS.css') }}" />
@section('Titulo', 'Creación de Tematicas')

@section('sidebar')
    <h1>Juegos Reunidos - Sliding-Tiles</h1>
@endsection

@section('content')

    @isset($tematica)
        <form action="{{ route('TematicasST.update', ['id' => $tematica->id]) }}"enctype="multipart/form-data" method="POST">
    @method("PUT")

    @else
        <form action="{{ route('TematicasST.store') }}"enctype="multipart/form-data" method="POST">
    @endisset
        @csrf
        <div class="container2">
            <table border="3px solid black">

          <tbody>
          <tr>
            <td>Tipo de imagen:<input type="text" name="type" value="{{$tematica->type ?? '' }}"></td>
          </tr>
          <tr>
            <td>Nombre de la imagen:<input type="text" name="name" value="{{$tematica->name ?? '' }}"></td>
          </tr>
          <tr>
        <td>Descripcion:<input type="text" name="description" value="{{$tematica->description ?? '' }}"></td>
      </tr>
      <tr>
      <td>Imagen de fondo:(La imagen debe ser 1200x800 px)<input  type="file" name="img_fondo" value="{{$tematica->img_fondo ?? '' }}"></td>
    </tr>
    <tr>
      <td>Imagen del puzzle:(La imagen debe ser 1200x800 px)<input  type="file" name="img_puzzle" value="{{$tematica->img_puzzle ?? '' }}"></td>
    </tr>
    <tr>
      <td>Modo :<input type="number" name="modo" value="{{$tematica->modo ?? '' }}"></td>
    </tr>
  </tbody>

        </table>
        <input class="button"type="submit">
      </div>

        </form>



@endsection
