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

    if (isset($_SESSION['idUser'])) {
		echo "<br><img src='./imagenes/" . $_SESSION['image'] . "' width='50px'>";
		echo "Hola, ".$_SESSION['name']."<br><br>";
	}

?>

<a href='index.php?action=cambiarImagen&direction=ControladorUsuarios' style='color:white;'>Cambiar imagen</a> <br><br>
<a href='index.php?action=mostrarUsuarios&direction=ControladorUsuarios' style='color:white;'>Lista de usuarios</a> <br><br>
<a href='index.php?action=mostrarInstalaciones&direction=ControladorInstalaciones' style='color:white;'>Lista de instalaciones</a> <br><br>
<a href='index.php?action=cerrarSesion&direction=ControladorUsuarios' style='color:white;'>Cerrar sesión</a>
