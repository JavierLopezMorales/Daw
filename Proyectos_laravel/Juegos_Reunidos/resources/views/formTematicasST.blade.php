@extends('layouts.masterST')

@section('Titulo', 'Creación de Tematicas')

@section('sidebar')
    <h1>Juegos Reunidos - Sliding-Tiles</h1>
@endsection

@section('content')

    @isset($ship)
        <form action="{{ route('TematicasST.update', ['id' => $tematica->id]) }}" method="GET">
        {{-- @method("PUT") --}}

    @else
        <form action="{{ route('tematica.store') }}" method="GET">
    @endisset
        @csrf
        Tipo de tematica:<input type="text" name="type" value="{{$tematica->type ?? '' }}"><br>
        Nombre de la tematica:<input type="text" name="name" value="{{$tematica->name ?? '' }}"><br>
        Descripcion:<input type="text" name="description" value="{{$tematica->description ?? '' }}"><br>
        Imagen de fondo:<input type="" name="img_fondo" value="{{$tematica->img_fondo ?? '' }}"><br>
        IMagen del puzzle:<input type="" name="img_puzzle" value="{{$tematica->img_puzzle ?? '' }}"><br>
        
        <input type="submit">
        </form>


@endsection
