@extends('layouts.masterMM')

@section('Titulo', 'Tabla de naves')

@section('sidebar')
    <h1>Juegos Reunidos - MataMarcianos</h1>
@endsection

@section('content')
    <table border="1px solid black">

        <tr>
            <th>Nombre</th>
            <th>Vida</th>
            <th>Daño</th>
            <th>Velocidad</th>
            <th>Velocidad de ataque</th>
            <th>Tipo de bala</th>
            <th colspan="2"><a href="{{route('ships.create')}}">Crear</a></th>
        </tr>

        @foreach($shipsList as $ships)

        <tr>
            <td>{{$ships -> name}}</td>
            <td>{{$ships -> health}}</td>
            <td>{{$ships -> atk_damage}}</td>
            <td>{{$ships -> speed}}</td>
            <td>{{$ships -> atk_speed}}</td>
            <td>{{$ships -> bullet_type}}</td>

            <td><a href="{{route('ships.edit', $ships->id)}}">Modificar</a></td>

            {{-- 
                Boton para borrar una nave
                --}}
            
            <td>
                <form action = "{{route('ships.destroy', $ships->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="Borrar">
                </form>
            </td>
            
        </tr>
        @endforeach

    </table>
@endsection