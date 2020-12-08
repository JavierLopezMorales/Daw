<nav class='navbar bg-dark text-white p-2 mb-5'>

    <h1>Lista de Reservas</h1>
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

echo "<table class='table text-white'>";
        
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
            echo "<td><a class='btn btn-success btn-sm' href='index.php?action=borrarReserva&id=" . $reserva->idReservation . "&direction=ControladorReservas' style='color: white; text-decoration: none;'>Borrar Reserva</a></td>";
			echo "<td><a class='btn btn-success btn-sm' href='index.php?action=modificarReserva&id=" . $reserva->idReservation . "&direction=ControladorReservas' style='color: white; text-decoration: none;'>Modificar Reserva</a></td>";
			echo "</tr>";
    }

	echo "</table>";
	
	echo "<br><p><a class='btn btn-success btn-sm' href='index.php?action=crearReservas&direction=ControladorReservas' style='color:white;'>Crear Reserva</a></p><br>";
    echo "<p><a class='btn btn-success btn-sm' href='index.php?action=inicio&direction=ControladorUsuarios' style='color:white;'>Inicio</a></p><br>";
    echo "<p><a class='btn btn-success btn-sm' href='index.php?action=mostrarReservas&direction=ControladorReservas' style='color:white;'>Volver</a></p>";

?>
</div>