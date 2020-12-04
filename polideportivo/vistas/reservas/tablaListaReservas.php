<link rel="stylesheet" href="./estilos/fondo.css">
<?php

echo "<table border='1px solid white'>";
        
        echo "<tr style='color:white;'>";
            echo "<td>" . "price" . "</td>";
            echo "<td>" . "time 1" . "</td>";
            echo "<td>" . "date 2" . "</td>";
            echo "<td>" . "idUser" . "</td>";
			echo "<td>" . "idFacility" . "</td>";
        echo "</tr>";	

	foreach($data['listaReservas'] as $reserva) {
            echo "<tr>";
			echo "<td>" . $reserva->price . "</td>";
			echo "<td>" . $reserva->time . "</td>";
			echo "<td>" . $reserva->date . "</td>";
            echo "<td>" . $reserva->idUser . "</td>";
			echo "<td>" . $reserva->idFacility . "</td>";
			echo "</tr>";
	}
	echo "</table>";
	
	echo "<br><p><a href='index.php?action=crearUsuarios&direction=ControladorUsuarios' style='color:white;'>Crear Usuario</a></p><br>";
    echo "<p><a href='index.php?action=inicio&direction=ControladorUsuarios' style='color:white;'>Inicio</a></p>";

?>