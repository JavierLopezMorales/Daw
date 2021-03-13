@extends('layouts.masterMM')
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet"> 
<link rel="stylesheet" href="{{ asset('css/cssMM/prueba.css') }}" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="{{ asset('js/libraries/Keydown.js') }}"></script>
<script src="{{ asset('js/jsMM/index.js') }}"></script>
<script src="{{ asset('js/jsMM/playerBullet.js') }}"></script>
<script src="{{ asset('js/jsMM/player.js') }}"></script>
<script src="{{ asset('js/jsMM/enemy.js') }}"></script>



@section('Titulo', 'MataMarcianos')

@section('content')

    <div class="game-nav">

        <div class="game-title">
            SHOOT'EM UP!
        </div>

        <div class="game-info">
            <div class="score-info">
                Score: <div class="score">0</div>
            </div>
            <div class="health-info">
                Health: <div class="health">100</div>
            </div>
            <div  class="sound-info"><img src="../../images/imagesMM/volumen-bajo.png" class="sound" onclick="mute()"></img> </div>
        </div>

    </div>
    <div class="main-container">

        <div class="info">
            <div class="info-top"></div>
            <div class="info-left"></div>
            <div class="bullet-count">NUMERO DE BALAS: 0</div>
            <div class="shoot-counter"></div>
            <div class="enemy-count">NUMERO DE ENEMIGOS: 0</div>
            <div class="enemy-counter"></div>
        </div>

        <img id="player" src="../../images/imagesMM/nave1.png"></img>
        <img src="../../images/imagesMM/bullet.png" class="bullet waiting-bullet"></img>
        <div class='image'></div>

        <audio id="audioDisparo" src="../../sounds/soundMM/disparo.wav"></audio>
        <audio id="audioExplosion" src="../../sounds/soundMM/explosion.wav"></audio>
        <audio id="audioHit" src="../../sounds/soundMM/hit.wav"></audio>
        <audio id="audioMusic" src="../../sounds/soundMM/music.mp3" loop></audio>
            
        
        <div class="game-start">
              
            <div class="game-start-info">Bienvenido a SHOOT'EM UP!, para empezar pulse el ESPACIO</div>
            <div class="game-start-info">Utiliza las FLECHAS para moverte y la tecla A para disparar</div>

        </div>
        
        <div class="game-end">

            <div class="game-end-info title">FIN DE LA PARTIDA</div>
            <div class="game-end-info">Tu puntuacion es de<div class="score">0</div> </div>
            <div class="game-buttons">

                <a class="retry" href="{{route('JuegoMM.play')}}">Reintentar</a>
                <a class="acept" href="{{route('JuegoMM.play')}}">Continuar</a>

            </div>
        </div>

    </div>

@endsection
