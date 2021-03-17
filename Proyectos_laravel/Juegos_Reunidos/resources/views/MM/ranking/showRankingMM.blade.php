@extends('layouts.masterMM')

@section('Titulo', 'Tabla de Ranking Matamarcianos')

<link rel="stylesheet" href="{{ asset('css/cssMM/nav.css') }}" />
<link rel="stylesheet" href="{{ asset('css/cssMM/form.css') }}" />

@section('content')
    <table>

        <tr>
            <th>Nombre</th>
            <th>Puntuación</th>
            <th colspan="2" class="btn"><a href="{{route('rankingMM.create')}}">Crear</a></th>
        </tr>

        @foreach($rankingList as $ranking)

        <tr>
            <td class="name">{{$ranking -> name}}</td>
            <td>{{$ranking -> score}}</td>

            <td class="btn"><a href="{{route('rankingMM.edit', $ranking->id)}}">Modificar</a></td>

            {{-- 
                Boton para borrar una nave
                --}}
            
            <td class="btn">
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