@extends('layouts.masterMM')

@section('Titulo', 'Tabla de Enemigos')


@section('content')
    <table border="1px solid black">

        <tr>
            <th>Nombre</th>
            <th>Vida</th>
            <th>Daño</th>
            <th>Ruta</th>
            <th>Velocidad de ataque</th>
            <th>Tipo de bala</th>
            <th colspan="2"><a href="{{route('enemies.create')}}">Crear</a></th>
        </tr>

        @foreach($enemiesList as $enemies)

        <tr>
            <td>{{$enemies -> name}}</td>
            <td>{{$enemies -> health}}</td>
            <td>{{$enemies -> atk_damage}}</td>
            <td>{{$enemies -> route}}</td>
            <td>{{$enemies -> atk_speed}}</td>
            <td>{{$enemies -> bullet_type}}</td>

            <td><a href="{{route('enemies.edit', $enemies->id)}}">Modificar</a></td>

            {{-- 
                Boton para borrar una nave
                --}}
            
            <td>
                <form action = "{{route('enemies.destroy', $enemies->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="Borrar">
                </form>
            </td>
            
        </tr>
        @endforeach

    </table>
@endsection