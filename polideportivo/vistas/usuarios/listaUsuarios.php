<link rel="stylesheet" href="./estilos/fondo.css">

<?php

    echo "<h1>Usuarios</h1>";
		
	echo "<form action='index.php'>
			<select name='seleccion'>
                <option value='name'>Nombre</option>
                <option value='lastname1'>Primer apellido</option>
                <option value='lastname2'>Segundo apellido</option>
				<option value='password'>Contraseña</option>
				<option value='email'>Email</option>
			</select>
			<input type='hidden' name='action' value='buscarUsuario'>
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

	

	// Muestra la tabla con los datos de los usuarios
    echo "<table>";
        
        echo "<tr style='color:white;'>";
            echo "<td>" . "Id" . "</td>";
            echo "<td>" . "Nombre" . "</td>";
            echo "<td>" . "Apellido 1" . "</td>";
            echo "<td>" . "Apellido 2" . "</td>";
            echo "<td>" . "Contraseña" . "</td>";
            echo "<td>" . "Email" . "</td>";
            echo "<td>" . "Tipo" . "</td>";
        echo "</tr>";	

	foreach($data['mostrarUsuario'] as $usuario) {
            echo "<tr>";
            echo "<td>" . $usuario->idUser . "</td>";
			echo "<td>" . $usuario->name . "</td>";
			echo "<td>" . $usuario->lastname1 . "</td>";
			echo "<td>" . $usuario->lastname2 . "</td>";
			echo "<td>" . $usuario->password . "</td>";
            echo "<td>" . $usuario->email . "</td>";
            echo "<td>" . $usuario->type . "</td>";
            echo "<td><a href='index.php?action=borrarUsuarios&id=" . $usuario->idUser . "'>Borrar Usuario</a></td>";
			echo "</tr>";
	}
	echo "</table>";
	
	echo "<p><a href='index.php?action=crearUsuarios' style='color:white; border: solid 1px white;'>Crear Usuario</a></p><br>";
    echo "<p><a href='index.php?action=inicio' style='color:white; border: solid 1px white;'>Inicio</a></p>";

?>