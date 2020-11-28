<link rel="stylesheet" href="./estilos/fondo.css">

<?php

echo "<h1>Crear Usuarios</h1>";
if(!isset($data['usuario'])){
    echo "<form action = 'index.php' method = 'get'>
        <label for='name'>Nombre:</label><input type='text' name='name'><br><br>
        <label for='lastname1'>Apellido 1:</label><input type='text' name='lastname1'><br><br>
        <label for='lastname2'>Apellido 2:</label><input type='text' name='lastname2'><br><br>   
        <label for='dni'>DNI:</label><input type='text' name='dni'><br><br> 
        <label for='password'>Contraseña:</label><input type='text' name='password'><br><br>  
        <label for='email'>Email:</label><input type='text' name='email'><br><br>
        <label for='type'>Tipo:</label><select name='type'><option value='user'>Usuario</option><option value='admin'>Administrador</option></select><br><br>";
}else{
foreach($data['usuario'] as $usuario)
    echo "<form action = 'index.php' method = 'get'>
                <input type='hidden' name='idUser' value='" . $usuario->idUser . "'>
                <label for='name'>Nombre:</label><input type='text' name='name' value = '" . $usuario->name . "'><br><br>
                <label for='lastname1'>Apellido 1:</label><input type='text' name='lastname1' value = '" . $usuario->lastname1 . "'><br><br>
                <label for='lastname2'>Apellido 2:</label><input type='text' name='lastname2' value = '" . $usuario->lastname2 . "'><br><br>   
                <label for='dni'>DNI:</label><input type='text' name='dni' value = '" . $usuario->dni . "'><br><br> 
                <label for='password'>Contraseña:</label><input type='text' name='password' value = '" . $usuario->password . "'><br><br>  
                <label for='email'>Email:</label><input type='text' name='email' value = '" . $usuario->email . "'><br><br>
                <label for='type'>Tipo:</label><select name='type'>
                    <option value='user' "; if($usuario->type == 'user'){echo "selected";} echo ">Usuario</option>
                    <option value='admin' "; if($usuario->type == 'admin'){echo "selected";} echo ">Administrador</option>
                </select><br><br>";
}
echo "  <input type='hidden' name='action' value='modificacionUsuario'>
            <input type='submit' id='boton' value='Aceptar'>
          </form>";
echo "<p><a href='index.php?action=mostrarUsuarios'>Volver</a></p>";

