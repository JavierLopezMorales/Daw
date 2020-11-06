<link rel="stylesheet" href="./estilos/header.css">
<link rel="stylesheet" href="./estilos/boton.css">
<link rel="stylesheet" href="./estilos/tabla.css">

<?php

    echo "<div id='contenedor'><h1>Incidencias</h1>";

	echo "<div id='caja'><form action='index.php'>
			<select name='seleccion'>
				<option value='id_incidencia'>Id</option> 
				<option value='descripcion'>Descripcion</option>
				<option value='equipo_afectado'>Equipo afectado</option>
				<option value='fecha'>Fecha</option>
				<option value='estado'>Estado</option>
				<option value='observacion'>Observacion</option>
				<option value='prioridad'>Prioridad</option>
				<option value='id_usuario'>Usuario</option>
  			</select>
			<input type='hidden' name='action' value='buscarIncidencias'>
           	<input type='text' name='textoBusqueda'>
			<input type='submit' value='Buscar' id='boton'>
			<button  href='index.php?action=mostrarIncidencias' id='boton'>Limpiar</button>
          </form><br>";

		if (isset($_SESSION['idUsuario'])) {
			$usuario = $_SESSION['idUsuario'];
			$tipo =	$_SESSION['tipo'];
		}
		// Mostramos mensaje de error o de información (si hay alguno)
			if (isset($data['msjError'])) {
				echo "<p style='color:lightcoral'>".$data['msjError']."</p><br>";
			}
			if (isset($data['msjInfo'])) {
				echo "<p style='color:rgb(189, 214, 247)'>".$data['msjInfo']."</p><br>";
			}
		

		

	if (count($data['listaIncidencias']) > 0) {

	// Ahora, la tabla con los datos de las incidencias
	echo "<table>";

		echo "<tr style='color:white'>";
			echo "<td>" . "Id" . "</td>";
			echo "<td>" . "Descripcion" . "</td>";
			echo "<td>" . "Equipo afectado" . "</td>";
			echo "<td>" . "Fecha" . "</td>";
			echo "<td>" . "Estado" . "</td>";
			echo "<td>" . "Observacion" . "</td>";
			echo "<td>" . "Prioridad" . "</td>";
			echo "<td>" . "Usuario" . "</td>";
		echo "</tr>";	

	foreach($data['listaIncidencias'] as $incidencias) {
			echo "<tr>";
			echo "<td>" . $incidencias->id_incidencia . "</td>";
			echo "<td><div style='overflow-x:scroll; width:200px'>" . $incidencias->descripcion . "</div></td>";
			echo "<td>" . $incidencias->equipo_afectado . "</td>";
			echo "<td>" . $incidencias->fecha . "</td>";
            echo "<td>" . $incidencias->estado . "</td>";
			echo "<td><div style='overflow-x:scroll; width:200px'>" . $incidencias->observacion . "</div></td>";
			
			if($incidencias->prioridad == 'alta'){
				echo "<td style='color:lightcoral'>" . $incidencias->prioridad . "</td>";
			}else if($incidencias->prioridad == 'media'){
				echo "<td style='color: rgb(216, 165, 70)'>" . $incidencias->prioridad . "</td>";
			}else if($incidencias->prioridad == 'baja'){
				echo "<td style='color: rgb(232, 221, 121)'>" . $incidencias->prioridad . "</td>";
			}else{
				echo "<td style='color:lightgreen'>" . $incidencias->prioridad . "</td>";
			}

            
			echo "<td>" . $incidencias->id_usuario . "</td>";
			// Los botones "Modificar" y "Borrar" solo se muestran si hay una sesión iniciada, y borrar solo si eres administrador

			if ($tipo == 'administrador') {
				echo "<td><a href='index.php?action=modificarIncidencias&id_incidencia=" . $incidencias->id_incidencia . "'>Modificar</a></td>";
				echo "<td><a href='index.php?action=borrarIncidencia&id_incidencia=" . $incidencias->id_incidencia . "'>Borrar</a></td>";
			}else{
				if ($tipo == 'usuario') {
					if ($usuario == $incidencias->id_usuario) {
						echo "<td><a href='index.php?action=modificarIncidencias&id_incidencia=" . $incidencias->id_incidencia . "'>Modificar</a></td>";
					}
				}
			}

			echo "</tr>";
	}
	echo "</table>";
	} else {
		// La consulta no contiene registros
		echo "No se encontraron datos";
	}
	echo "<div id='enlaces'>";
	echo "<p><a href='index.php?action=insertarIncidenciasVista'>Añadir incidencia</a></p>";

	echo "<p><a href='index.php?action=mostrarUsuarios'>Usuarios</a></p>";

	echo "<p><a href='index.php?action=mostrarInicio'>Inicio</a></p>";

	echo "<p><a href='index.php?action=cerrarSesion'>Cerrar sesión</a></p>";
	echo "</div>";
	echo "</div>";
	echo "</div>";
?>