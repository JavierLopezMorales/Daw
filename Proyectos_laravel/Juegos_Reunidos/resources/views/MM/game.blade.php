@extends('layouts.masterMM')
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet"> 
<link rel="stylesheet" href="{{ asset('css/cssMM/prueba.css') }}" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="{{ asset('js/libraries/Keydown.js') }}"></script>
<script src="{{ asset('js/jsMM/index.js') }}"></script>
<script src="{{ asset('js/jsMM/playerBullet.js') }}"></script>
<script src="{{ asset('js/jsMM/playerMovement.js') }}"></script>



@section('Titulo', 'MataMarcianos')

@section('content')

    <div class="game-nav">

        <div class="game-title">
            SHOOT'EM UP!
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
        <div class="info">
            <div class="info-top"></div>
            <div class="info-left"></div>
            <div class="bullet-count">NUMERO DE BALAS: 0</div>
            <div class="shoot-counter"></div>
        </div>
        <div id="player"></div>
        <div class='image'></div>

        <div class="enemigo-prueba"></div>
        
    </div>

@endsection
