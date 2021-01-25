@extends('layouts.masterMM')

@section('Titulo', 'Tabla de naves')

@section('sidebar')
    <h1>Juegos Reunidos - MataMarcianos</h1>
@endsection

@section('content')
    <table border="1px solid black">

        <tr>
            <th>Nombre</th>
            <th>Vida</th>
            <th>Daño</th>
            <th>Velocidad</th>
            <th>Velocidad de ataque</th>
            <th>Tipo de bala</th>
        </tr>

        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th><button>Borrar</button></th>
            <th><button>Modificar</button></th>
        </tr>

    </table>
@endsection