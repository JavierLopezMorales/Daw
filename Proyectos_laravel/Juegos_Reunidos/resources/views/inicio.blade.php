@extends('layouts.masterMM')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js"></script>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/MorphSVGPlugin.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/inicio.css') }}" />
<script src="{{ asset('js/inicio.js') }}"></script>


@section('Titulo', 'Sliding-Tiles')


@section('content')

<div class="navIndex">
  <div class="tittle">JUEGOS REUNIDOS</div>
</div>


<div class="carrousel-container">
  <div id="game1" class="game" onclick="centerGame1()">
    <img src="../../images/puzzle.jpg">
    <h3>SLIDING TILES</h3>
  </div>
  <div id="game2" class="game" onclick="centerGame2()">
    <img src="../../images/STM.png">
    <h3>SHOOT'EM UP</h3>
  </div>
  <div id="game3" class="game" onclick="centerGame3()">
    <img src="../../images/STM.png">
    <h3>SNAKE</h3>
  </div>
</div>

<div class="footer">

</div>

@endsection
