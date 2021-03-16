@extends('layouts.masterST')
<link rel="stylesheet" href="{{ asset('css/cssST/CSS.css') }}" />
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
              <table>
                <tbody>
                <tr>
                  <td>Name:<input type="text" name="name" value="{{$ranking->name ?? '' }}"></td>
                </tr>
                <tr>
                  <td>Movimientos:<input type="number" name="moves" value="{{$ranking->moves ?? '' }}"></td>
                </tr>
                <tr>
                  <td>Date:<input type="date" name="date" value="{{$ranking->date ?? '' }}"></td>
                </tr>
                <tr>
                  <td>Mode:<input type="number" name="mode" value="{{$ranking->mode ?? '' }}"></td>
                </tr>
              </tbody>

            </table>
              <input class="button"type="submit">
          </div>

        </form>


@endsection
