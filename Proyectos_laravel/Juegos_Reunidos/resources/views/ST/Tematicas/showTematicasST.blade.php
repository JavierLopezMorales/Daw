@extends('layouts.masterST')
<link rel="stylesheet" href="{{ asset('css/cssST/CSS.css') }}" />
@section('Titulo', 'Tabla de Tematicas')

@section('sidebar')
<nav>
  <a href="#">Inicio</a>
  <a href="{{route('TematicasST.index')}}">Tematica</a>
  <a href="{{route('RankingST.index')}}">Ranking</a>
  <a href="{{route('RankingST.show')}}">Opciones</a>
  <a href="{{route('TematicasST.show')}}">(Juego de momento)</a>
  <div class="animation start-home"></div>
</nav>

@endsection

@section('content')
    <table border="1px solid black">

        <tr>
            <th>Tipo</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Imagen de fondo</th>
            <th>Imagen de puzzle</th>
            <th>Modo</th>
            <th colspan="2"><a href="{{route('TematicasST.create')}}">Crear</a></th>
        </tr>

        @foreach($tematicasList as $tematicas)

        <tr>
            <td>{{$tematicas -> type}}</td>
            <td>{{$tematicas -> name}}</td>
            <td>{{$tematicas -> description}}</td>
            <td><img src="images/imagesST/{{$tematicas -> img_fondo}}"width="150px"height="100px"></td>
            <td><img src="images/imagesST/{{$tematicas -> img_puzzle}}"width="150px"height="100px"></td>
            <td>{{$tematicas -> modo}}</td>


            <td><a href="{{route('TematicasST.edit', $tematicas->id)}}">Modificar</a></td>

            {{--
                Boton para borrar una tematica
                --}}

            <td>
                <form action = "{{route('TematicasST.destroy', $tematicas->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="Borrar">
                </form>
            </td>

        </tr>
        @endforeach

    </table>
@endsection
