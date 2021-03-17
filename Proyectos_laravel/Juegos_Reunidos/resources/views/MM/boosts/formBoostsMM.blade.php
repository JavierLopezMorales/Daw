@extends('layouts.masterMM')

@section('Titulo', 'Creación de Boosts')
<link rel="stylesheet" href="{{ asset('css/cssMM/nav.css') }}" />
@section('content')



    @isset($boosts)
        <form class="form-boost" action="{{ route('boosts.update', ['id' => $boosts->id]) }}" enctype="multipart/form-data" method="POST">
         @method("PUT")
         
    @else
        <form class="form-boost" action="{{ route('boosts.store') }}"enctype="multipart/form-data" method="POST">
    @endisset
        @csrf
        
        
        <table border="1px solid black">

            <tr>
                <td>Nombre del boost:</td>
                <td><input type="text" name="name" value="{{$boosts->name ?? '' }}"></td>
            </tr>
    
            <tr>
                <td>Icono:</td>
                <td><label id="icon-lbl" for="icon-selector">Seleccionar icono</label><input id="icon-selector" type="file" name="icon" value="{{$boosts->icon ?? '' }}" style="display: none" onchange="iconSelected()"></td>
            </tr>
    
            <tr>
                <td><label id="boost-lbl" class="lbl" for="select-boost">Selector:</label></td>
                <td><select class="select-boost" name="selector" onchange="changeAmountText()">
    
                    <option value="player-speed">Velocidad del Jugador</option>
                    <option value="health">Vida</option>
                    <option value="bullet-speed">Velocidad de la Bala</option>
                    <option value="shield">invencibilidad</option>
                    <option value="double-points">Puntos dobles</option>
                    <option value="nuke">Bomba</option>
        
                </select></td>
            </tr>
    
            <tr>
                <td><label id="amount-lbl" class="lbl" for="amount">Cantidad:</label></td>
                <td><input type="number" name="amount" value="{{$boosts->amount ?? '' }}"></td>
            </tr>

            <tr>
                <td><input type="submit"></td>
                <td><a href="{{route('boosts.index')}}">Cancelar</a></td>
            </tr>
    
        </table>

        

        
        </form>

        <script>
            var selected = "{{$boosts -> selector}}";
            
            for(var x = 0; x < document.getElementsByClassName('select-boost')[0].length; x++){
                var option = document.getElementsByClassName('select-boost')[0].options;
                if(selected == option[x].value){
                    document.getElementsByClassName("select-boost")[0].selectedIndex = x;
                    changeAmountText();
                }
            }

            function changeAmountText() { 

                var seleccion = document.getElementsByClassName('select-boost')[0].options[document.getElementsByClassName("select-boost")[0].selectedIndex].value;
                if(seleccion == 'player-speed' || seleccion == 'health' || seleccion == 'bullet-speed') {
                    document.getElementById('amount-lbl').innerHTML = 'Cantidad a aumentar:';
                }
                if(seleccion == 'shield' || seleccion == 'double-points') {
                    document.getElementById('amount-lbl').innerHTML = 'Duracion:';
                }
                if(seleccion == 'nuke') {
                    document.getElementById('amount-lbl').innerHTML = 'Puntuación recibida:';
                }

            }

            function iconSelected() { 

                document.getElementById('icon-lbl').innerHTML = 'Icono seleccionado'

            }

            

            
        </script>

@endsection