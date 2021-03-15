@extends('layouts.masterST')
<link rel="stylesheet" href="{{ asset('css/cssST/CSS.css') }}" />
@section('Titulo', 'Tabla de Ranking Sliding Tiles')

@section('sidebar')
    <h1>Juegos Reunidos - Sliding Tiles</h1>
    <a href="{{route('TematicasST.index')}}">Tematicas</a>
    <a href="{{route('RankingST.index')}}">Ranking</a>

@endsection

@section('content')
    <table border="1px solid black">

        <tr>
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Puntuacion</th>
            <th>Modo</th>
            <th colspan="2"><a href="{{route('RankingST.create')}}">Crear</a></th>
        </tr>

        @foreach($rankingList as $ranking)

        <tr>
            <td>{{$ranking -> name}}</td>
            <td>{{$ranking -> date}}</td>
            <td>{{$ranking -> score}}</td>
            <td>{{$ranking -> mode}}</td>

            <td><a href="{{route('RankingST.edit', $ranking->id)}}">Modificar</a></td>



            <td>
                <form action = "{{route('RankingST.destroy', $ranking->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="Borrar">
                </form>
            </td>

        </tr>
        @endforeach

    </table>
@endsection
