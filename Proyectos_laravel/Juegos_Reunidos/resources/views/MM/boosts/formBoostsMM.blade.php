@extends('layouts.masterMM')

@section('Titulo', 'Creación de Boosts')

@section('content')

    @isset($boosts)
        <form action="{{ route('boosts.update', ['id' => $boosts->id]) }}" enctype="multipart/form-data" method="POST">
         @method("PUT")
         
    @else
        <form action="{{ route('boosts.store') }}"enctype="multipart/form-data" method="POST">
    @endisset
        @csrf
        Nombre del boost:<input type="text" name="name" value="{{$boosts->name ?? '' }}"><br>
        Cantidad:<input type="number" name="amount" value="{{$boosts->amount ?? '' }}"><br>
        Icono:<input type="file" name="icon" value="{{$boosts->icon ?? '' }}"><br>
        Selector:<input type="text" name="selector" value="{{$boosts->selector ?? '' }}"><br>
        <input type="submit">
        </form>


@endsection