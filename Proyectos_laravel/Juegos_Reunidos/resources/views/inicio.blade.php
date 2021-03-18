@extends('layouts.masterMM')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js"></script>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/MorphSVGPlugin.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/inicio.css') }}" />
<script src="{{ asset('js/inicio.js') }}"></script>


@section('Titulo', 'Sliding-Tiles')


@section('content')
<div class="container2">
  <div id="planet1" class="planet">
    <img src="https://images.vexels.com/media/users/3/152536/isolated/preview/401b51c3a9098f12b566121c92009877-mars-planet-icon-by-vexels.png">
    <h3>MARS</h3>
  </div>
  <div id="planet2" class="planet">
    <img src="https://images.vexels.com/media/users/3/152680/isolated/preview/22e162e0d0066ad0881e1ee797574680-uranus-planet-icon-by-vexels.png">
    <h3>URANUS</h3>
  </div>
  <div id="planet3" class="planet">
    <img src="https://images.vexels.com/media/users/3/152509/isolated/preview/e058e7f53d319e0628763c70ab7dce14-jupiter-planet-icon-by-vexels.png">
    <h3>JUPITER</h3>
  </div>
</div>

@endsection
