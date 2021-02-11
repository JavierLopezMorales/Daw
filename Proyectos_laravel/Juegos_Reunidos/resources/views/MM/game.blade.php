@extends('layouts.masterMM')
<link rel="stylesheet" href="{{ asset('css/cssMM/prueba.css') }}" />

@section('Titulo', 'MataMarcianos')

@section('content')

    <div class="game-nav">

        <div class="game-title">
            Shoot'em up
        </div>

        <div class="game-info">
            <div class="score">
                Score: 10000
            </div>
            <div class="health">
                Health: 75/100
            </div>
        </div>

    </div>
    <div class="main-container">
        <img src="{{asset('app/pruebas-imagenes/estrellas-prueba.png')}}" alt="">
    </div>
@endsection
