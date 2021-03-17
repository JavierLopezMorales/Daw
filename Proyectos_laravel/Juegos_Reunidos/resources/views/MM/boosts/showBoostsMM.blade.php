@extends('layouts.masterMM')

@section('Titulo', 'Tabla de Boosts')

@section('content')
    <table border="1px solid black">

        <tr>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Icono</th>
            <th>Selector</th>
            <th colspan="2"><a href="{{route('boosts.create')}}">Crear</a></th>
        </tr>

        @foreach($boostsList as $boosts)

        <tr>
            <td>{{$boosts -> name}}</td>
            <td>{{$boosts -> amount}}</td>
            <td><img src="{{url('/images/imagesMM/icons/', $boosts -> icon)}}" style="width: 50px; background-color: black"></td>
            <td>{{$boosts -> selector}}</td>
            <td><a href="{{route('boosts.edit', $boosts->id)}}">Modificar</a></td>
            
            <td>
                <form action = "{{route('boosts.destroy', $boosts->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="Borrar">
                </form>
            </td>
            
        </tr>
        @endforeach

    </table>
@endsection