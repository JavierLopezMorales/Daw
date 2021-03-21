@extends('layouts.masterMM')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js"></script>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/MorphSVGPlugin.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/inicio.css') }}" />
<script>

var selected;

  function centerGame1() {

    if(selected == 1){
      $('#route2').removeAttr('href');
      $('#route3').removeAttr('href');
      $('#route1').attr('href', '{{route("opciones")}}');
    }

    selected = 1;

    var tl = new TimelineMax()
    tl.to('#game1', 1, {xPercent: 0, z: 1}, 0)
    tl.to('#game2', 1, {xPercent: 140, z: -800}, 0)
    tl.to('#game3', 1, {xPercent: -140, z: -800}, 0)

  }

  function centerGame2() {

    if(selected == 2){
      $('#route1').removeAttr('href');
      $('#route3').removeAttr('href');
      $('#route2').attr('href', '{{route("JuegoMM.index")}}');
    }

    selected = 2;

    var tl = new TimelineMax()
    tl.to('#game1', 1, {xPercent: -140, z: -800}, 0)
    tl.to('#game2', 1, {xPercent: 0, z: 1}, 0)
    tl.to('#game3', 1, {xPercent: 140, z: -800}, 0);
  }

  function centerGame3() {

    if(selected == 3){
      $('#route1').removeAttr('href');
      $('#route2').removeAttr('href');
      $('#route3').attr('href', '/snake_game');
    }

    selected = 3;

    var tl = new TimelineMax()
    tl.to('#game1', 1, {xPercent: 140, z: -800}, 0)
    tl.to('#game2', 1, {xPercent: -140, z: -800}, 0)
    tl.to('#game3', 1, {xPercent: 0, z: 1}, 0);
  }


  $(function() {
    centerGame2();
  })

</script>


@section('Titulo', 'Sliding-Tiles')


@section('content')

<div class="navIndex">
  <div class="tittle">JUEGOS REUNIDOS</div>
</div>


<div class="carrousel-container">
  <div id="game1" class="game" onclick="centerGame1()">
    <a id='route1'><img src="../../images/puzzle.jpg"></a>

    <h3>SLIDING TILES</h3>
  </div>
  <div id="game2" class="game" onclick="centerGame2()">
    <a id='route2'><img src="../../images/STM.png"></a>

    <h3>SHOOT'EM UP</h3>
  </div>
  <div id="game3" class="game" onclick="centerGame3()">
    <a id='route3'><img src="../../images/SNK.jpg"></a>

    <h3>SNAKE</h3>
  </div>
</div>

<div class="footer">

</div>

@endsection
