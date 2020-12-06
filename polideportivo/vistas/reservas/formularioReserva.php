<link rel="stylesheet" href="./estilos/fondo.css">

<?php

echo "<h1>Crear Instalacion</h1>";

if (isset($data['msjError'])) {
    echo "<p style='color:lightcoral'>".$data['msjError']."</p>";
}
if (isset($data['msjInfo'])) {
    echo "<p style='color:rgb(189, 214, 247)'>".$data['msjInfo']."</p>";
}

if(!isset($data['listaReservas'])){
    echo "<form action = 'index.php' method = 'get'>
        <label for='price'>Precio:</label><input type='number' name='price'><br><br>
        <label for='time'>Hora:</label><input type='time' name='time' min='08:00' max='22:00'><br><br> 
        <label for='date'>Dia:</label><input type='date' name='date'><br><br>
        <label for='duration'>Duracion:</label><input type='number' name='duration'><br><br>
        <label for='idUser'>Usuario:</label><input type='number' name='idUser'><br><br> 
        <label for='idFacility'>Instalacion:</label><input type='text' name='idFacility'><br><br>";
        echo "  <input type='hidden' name='action' value='insertarReservas'>
        <input type='hidden' name='direction' value='ControladorReservas'>
            <input type='submit' id='boton' value='Aceptar'>
          </form>";
}else{
foreach($data['listaReservas'] as $reserva)
    echo "<form enctype='multipart/form-data' action = 'index.php' method = 'POST'>
                <input type='hidden' name='idReservation' value='" . $reserva->idReservation . "'>
                <label for='price'>Precio:</label><input type='number' name='price' value ='" . $reserva->price . "'><br><br>
                <label for='time'>Hora:</label><input type='time' name='time' min='08:00' max='22:00' value = '" . $reserva->time . "'><br><br> 
                <label for='date'>Dia:</label><input type='date' name='date' value='" . $reserva->date . "'><br><br>
                <label for='duration'>Duracion:</label><input type='number' name='duration' value='" . $reserva->duration . "'><br><br>
                <input type='hidden' name='idUser' value='" . $reserva->idUser . "'><br><br> 
                <label for='idFacility'>Instalacion:</label><input type='text' name='idFacility' value='" . $reserva->idFacility . "'><br><br>";
                echo "  <input type='hidden' name='action' value='modificacionReserva'>
                <input type='hidden' name='direction' value='ControladorReservas'>
                    <input type='submit' id='boton' value='Aceptar'>
          </form>";
}

echo "<p><a href='index.php?action=mostrarReservas&direction=ControladorReservas'>Volver</a></p>";
