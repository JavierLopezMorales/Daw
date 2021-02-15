@extends('layouts.masterMM')
<link rel="stylesheet" href="{{ asset('css/cssMM/prueba.css') }}" />
<script src="{{ asset('js/jsMM/prueba-movimiento.js') }}"></script>

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
        <div id="player"></div>
        <div class='image'></div>
        
    </div>
@endsection
