@extends('layouts.masterMM')

@section('Titulo', 'Tabla de Boosts')
<link rel="stylesheet" href="{{ asset('css/cssMM/nav.css') }}" />
<link rel="stylesheet" href="{{ asset('css/cssMM/form.css') }}" />
@section('content')
    <table>

        <tr>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Icono</th>
            <th>Selector</th>
            <th colspan="2" class="btn"><a href="{{route('boosts.create')}}">Crear</a></th>
        </tr>

        @foreach($boostsList as $boosts)

        <tr>
            <td>{{$boosts -> name}}</td>
            <td>{{$boosts -> amount}}</td>
            <td class="icon-td"><img src="{{url('/images/imagesMM/icons/', $boosts -> icon)}}" style="width: 50px;"></td>
            <td>{{$boosts -> selector}}</td>
            <td class="btn"><a href="{{route('boosts.edit', $boosts->id)}}">Modificar</a></td>
            
            <td class="btn">
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