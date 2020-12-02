<link rel="stylesheet" href="./estilos/fondo.css">

<?php

echo "<h1>Crear Instalacion</h1>";
if(!isset($data['instalacion'])){
    echo "<form action = 'index.php' method = 'get'>
        <label for='name'>Nombre:</label><input type='text' name='name'><br><br>
        <label for='description'>Descripcion:</label><textarea name='description'></textarea><br><br> 
        <label for='price'>Precio:</label><input type='number' name='price'><br><br>";
        echo "  <input type='hidden' name='action' value='insertarInstalaciones'>
        <input type='hidden' name='direction' value='ControladorInstalaciones'>
            <input type='submit' id='boton' value='Aceptar'>
          </form>";
}else{
foreach($data['instalacion'] as $instalacion)
    echo "<form enctype='multipart/form-data' action = 'index.php' method = 'POST'>
                <input type='hidden' name='idFacility' value='" . $instalacion->idFacility . "'>
                <label for='name'>Nombre:</label><input type='text' name='name' value='" . $instalacion->name . "'><br><br>
                <label for='description'>Descripcion:</label><textarea name='description'>" . $instalacion->description . "</textarea><br><br> 
                <label for='price'>Precio:</label><input type='number' name='price' value='" . $instalacion->price . "'><br><br>
                <label for='image'>Añadir imagen:<input name='image' type='file'/><br><br>";
                echo "  <input type='hidden' name='action' value='modificacionInstalaciones'>
                <input type='hidden' name='direction' value='ControladorInstalaciones'>
            <input type='submit' id='boton' value='Aceptar'>
          </form>";
}

echo "<p><a href='index.php?action=mostrarInstalaciones&direction=ControladorInstalaciones'>Volver</a></p>";
