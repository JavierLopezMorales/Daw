@extends('layouts.masterST')

@section('Titulo', 'Tabla de Ranking Sliding Tiles')

@section('sidebar')
    <h1>Juegos Reunidos - Sliding Tiles</h1>
    <a href="{{route('TematicasST.index')}}">Tematicas</a>
    <a href="{{route('RankingSt.index')}}">Ranking</a>

@endsection

@section('content')
    <table border="1px solid black">

        <tr>
            <th>Fecha</th>
            <th>Puntuacion</th>
            <th>Modo</th>
            <th colspan="2"><a href="{{route('rankingST.create')}}">Crear</a></th>
        </tr>

        @foreach($rankingList as $ranking)

        <tr>
            <td>{{$ranking -> date}}</td>
            <td>{{$ranking -> score}}</td>
            <td>{{$ranking -> mode}}</td>

            <td><a href="{{route('rankingST.edit', $ranking->id)}}">Modificar</a></td>



            <td>
                <form action = "{{route('rankingST.destroy', $ranking->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="Borrar">
                </form>
            </td>

        </tr>
        @endforeach

    </table>
@endsection
