@extends('layouts.masterST')

@section('Titulo', 'Creación de Ranking - Sliding-Tiles')

@section('sidebar')
    <h1>Juegos Reunidos - Sliding-Tiles</h1>
@endsection

@section('content')

    @isset($ranking)
        <form action="{{ route('rankingST.update', ['id' => $ranking->id]) }}" method="GET">
        {{-- @method("PUT") --}}

    @else
        <form action="{{ route('rankingST.store') }}" method="GET">
    @endisset
        @csrf
        Score:<input type="numer" name="score" value="{{$ranking->score ?? '' }}"><br>
        Date:<input type="date" name="date" value="{{$ranking->date ?? '' }}"><br>
        Mode:<input type="number" name="mode" value="{{$ranking->mode ?? '' }}"><br>
        <input type="submit">
        </form>


@endsection
