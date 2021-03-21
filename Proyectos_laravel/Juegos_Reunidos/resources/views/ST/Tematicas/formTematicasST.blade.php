@extends('layouts.masterST')
<link rel="stylesheet" href="{{ asset('css/cssST/CSS.css') }}" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@section('Titulo', 'Creación de Tematicas')

@section('sidebar')
    <h1>Juegos Reunidos - Sliding-Tiles</h1>
@endsection

@section('content')

    @isset($tematica)
        <form action="{{ route('TematicasST.update', ['id' => $tematica->id]) }}"enctype="multipart/form-data" method="POST">
    @method("PUT")
    <script>
    $(document).ready(function () {
                var selected = "{{$tematica -> modo}}";

                for(var x = 0; x < document.getElementsByClassName('selectModo')[0].length; x++){
                    var option = document.getElementsByClassName('selectModo')[0].options;
                    if(selected == option[x].value){
                        document.getElementsByClassName('selectModo')[0].selectedIndex = x;

                    }
                }
      });
</script>
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
      <td>Imagen de fondo:(La imagen debe ser 1200x800px y un archivo .jpg)<input  type="file" name="img_fondo" value="{{$tematica->img_fondo ?? '' }}"></td>
    </tr>
    <tr>
      <td>Imagen del puzzle:(La imagen debe ser 1200x800px y un archivo .jpg)<input  type="file" name="img_puzzle" value="{{$tematica->img_puzzle ?? '' }}"></td>
    </tr>
    <tr>
      <select hidden class="selectModo"name="modo" value="{{$tematica->modo ?? '' }}">
      <option value="3x3">3X3</option>
      <option value="4x4">4X4</option>
      <option value="5x5"selected>5x5</option>
    </select>
    </tr>
  </tbody>

        </table>
        <input class="button"type="submit">
      </div>

        </form>



@endsection
