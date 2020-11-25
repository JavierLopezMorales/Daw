<link rel="stylesheet" href="./estilos/fondo.css">


<h1>Pagina de Inicio</h1>
<br><br>

<?php
	if (isset($data['msjError'])) {
		echo "<p style='color:lightcoral'>".$data['msjError']."</p>";
	}
	if (isset($data['msjInfo'])) {
		echo "<p style='color:rgb(189, 214, 247)'>".$data['msjInfo']."</p>";
	}
?>

<a href='index.php?action=mostrarUsuarios' style='color:white;'>Lista de usuarios</a> <br><br>
<a href='index.php?action=cerrarSesion' style='color:white;'>Cerrar sesión</a>
