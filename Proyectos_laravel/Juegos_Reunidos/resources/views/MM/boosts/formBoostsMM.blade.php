@extends('layouts.masterMM')

@section('Titulo', 'Creación de Boosts')

@section('content')

    @isset($boost)
        <form action="{{ route('boosts.update', ['id' => $boost->id]) }}" method="GET">
        {{-- @method("PUT") --}}
         
    @else
        <form action="{{ route('boosts.store') }}" method="GET">
    @endisset
        @csrf
        Nombre del boost:<input type="text" name="name" value="{{$boost->name ?? '' }}"><br>
        Cantidad:<input type="number" name="amount" value="{{$boost->amount ?? '' }}"><br>
        Icono:<input type="text" name="icon" value="{{$boost->icon ?? '' }}"><br>
        Selector:<input type="text" name="selector" value="{{$boost->selector ?? '' }}"><br>
        <input type="submit">
        </form>


@endsection