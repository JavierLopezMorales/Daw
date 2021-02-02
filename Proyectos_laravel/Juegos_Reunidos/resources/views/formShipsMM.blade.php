@extends('layouts.masterMM')

@section('Titulo', 'Creación de Naves')

@section('content')

    @isset($ship)
        <form action="{{ route('ships.update', ['id' => $ship->id]) }}" method="GET">
        {{-- @method("PUT") --}}
         
    @else
        <form action="{{ route('ships.store') }}" method="GET">
    @endisset
        @csrf
        Nombre de la nave:<input type="text" name="name" value="{{$ship->name ?? '' }}"><br>
        Vida:<input type="number" name="health" value="{{$ship->health ?? '' }}"><br>
        Imagen:<input type="text" name="image" value="{{$ship->image ?? '' }}"><br>
        Velocidad de ataque:<input type="number" name="atk_speed" value="{{$ship->atk_speed ?? '' }}"><br>
        Ataque:<input type="number" name="atk_damage" value="{{$ship->atk_damage ?? '' }}"><br>
        Velocidad de movimiento:<input type="number" name="speed" value="{{$ship->speed ?? '' }}"><br>
        Tipo de bala:<input type="number" name="bullet_type" value="{{$ship->bullet_type ?? '' }}"><br>
        <input type="submit">
        </form>


@endsection