<link rel="stylesheet" href="./estilos/fondo.css">
<?php

echo "<table border='1px solid white'>";
        
        echo "<tr style='color:white;'>";
            echo "<td>" . "Precio" . "</td>";
            echo "<td>" . "Hora" . "</td>";
            echo "<td>" . "Fecha" . "</td>";
        echo "</tr>";	

	foreach($data['listaReservas'] as $reserva) {
            echo "<tr>";
			echo "<td>" . $reserva->price . "</td>";
			echo "<td>" . $reserva->time . "</td>";
            echo "<td>" . $reserva->date . "</td>";
            echo "<td><a href='index.php?action=borrarReserva&id=" . $reserva->idReservation . "&direction=ControladorReservas' style='color: white; text-decoration: none;'>Borrar Reserva</a></td>";
			echo "<td><a href='index.php?action=modificarReserva&id=" . $reserva->idReservation . "&direction=ControladorReservas' style='color: white; text-decoration: none;'>Modificar Reserva</a></td>";
			echo "</tr>";
    }
    
    //echo "<tr><td><a href='index.php?action=crearUsuarios&direction=ControladorUsuarios' style='color:white;'>Crear Reserva</a></td></tr>";

	echo "</table>";
	
	echo "<br><p><a href='index.php?action=crearReservas&direction=ControladorReservas' style='color:white;'>Crear Reserva</a></p><br>";
    echo "<p><a href='index.php?action=inicio&direction=ControladorUsuarios' style='color:white;'>Inicio</a></p><br>";
    echo "<p><a href='index.php?action=mostrarReservas&direction=ControladorReservas' style='color:white;'>Volver</a></p>";

?>