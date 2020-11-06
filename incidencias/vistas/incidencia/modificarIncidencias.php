<link rel="stylesheet" href="./estilos/header.css">
<link rel="stylesheet" href="./estilos/boton.css">
<link rel="stylesheet" href="./estilos/formulario.css">

<?php
// Pasamos las variables preparadas en el controlador ($data[]) a variables normales 
// para escribirlas con más facilidad
$incidencias = $data['incidencia'];

echo "<div id='contenedor'><h1>Modificación de Incidencias</h1>";

if (isset($_SESSION['idUsuario'])) {
  $usuario = $_SESSION['idUsuario'];
  $tipo =	$_SESSION['tipo'];
}

// Creamos el formulario con los campos de la incidencia
// y lo rellenamos con los datos que hemos recuperado de la BD
echo "<div id='caja'>

<form action = 'index.php' method = 'get'>
            <input type='hidden' name='id_incidencia' value='$incidencias->id_incidencia'>
            Descripcion:<textarea name='descripcion'>$incidencias->descripcion</textarea><br><br>
            Equipo afectado:<input type='text' name='equipo_afectado' value='$incidencias->equipo_afectado'><br><br>
            Fecha:<input type='date' name='fecha' value='$incidencias->fecha'><br><br>
            Estado:<input type='text' name='estado' value='$incidencias->estado'><br><br>
            Observacion:<textarea name='observacion' >$incidencias->observacion</textarea><br><br>";

            if ($tipo == 'administrador') {
              echo "Prioridad:<input type='text' name='prioridad' value='$incidencias->prioridad' ><br><br>";
            }else{
              if ($tipo == 'usuario') {
                if ($usuario == $incidencias->id_usuario) {
                  echo "Prioridad:<input type='text' name='prioridad' value='$incidencias->prioridad' readonly><br><br>";
                }
              }
            }
            
            echo "Id usuario:<input type='text' name='id_usuario' value='$incidencias->id_usuario' readonly><br><br>";

// Finalizamos el formulario
echo "  <input type='hidden' name='action' value='modificarIncidenciasEnviar'>
            <input type='submit' id='boton'>
          </form>";
echo "<p><a href='index.php?action=mostrarIncidencias'>volver</a></p>";
echo "</div>";
echo "</div>";