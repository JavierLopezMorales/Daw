@extends('layout.masterST')

@section('Titulo', 'Creación de Usuarios')

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
