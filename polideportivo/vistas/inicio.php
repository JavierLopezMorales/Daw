
<nav class='navbar bg-dark text-white p-2'>

    <h1>Inicio</h1>


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
<br><br>
<div class='container bg-dark text-white text-center'>
<?php
			if (isset($data['msjError'])) {
				echo "<p class='text-danger'>".$data['msjError']."</p>";
			}
			if (isset($data['msjInfo'])) {
				echo "<p class='text-info'>".$data['msjInfo']."</p>";
			}
		?>
<table class='table table-dark text-center table-hover table-borderless'>

	<tr><td><a class='btn btn-success' href='index.php?action=mostrarUsuarios&direction=ControladorUsuarios'>Lista de usuarios</a></td></tr>
	<tr><td><a class='btn btn-success' href='index.php?action=mostrarInstalaciones&direction=ControladorInstalaciones'>Lista de instalaciones</a></td></tr>
	<tr><td><a class='btn btn-success' href='index.php?action=mostrarReservas&direction=ControladorReservas'>Lista de Reservas</a></td></tr>
	<tr><td><a class='btn btn-success' href='index.php?action=cerrarSesion&direction=ControladorUsuarios'>Cerrar sesión</a></td></tr>
	
	
	</table>

</div>