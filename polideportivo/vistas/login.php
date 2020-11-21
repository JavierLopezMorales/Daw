<link rel="stylesheet" href="./estilos/fondo.css">

<?php
    echo"
        <h1>Pagina de login</h1>
        <br><br>
        <form action='index.php'>
            Email:<input type='text' name='usuario'>
            <br><br>
            Contraseña:<input type='text' name='password'>
            <br><br>
            <input type='hidden' name='action' value='procesarLogin'>
            <input type='submit' id='boton' value='Aceptar'>
        </form>
    ";
?>