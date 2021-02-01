@extends('layouts.masterMM')

@section('Titulo', 'Creación de Ranking - Matamarcianos')

@section('sidebar')
    <h1>Juegos Reunidos - MataMarcianos</h1>
@endsection

@section('content')

    @isset($ranking)
        <form action="{{ route('rankingMM.update', ['id' => $ranking->id]) }}" method="GET">
        {{-- @method("PUT") --}}
         
    @else
        <form action="{{ route('rankingMM.store') }}" method="GET">
    @endisset
        @csrf
        Nombre:<input type="text" name="name" value="{{$ranking->name ?? '' }}"><br>
        Puntuacion:<input type="number" name="score" value="{{$ranking->score ?? '' }}"><br>
        Nivel:<input type="number" name="level" value="{{$ranking->level ?? '' }}"><br>
        <input type="submit">
        </form>


@endsection