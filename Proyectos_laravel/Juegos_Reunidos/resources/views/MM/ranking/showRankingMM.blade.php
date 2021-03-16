@extends('layouts.masterMM')

@section('Titulo', 'Tabla de Ranking Matamarcianos')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="{{ asset('js/jsMM/ranking-form.js') }}"></script>

@section('content')
    <table border="1px solid black">

        <tr>
            <th>Nombre</th>
            <th>Nivel</th>
            <th>Puntuación</th>
            <th colspan="2"><a href="{{route('rankingMM.create')}}">Crear</a></th>
        </tr>

        @foreach($rankingList as $ranking)

        <tr>
            <td class="name">{{$ranking -> name}}</td>
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