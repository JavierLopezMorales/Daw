@extends('layouts.masterMM')

@section('Titulo', 'Creación de Enemigos')

@section('sidebar')
    <h1>Juegos Reunidos - MataMarcianos</h1>
@endsection

@section('content')

    @isset($enemy)
        <form action="{{ route('enemies.update', ['id' => $enemy->id]) }}" method="GET">
        {{-- @method("PUT") --}}
         
    @else
        <form action="{{ route('enemies.store') }}" method="GET">
    @endisset
        @csrf
        Nombre de la nave:<input type="text" name="name" value="{{$enemy->name ?? '' }}"><br>
        Vida:<input type="number" name="health" value="{{$enemy->health ?? '' }}"><br>
        Imagen:<input type="text" name="image" value="{{$enemy->image ?? '' }}"><br>
        Velocidad de ataque:<input type="number" name="atk_speed" value="{{$enemy->atk_speed ?? '' }}"><br>
        Ataque:<input type="number" name="atk_damage" value="{{$enemy->atk_damage ?? '' }}"><br>
        Ruta:<input type="number" name="route" value="{{$enemy->route ?? '' }}"><br>
        Tipo de bala:<input type="number" name="bullet_type" value="{{$enemy->bullet_type ?? '' }}"><br>
        <input type="submit">
        </form>


@endsection