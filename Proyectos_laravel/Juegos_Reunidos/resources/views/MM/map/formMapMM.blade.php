@extends('layouts.masterMM')

@section('Titulo', 'Creación de Mapas - Matamarcianos')
<link rel="stylesheet" href="{{ asset('css/cssMM/nav.css') }}" />
@section('content')

    @isset($mapMM)
        <form action="{{ route('mapMM.update', ['id' => $mapMM->id]) }}" method="GET">
        {{-- @method("PUT") --}}
         
    @else
        <form action="{{ route('mapMM.store') }}" method="GET">
    @endisset
        @csrf
        Nombre:<input type="text" name="name" value="{{$mapMM->name ?? '' }}"><br>
        Imagen:<input type="text" name="image" value="{{$mapMM->image ?? '' }}"><br>
        <input type="submit">
        </form>


@endsection