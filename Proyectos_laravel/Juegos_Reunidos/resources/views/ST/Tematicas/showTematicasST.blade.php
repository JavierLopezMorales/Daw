@extends('layouts.masterST')

@section('Titulo', 'Tabla de Tematicas')

@section('sidebar')
    <h1>Juegos Reunidos - Sliding Tiles</h1>
    <a href="{{route('TematicasST.index')}}">Tematicas</a>
    <a href="{{route('RankingST.index')}}">Ranking</a>
@endsection

@section('content')
    <table border="1px solid black">

        <tr>
            <th>Tipo</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Imagen de fondo</th>
            <th>Imagen de puzzle</th>
            <th colspan="2"><a href="{{route('TematicasST.create')}}">Crear</a></th>
        </tr>

        @foreach($tematicasList as $tematicas)

        <tr>
            <td>{{$tematicas -> type}}</td>
            <td>{{$tematicas -> name}}</td>
            <td>{{$tematicas -> description}}</td>
            <td>{{$tematicas -> img_fondo}}</td>
            <td>{{$tematicas -> img_puzzle}}</td>

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
