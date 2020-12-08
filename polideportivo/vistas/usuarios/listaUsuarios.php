<nav class='navbar bg-dark text-white p-2 mb-5'>

    <h1>Lista de Usuarios</h1>
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
<?php
	// Muestra la tabla con los datos de los usuarios
		echo "<table class='table bg-dark text-white'>";
		
		if (isset($data['msjError'])) {
			echo "<tr><td>";
			echo "<div class='text-danger'>".$data['msjError']."</div>";
			echo "</td></tr>";
		}
		if (isset($data['msjInfo'])) {
			echo "<tr><td>";
			echo "<div class='text-info'>".$data['msjInfo']."</div>";
			echo "</td></tr>";
		}
			
		echo "<form action='index.php'>
			<tr><td><select name='seleccion'>
					<option value='name'>Nombre</option>
					<option value='lastname1'>Primer apellido</option>
					<option value='lastname2'>Segundo apellido</option>
					<option value='email'>Email</option>
					<option value='type'>Tipo</option>
					<option value='state'>Estado</option>
				</select></td>
				<input type='hidden' name='action' value='buscarUsuario'>
				<input type='hidden' name='direction' value='ControladorUsuarios'>      
				<td><input type='text' name='textoBusqueda'></td>
				<td><input type='submit' value='Buscar' id='boton'></td>
				<td><button  href='index.php?action=mostrarUsuario' id='boton'>Limpiar</button></td>
			</form><br>";
		
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
				echo "<td><button class='btn btn-success btn-sm' onclick='borrarUsuario(". $usuario->idUser .")'>Borrar Usuario</button></td>";

				echo "<td><a class='btn btn-success btn-sm' href='index.php?action=modificarUsuarios&id=" . $usuario->idUser . "&direction=ControladorUsuarios' style='color: white; text-decoration: none;'>Modificar Usuario</a></td>";
				echo "</tr>";
		}
		echo "</table>";
		
		echo "<br><p><a class='btn btn-success' href='index.php?action=crearUsuarios&direction=ControladorUsuarios' style='color:white;'>Crear Usuario</a></p><br>";
		echo "<p><a class='btn btn-success' href='index.php?action=inicio&direction=ControladorUsuarios' style='color:white;'>Inicio</a></p>";

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
