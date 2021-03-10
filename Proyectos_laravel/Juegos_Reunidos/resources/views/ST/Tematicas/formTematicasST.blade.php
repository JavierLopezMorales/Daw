@extends('layouts.masterST')

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
        <table>
          <tr>
            <td>Tipo de tematica:<input type="text" name="type" value="{{$tematica->type ?? '' }}"></td>
          </tr>
          <tr>
            <td>Nombre de la tematica:<input type="text" name="name" value="{{$tematica->name ?? '' }}"></td>
          </tr>
          <tr>
        <td>Descripcion:<input type="text" name="description" value="{{$tematica->description ?? '' }}"></td>
      </tr>
      <tr>
      <td>Imagen de fondo:<input  type="file" name="img_fondo" value="{{$tematica->img_fondo ?? '' }}"></td>
    </tr>
    <tr>
      <td>Imagen del puzzle:<input  type="file" name="img_puzzle" value="{{$tematica->img_puzzle ?? '' }}"></td>
    </tr>
    <tr>
      <td>Modo :<input type="text" name="modo" value="{{$tematica->modo ?? '' }}"></td>
    </tr>

        </table>
        <input type="submit">
        </form>



@endsection
