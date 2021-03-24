@extends('layouts.masterST')
<link rel="stylesheet" href="{{ asset('css/cssST/CSS.css') }}" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="{{ asset('js/jsST/formST.js') }}"></script>
@section('Titulo', 'Creación de Ranking - Sliding-Tiles')

@section('sidebar')
    <h1>Juegos Reunidos - Sliding-Tiles</h1>
@endsection
<!--Vista de formulario Ranking -->
@section('content')

    @isset($ranking)
        <form action="{{ route('RankingST.update', ['id' => $ranking->id]) }}" method="POST">
    @method("PUT")

    @else
        <form action="{{ route('RankingST.store') }}" method="POST">
    @endisset
        @csrf
        <div class="container2">
            <table border="3px solid black">

                <tbody>
                <tr>
                  <td>Name:<input type="text"class="name" name="name" value="{{$ranking->name ?? '' }}"></td>
                </tr>
                <tr>
                  <td>Movimientos:<input type="number"class="moves" name="moves" value="{{$ranking->moves ?? '' }}"></td>
                </tr>
                <tr>
                  <select hidden class="selectModo"name="modo" value="{{$ranking->modo ?? '' }}">
                  <option value="3x3">3X3</option>
                  <option value="4x4">4X4</option>
                  <option value="5x5"selected>5x5</option>
                </select>
                </tr>
              </tbody>

            </table>
              <input class="button"class="btn-submit"type="submit">
          </div>

        </form>


@endsection
