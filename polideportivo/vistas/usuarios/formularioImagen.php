<link rel="stylesheet" href="./estilos/fondo.css">

<form enctype="multipart/form-data" action="index.php" method="POST">
    Añadir imagen: <input name="archivo" id="archivo" type="file"/>
    <input type='hidden' name='action' value='subirImagen'>
    <input type="submit" name="subir" value="Subir imagen"/>
</form>

<?php
    echo "<br><a href='index.php?action=borrarImagen' style='color:white;'>Borrar imagen</a></p><br>";
    echo "<a href='index.php?action=inicio' style='color:white;'>Inicio</a></p>";
?>