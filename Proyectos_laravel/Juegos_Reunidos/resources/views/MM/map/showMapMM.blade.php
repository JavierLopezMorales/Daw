@extends('layouts.masterMM')

@section('Titulo', 'Tabla de Mapas')

@section('content')
    <table border="1px solid black">

        <tr>
            <th>Nombre</th>
            <th>Imagen</th>
            <th colspan="2"><a href="{{route('mapMM.create')}}">Crear</a></th>
        </tr>

        @foreach($mapMMList as $mapMM)

        <tr>
            <td>{{$mapMM -> name}}</td>
            <td>{{$mapMM -> image}}</td>

            <td><a href="{{route('mapMM.edit', $mapMM->id)}}">Modificar</a></td>

            {{-- 
                Boton para borrar una nave
                --}}
            
            <td>
                <form action = "{{route('mapMM.destroy', $mapMM->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="Borrar">
                </form>
            </td>
            
        </tr>
        @endforeach

    </table>
@endsection