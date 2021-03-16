@extends('layouts.masterST')
<link rel="stylesheet" href="{{ asset('css/cssST/CSS.css') }}" />
@section('Titulo', 'Tabla de Ranking Sliding Tiles')

@section('sidebar')
    <h1>Juegos Reunidos - Sliding Tiles</h1>


@endsection

@section('content')
<div class="container2">
    <table border="3px solid black">
<thead>
        <tr>
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Movimientos</th>
            <th>Modo</th>
            <th colspan="2"><a href="{{route('RankingST.create')}}"><input type="button"class="button" value="Crear"></a></th>
        </tr>
</thead>
        @foreach($rankingList as $ranking)
<tbody>
        <tr>
            <td>{{$ranking -> name}}</td>
            <td>{{$ranking -> date}}</td>
            <td>{{$ranking -> moves}}</td>
            <td>{{$ranking -> mode}}</td>

            <td><a href="{{route('RankingST.edit', $ranking->id)}}"><input type="button"class="button" value="Modificar"></a></td>



            <td>
                <form action = "{{route('RankingST.destroy', $ranking->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input class="button"type="submit" value="Borrar">
                </form>
            </td>

        </tr>
        @endforeach
</tbody>
    </table>
  </div>
@endsection
