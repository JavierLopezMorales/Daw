<nav class='navbar bg-dark text-white p-2 mb-5'>

    <h1>Formulario Reservas</h1>
	<?php
	    if (isset($_SESSION['idUser'])) {
			echo "<div class='media bg-light text-dark p-1'>";
			echo "<div>";
			echo "<img src='./imagenes/usuarios/" . $_SESSION['image'] . "' width='50px' class='rounded-circle border border-dark'>";
			echo "</div>";
			echo "<div class='text-center'>".$_SESSION['name']."</div>";
			echo "</div>";

		}
	?>
</nav>
<div class='container text-center bg-dark text-white p-3'>
<?php


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
            <input class='btn btn-success btn-sm' type='submit' id='boton' value='Aceptar'><br><br>
          </form>";
}else{
foreach($data['listaReservas'] as $reserva)
    echo "<form enctype='multipart/form-data' action = 'index.php' method = 'POST'>
                <input type='hidden' name='idReservation' value='" . $reserva->idReservation . "'>
                <label for='price'>Precio:</label><input type='number' name='price' value ='" . $reserva->price . "'><br><br>
                <label for='time'>Hora:</label><input type='time' name='time' min='08:00' max='22:00' value = '" . $reserva->time . "'><br><br> 
                <label for='date'>Dia:</label><input type='date' name='date' value='" . $reserva->date . "'><br><br>
                <label for='duration'>Duracion:</label><input type='number' name='duration' value='" . $reserva->duration . "'><br><br>
                <input type='hidden' name='idUser' value='" . $reserva->idUser . "'>
                <label for='idFacility'>Instalacion:</label><input type='text' name='idFacility' value='" . $reserva->idFacility . "'><br><br>";
                echo "  <input type='hidden' name='action' value='modificacionReserva'>
                <input type='hidden' name='direction' value='ControladorReservas'>
                    <input class='btn btn-success btn-sm' type='submit' id='boton' value='Aceptar'><br><br>
          </form>";
}

echo "<p><a class='btn btn-success btn-sm' href='index.php?action=mostrarReservas&direction=ControladorReservas'>Volver</a></p>";
