<link rel="stylesheet" href="./estilos/fondo.css">

<?php

    echo "<h1>Instalaciones</h1>";
		
	echo "<form action='index.php'>
			<select name='seleccion'>
                <option value='name'>Nombre</option>
                <option value='description'>Descripcion</option>
                <option value='price'>Precio</option>
			</select>
			<input type='hidden' name='action' value='buscarInstalacion'>
			<input type='hidden' name='direction' value='ControladorInstalaciones'>      
			<input type='text' name='textoBusqueda'>
			<input type='submit' value='Buscar' id='boton'>
			<button  href='index.php?action=mostrarInstalaciones' id='boton'>Limpiar</button>
		</form><br>";

		if (isset($data['msjError'])) {
			echo "<p style='color:lightcoral'>".$data['msjError']."</p>";
		}
		if (isset($data['msjInfo'])) {
			echo "<p style='color:rgb(189, 214, 247)'>".$data['msjInfo']."</p>";
		}

	

	// Muestra la tabla con los datos de los usuarios
    echo "<table border='1px solid white'>";
        
        echo "<tr style='color:white;'>";
            echo "<td>" . "Nombre" . "</td>";
            echo "<td>" . "Descripcion" . "</td>";
            echo "<td>" . "Precio" . "</td>";
        echo "</tr>";	

	foreach($data['listaInstalaciones'] as $instalaciones) {
            echo "<tr>";
			echo "<td>" . $instalaciones->name . "</td>";
			echo "<td>" . $instalaciones->description . "</td>";
			echo "<td>" . $instalaciones->price . "</td>";
			echo "<td><a href='index.php?action=borrarInstalaciones&id=" . $instalaciones->idFacility . "&direction=ControladorInstalaciones' style='color: white; text-decoration: none;'>Borrar Instalacion</a></td>";
			echo "<td><a href='index.php?action=modificarInstalaciones&id=" . $instalaciones->idFacility . "&direction=ControladorInstalaciones' style='color: white; text-decoration: none;'>Modificar Instalacion</a></td>";
			echo "</tr>";
	}
	echo "</table>";
	
	echo "<br><p><a href='index.php?action=crearUsuarios&direction=ControladorUsuarios' style='color:white;'>Crear Usuario</a></p><br>";
    echo "<p><a href='index.php?action=inicio&direction=ControladorUsuarios' style='color:white;'>Inicio</a></p>";

?>