<link rel="stylesheet" href="./estilos/header.css">
<link rel="stylesheet" href="./estilos/boton.css">
<link rel="stylesheet" href="./estilos/formulario.css">

<?php

echo "<div id='contenedor'><h1>Insertar Incidencias</h1>";

if (isset($_SESSION['idUsuario'])) {
  $usuario = $_SESSION['idUsuario'];
  $tipo =	$_SESSION['tipo'];
}


// Creamos el formulario con los campos de las incidencias
// y lo rellenamos con los datos que hemos recuperado de la BD
echo "<div id='caja'><form action = 'index.php' method = 'get'>
            <label for='descripcion'>Descripcion:</label><textarea name='descripcion'></textarea><br><br>
            <label for='equipo_afectado'>Equipo afectado:</label><input type='text' name='equipo_afectado'><br><br>
            <label for='fecha'>Fecha:</label><input type='date' name='fecha'><br><br>";

            if ($tipo == 'administrador') {
                echo "<label for='estado'>Estado:</label><input type='text' name='estado'><br><br>";
              }else{
                if ($tipo == 'usuario') {
                  echo "<label for='estado'>Estado:</label><input type='text' name='estado' value='en_espera' readonly><br><br>";
                }
              }

            
            echo "<label for='observacion'>Observacion:</label><textarea name='observacion'></textarea><br><br>";

            if ($tipo == 'administrador') {
              echo "<label for='prioridad'>Prioridad:</label><input type='text' name='prioridad'><br><br>";
            }else{
                echo "<label for='prioridad'>Prioridad:</label><input type='text' name='prioridad' value='' readonly><br><br>";
            }
            
            echo "<label for='id_usuario'>Id usuario:</label><input type='text' name='id_usuario' value='$usuario' readonly><br><br>";

// Finalizamos el formulario
echo "  <input type='hidden' name='action' value='insertarIncidencias'>
            <input type='submit' id='boton' value='Aceptar'>
          </form>";
echo "<p><a href='index.php?action=mostrarIncidencias'>Volver</a></p>";
echo "</div>";
echo "</div>";