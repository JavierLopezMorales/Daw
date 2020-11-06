<link rel="stylesheet" href="./estilos/header.css">
<link rel="stylesheet" href="./estilos/inicio.css">

<?php
    echo "<div id='contenedor'><h1>Inicio</h1>";

    echo "<div id='caja'>";
    if (isset($_SESSION['idUsuario'])) {
		echo "<p>Hola, ".$_SESSION['nombre']."</p>";
		$usuario = $_SESSION['idUsuario'];
	}
    echo "<div id='enlace'>";
    echo "<p><a href='index.php?action=mostrarUsuarios'>Usuarios</a></p>";

    echo "<p><a href='index.php?action=mostrarIncidencias'>Incidencias</a></p>";

    echo "<p><a href='index.php?action=cerrarSesion'>Cerrar sesión</a></p>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
?>