@extends('layout.masterST')

@section('Titulo', 'Creación de Usuarios')

@section('sidebar')
    <h1>Juegos Reunidos - Creacion de Usuarios</h1>
@endsection

@section('content')

    @isset($usuario)
        <form action="{{ route('User.update', ['id' => $usuario->id]) }}" method="GET">
        {{-- @method("PUT") --}}

    @else
        <form action="{{ route('User.store') }}" method="GET">
    @endisset
        @csrf
        Nombre de el Usuario:<input type="text" name="name" value="{{$usuario->name ?? '' }}"><br>
        Email:<input type="text" name="email" value="{{$usuario->email ?? '' }}"><br>
        Contraseña:<input type="password" name="password" value="{{$usuario->password ?? '' }}"><br>

        <input type="submit">
        </form>


@endsection
