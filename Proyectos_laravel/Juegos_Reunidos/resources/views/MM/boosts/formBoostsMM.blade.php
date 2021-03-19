@extends('layouts.masterMM')

@section('Titulo', 'Creación de Boosts')
<link rel="stylesheet" href="{{ asset('css/cssMM/nav.css') }}" />
<link rel="stylesheet" href="{{ asset('css/cssMM/create-modifyBoost.css') }}" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

@section('content')



    @isset($boosts)
        <form class="form-boost" action="{{ route('boosts.update', ['id' => $boosts->id]) }}" enctype="multipart/form-data" method="POST">
         @method("PUT")

         <script>

            $(document).ready(function () {
                var selected = "{{$boosts -> selector}}";
                
                for(var x = 0; x < document.getElementsByClassName('select-boost')[0].length; x++){
                    var option = document.getElementsByClassName('select-boost')[0].options;
                    if(selected == option[x].value){
                        document.getElementsByClassName('select-boost')[0].selectedIndex = x;
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

                        document.getElementById('icon-lbl').innerHTML = 'Icono seleccionado';
                        document.getElementById('icon-lbl').style.color = '#fca311';

                    }

            });
           
            
            

        </script>
         
    @else
    
        <form class="form-boost" action="{{ route('boosts.store') }}"enctype="multipart/form-data" method="POST">

    @endisset
        @csrf
          
        <table>

            <tr>
                <th colspan="2">Bonificaciones</th>
            </tr>

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
                <td><select id="select-boost" class="select-boost" name="selector" onchange="changeAmountText()">
    
                    <option value="player-speed">Velocidad del Jugador</option>
                    <option value="health">Vida</option>
                    <option value="bullet-speed">Velocidad de la Bala</option>
                    <option value="shield">Invencibilidad</option>
                    <option value="double-points">Puntos dobles</option>
                    <option value="nuke">Bomba</option>
        
                </select></td>
            </tr>
    
            <tr>
                <td><label id="amount-lbl" class="lbl" for="amount">Cantidad a aumentar:</label></td>
                <td><input type="number" name="amount" value="{{$boosts->amount ?? '' }}"></td>
            </tr>

            <tr>
                <td class="btn"><input type="submit" value="Aceptar"></td>
                <td class="btn"><a href="{{route('boosts.index')}}">Cancelar</a></td>
            </tr>
    
        </table>
        
        </form>

        <script>

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

                    document.getElementById('icon-lbl').innerHTML = 'Icono seleccionado';
                    document.getElementById('icon-lbl').style.color = '#fca311';

                }
            
        </script>

@endsection