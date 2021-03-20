@extends('layouts.masterST')
<link rel="stylesheet" href="{{ asset('css/cssST/CSS.css') }}" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="{{ asset('js/jsST/formST.js') }}"></script>
@section('Titulo', 'Creación de Ranking - Sliding-Tiles')

@section('sidebar')
    <h1>Juegos Reunidos - Sliding-Tiles</h1>
@endsection

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
                  <td>Mode:<input type="text" class="mode"name="mode" value="{{$ranking->mode ?? '' }}"></td>
                </tr>
              </tbody>

            </table>
              <input class="button"class="btn-submit"type="submit">
          </div>

        </form>


@endsection
