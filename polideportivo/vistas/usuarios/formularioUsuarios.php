<link rel="stylesheet" href="./estilos/fondo.css">

<?php

echo "<h1>Crear Usuarios</h1>";

echo "<form action = 'index.php' method = 'get'>
            <label for='name'>Nombre:</label><input type='text' name='name'><br><br>
            <label for='lastname1'>Apellido 1:</label><input type='text' name='lastname1'><br><br>
            <label for='lastname2'>Apellido 2:</label><input type='text' name='lastname2'><br><br>   
            <label for='dni'>DNI:</label><input type='text' name='dni'><br><br> 
            <label for='password'>Contraseña:</label><input type='password' name='password'><br><br>  
            <label for='email'>Email:</label><input type='text' name='email'><br><br>
            <label for='type'>Tipo:</label><select name='type'><option value='user'>Usuario</option><option value='admin'>Administrador</option></select><br><br>";

echo "  <input type='hidden' name='action' value='insertarUsuarios'>
            <input type='submit' id='boton' value='Aceptar'>
          </form>";
echo "<p><a href='index.php?action=insertarUsuarios'>Volver</a></p>";

