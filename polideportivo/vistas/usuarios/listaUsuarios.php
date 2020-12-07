<!DOCTYPE html>
<html lang="en">
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Gestión de biblioteca - Un ejemplo de aplicación web</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" href="./estilos/fondo.css">
</head>
<body>

	<?php

		echo "<h1>Usuarios</h1>";
			
		echo "<form action='index.php'>
				<select name='seleccion'>
					<option value='name'>Nombre</option>
					<option value='lastname1'>Primer apellido</option>
					<option value='lastname2'>Segundo apellido</option>
					<option value='email'>Email</option>
					<option value='type'>Tipo</option>
					<option value='state'>Estado</option>
				</select>
				<input type='hidden' name='action' value='buscarUsuario'>
				<input type='hidden' name='direction' value='ControladorUsuarios'>      
				<input type='text' name='textoBusqueda'>
				<input type='submit' value='Buscar' id='boton'>
				<button  href='index.php?action=mostrarUsuario' id='boton'>Limpiar</button>
			</form><br>";

			if (isset($data['msjError'])) {
				echo "<p style='color:lightcoral' id='msjError'>".$data['msjError']."</p>";
			}
			if (isset($data['msjInfo'])) {
				echo "<p style='color:rgb(189, 214, 247)' id='msjInfo'>".$data['msjInfo']."</p>";
			}

		

		// Muestra la tabla con los datos de los usuarios
		echo "<table border='1px solid white'>";
			
			echo "<tr style='color:white;'>";
				echo "<td>" . "Nombre" . "</td>";
				echo "<td>" . "Apellido 1" . "</td>";
				echo "<td>" . "Apellido 2" . "</td>";
				echo "<td>" . "Email" . "</td>";
				echo "<td>" . "Tipo" . "</td>";
				echo "<td>" . "Estado" . "</td>";
			echo "</tr>";	

		foreach($data['mostrarUsuario'] as $usuario) {
				echo "<tr id='idUser". $usuario->idUser ."'>";
				echo "<td>" . $usuario->name . "</td>";
				echo "<td>" . $usuario->lastname1 . "</td>";
				echo "<td>" . $usuario->lastname2 . "</td>";
				echo "<td>" . $usuario->email . "</td>";
				echo "<td>" . $usuario->type . "</td>";
				echo "<td>" . $usuario->state . "</td>";
				echo "<td><button onclick='borrarUsuario(". $usuario->idUser .")'>Borrar Usuario</button></td>";
				//echo "<td><a href='index.php?action=borrarUsuarios&id=" . $usuario->idUser . "&direction=ControladorUsuarios' style='color: white; text-decoration: none;'>Borrar Usuario</a></td>";
				echo "<td><a href='index.php?action=modificarUsuarios&id=" . $usuario->idUser . "&direction=ControladorUsuarios' style='color: white; text-decoration: none;'>Modificar Usuario</a></td>";
				echo "</tr>";
		}
		echo "</table>";
		
		echo "<br><p><a href='index.php?action=crearUsuarios&direction=ControladorUsuarios' style='color:white;'>Crear Usuario</a></p><br>";
		echo "<p><a href='index.php?action=inicio&direction=ControladorUsuarios' style='color:white;'>Inicio</a></p>";

	?>

	<script>
	
		function borrarUsuario(idUser)
		{
			if(confirm('¿Borrar usuario?'))
			{
				peticion = new XMLHttpRequest();
				peticion.onreadystatechange = procesarRespuesta;
				peticion.open('GET', 'index.php?action=borrarUsuarios&direction=ControladorUsuarios&id=' + idUser, true);
				peticion.send(null);
			}
		}

		function procesarRespuesta() {
            if(peticion.readyState == 4) {
                if(peticion.status == 200) {
					idUser = peticion.responseText;
                    if (peticion.responseText == '0')
                    {
                        document.getElementById('msjError').innerHTML = "Error, no se ha podido borrar el usuario";
                    }
					else
                    {
                        document.getElementById('msjInfo').innerHTML = "Usuario borrado con exito";
						document.getElementById('idUser' + idUser).remove();
                    }

                }

            }
        }	

	</script>

</body>
</html>
