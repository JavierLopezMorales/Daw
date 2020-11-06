<link rel="stylesheet" href="./estilos/header.css">
<link rel="stylesheet" href="./estilos/boton.css">
<link rel="stylesheet" href="./estilos/tabla.css">
<?php


    echo "<div id='contenedor'><h1>Usuarios</h1>";
		
	echo "<div id='caja'><form action='index.php'>
			<select name='seleccion'>
				<option value='idUsuario'>Id</option> 
				<option value='nombre'>Nombre</option>
				<option value='contraseña'>Contraseña</option>
				<option value='tipo'>Tipo</option>
				<option value='email'>Email</option>
			</select>
			<input type='hidden' name='action' value='buscarUsuarios'>
			<input type='text' name='textoBusqueda'>
			<input type='submit' value='Buscar' id='boton'>
			<button  href='index.php?action=mostrarUsuario' id='boton'>Limpiar</button>
		</form><br>";

		if (isset($data['msjError'])) {
			echo "<p style='color:lightcoral'>".$data['msjError']."</p>";
		}
		if (isset($data['msjInfo'])) {
			echo "<p style='color:rgb(189, 214, 247)'>".$data['msjInfo']."</p>";
		}



	if (count($data['mostrarUsuario']) > 0) {

	// Muestra la tabla con los datos de los usuarios
    echo "<table>";
        
        echo "<tr style='color:white'>";
            echo "<td>" . "Id" . "</td>";
            echo "<td>" . "Nombre" . "</td>";
            echo "<td>" . "Contraseña" . "</td>";
            echo "<td>" . "Tipo" . "</td>";
            echo "<td>" . "Email" . "</td>";
        echo "</tr>";	

	foreach($data['mostrarUsuario'] as $usuario) {
			echo "<tr>";
			echo "<td>" . $usuario->idUsuario . "</td>";
			echo "<td>" . $usuario->nombre . "</td>";
			echo "<td>" . $usuario->contraseña . "</td>";
			echo "<td>" . $usuario->tipo . "</td>";
            echo "<td>" . $usuario->email . "</td>";

			echo "</tr>";
	}
	echo "</table>";
	} 
	else {
		// La consulta no contiene registros
		echo "No se encontraron datos";
	}

    echo "<div id='enlaces'>";
    echo "<p><a href='index.php?action=mostrarIncidencias'>Incidencias</a></p>";

    echo "<p><a href='index.php?action=mostrarInicio'>Inicio</a></p>";

	echo "<p><a href='index.php?action=cerrarSesion'>Cerrar sesión</a></p>";
	echo "</div>";

	echo "</div>";
	echo "</div>";
?>