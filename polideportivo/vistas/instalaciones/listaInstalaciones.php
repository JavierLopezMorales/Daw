<nav class='navbar bg-dark text-white p-2 mb-5'>

    <h1>Lista de Instalaciones</h1>
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
						<option value='description'>Descripcion</option>
						<option value='price'>Precio</option>
					</select></td>
					<input type='hidden' name='action' value='buscarInstalacion'>
					<input type='hidden' name='direction' value='ControladorInstalaciones'>      
					<td><input type='text' name='textoBusqueda'></td>
					<td><input type='submit' value='Buscar' id='boton'></td>
					<td><button  href='index.php?action=mostrarInstalaciones' id='boton'>Limpiar</button></td>
				</form></tr>";


        echo "<tr style='color:white;'>";
            echo "<td>" . "Imagen" . "</td>";
            echo "<td>" . "Nombre" . "</td>";
            echo "<td>" . "Descripcion" . "</td>";
            echo "<td>" . "Precio" . "</td>";
        echo "</tr>";	

	foreach($data['listaInstalaciones'] as $instalaciones) {
            echo "<tr>";
            echo "<td><img src='./imagenes/instalaciones/" . $instalaciones->image . "' width='50px'></td>";
			echo "<td>" . $instalaciones->name . "</td>";
			echo "<td>" . $instalaciones->description . "</td>";
			echo "<td>" . $instalaciones->price . "</td>";
			echo "<td><a class='btn btn-success btn-sm' href='index.php?action=borrarInstalaciones&id=" . $instalaciones->idFacility . "&direction=ControladorInstalaciones' style='color: white; text-decoration: none;'>Borrar Instalacion</a></td>";
			echo "<td><a class='btn btn-success btn-sm' href='index.php?action=modificarInstalaciones&id=" . $instalaciones->idFacility . "&direction=ControladorInstalaciones' style='color: white; text-decoration: none;'>Modificar Instalacion</a></td>";
			echo "</tr>";
	}
	echo "</table>";
	
	echo "<br><p><a class='btn btn-success' href='index.php?action=crearInstalaciones&direction=ControladorInstalaciones''>Crear Instalacion</a></p><br>";
    echo "<p><a class='btn btn-success' href='index.php?action=inicio&direction=ControladorUsuarios'>Inicio</a></p>";

?>