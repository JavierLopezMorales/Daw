@extends('layouts.masterMM')

@section('Titulo', 'Tabla de Ranking Matamarcianos')

@section('sidebar')
    <h1>Juegos Reunidos - MataMarcianos</h1>
    <a href="{{route('ships.index')}}">Naves</a>
    <a href="{{route('enemies.index')}}">Enemigos</a>
    <a href="{{route('rankingMM.index')}}">Ranking</a>
@endsection

@section('content')
    <table border="1px solid black">

        <tr>
            <th>Nombre</th>
            <th>Puntuacion</th>
            <th>Nivel</th>
            <th colspan="2"><a href="{{route('rankingMM.create')}}">Crear</a></th>
        </tr>

        @foreach($rankingList as $ranking)

        <tr>
            <td>{{$ranking -> name}}</td>
            <td>{{$ranking -> level}}</td>
            <td>{{$ranking -> score}}</td>

            <td><a href="{{route('rankingMM.edit', $ranking->id)}}">Modificar</a></td>

            {{-- 
                Boton para borrar una nave
                --}}
            
            <td>
                <form action = "{{route('rankingMM.destroy', $ranking->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="Borrar">
                </form>
            </td>
            
        </tr>
        @endforeach

    </table>
@endsection