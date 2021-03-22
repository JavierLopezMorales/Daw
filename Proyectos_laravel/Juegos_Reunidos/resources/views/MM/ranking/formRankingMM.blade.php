@extends('layouts.masterMM')



@section('Titulo', 'Ranking Shoot´em Up')
<link rel="stylesheet" href="{{ asset('css/cssMM/nav.css') }}" />
<link rel="stylesheet" href="{{ asset('css/cssMM/create-modifyBoost.css') }}" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="{{ asset('js/jsMM/ranking-form.js') }}"></script>
@section('content')



    @isset($ranking)
        <form action="{{ route('rankingMM.update', ['id' => $ranking->id]) }}" method="GET">
        {{-- @method("PUT") --}}
         
    @else
        <form action="{{ route('rankingMM.store') }}" method="GET">
    @endisset
        @csrf

        <table>

            <tr>
                <th colspan="2">Creación de Ranking</th>
            </tr>

            <tr>
                <td>Nombre:</td>
                <td><input class="name" type="text" name="name" value="{{$ranking->name ?? '' }}" placeholder="AAA"></td>
            </tr>
    
            <tr>
                <td>Puntuación:</td>
                <td><input class="number" type="number" name="score" value="{{$ranking->score ?? '0' }}" ></td>
            </tr>
    
            <tr>
                <td class="btn"><input class="btn-submit" type="submit" value="Aceptar"></td>
                <td class="btn"><a href="{{route('rankingMM.index')}}">Cancelar</a></td>
            </tr>
    
        </table>


        
        </form>


@endsection