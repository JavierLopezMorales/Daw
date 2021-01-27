@extends('layouts.masterST')

@section('Titulo', 'Tabla de Usuarios')

@section('sidebar')
    <h1>Juegos Reunidos - Usuarios</h1>
@endsection

@section('content')
    <table border="1px solid black">

        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Password</th>
        </tr>

        @foreach($userList as $usuario)

        <tr>
            <td>{{$usuario -> name}}</td>
            <td>{{$usuario -> email}}</td>
            <td>{{$usuario -> password}}</td>
            <td></td>
            <td></td>
        </tr>
        @endforeach
    </table>
@endsection
