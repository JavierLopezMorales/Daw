<link rel="stylesheet" href="./estilos/fondo.css">
 
<?php
    echo "  <form enctype='multipart/form-data' action='index.php' method='POST'>
                Añadir imagen: <input name='archivo' id='archivo' type='file'/>
                <input type='hidden' name='action' value='subirImagen'>
                <input type='hidden' name='idUser' value='" . $_SESSION['idUser'] . "'>
                <input type='submit' name='subir' value='Subir imagen'/>
            </form>";

    echo "<br><form action='index.php' method='get'>
                <input type='hidden' name='action' value='borrarImagen'>
                <input type='hidden' name='direction' value='ControladorUsuarios'>       
                <input type='hidden' name='idUser' value='" . $_SESSION['idUser'] . "'>
                <input type='submit' name='borrar' value='Borrar imagen'/>
            </form>";
    echo "<a href='index.php?action=inicio' style='color:white;'>Inicio</a></p>";
?>