<nav class='navbar bg-dark text-white p-2 mb-5'>

    <h1>Formulario Usuarios</h1>
	<?php
	    if (isset($_SESSION['idUser'])) {
			echo "<div class='media bg-light text-dark p-1'>";
			echo "<div>";
			echo "<img src='./imagenes/usuarios/" . $_SESSION['image'] . "' width='50px' class='rounded-circle border border-dark'>";
			echo "</div>";
			echo "<div class='text-center'>".$_SESSION['name']."</div>";
			echo "</div>";

		}
	?>
</nav>
<div class='container text-center bg-dark text-white p-3'>
<?php

if(!isset($data['usuario'])){
    echo "<form action = 'index.php' method = 'get'>
    <div class='form-group'>
        <label for='name'>Nombre:</label><input type='text' name='name'></div><br>
        <div class='form-group'>
        <label for='lastname1'>Apellido 1:</label><input type='text' name='lastname1'></div><br>
        <div class='form-group'>
        <label for='lastname2'>Apellido 2:</label><input type='text' name='lastname2'></div><br> 
        <div class='form-group'>
        <label for='dni'>DNI:</label><input type='text' name='dni'></div><br><br> 
        <div class='form-group'>
        <label for='password'>Contraseña:</label><input type='text' name='password'></div><br>
        <div class='form-group'>
        <label for='email'>Email:</label><input type='text' name='email'></div><br>
        <div class='form-group'>
        <label for='type'>Tipo:</label><select name='type'><option value='user'>Usuario</option><option value='admin'>Administrador</option></select></div><br>";
        echo "  <input type='hidden' name='action' value='insertarUsuarios'>
            <input class='btn btn-success btn-sm' type='submit' id='boton' value='Aceptar'><br><br>
          </form>";
}else{
foreach($data['usuario'] as $usuario)
    echo "<form enctype='multipart/form-data' action = 'index.php' method = 'POST'>
                <input type='hidden' name='idUser' value='" . $usuario->idUser . "'>
                <div class='form-group'>
                <label for='name'>Nombre:</label><input type='text' name='name' value = '" . $usuario->name . "'></div><br>
                <div class='form-group'>
                <label for='lastname1'>Apellido 1:</label><input type='text' name='lastname1' value = '" . $usuario->lastname1 . "'></div><br>
                <div class='form-group'>
                <label for='lastname2'>Apellido 2:</label><input type='text' name='lastname2' value = '" . $usuario->lastname2 . "'></div><br>
                <div class='form-group'> 
                <label for='dni'>DNI:</label><input type='text' name='dni' value = '" . $usuario->dni . "'></div><br>
                <div class='form-group'>
                <label for='password'>Contraseña:</label><input type='text' name='password' value = '" . $usuario->password . "'></div><br>
                <div class='form-group'>
                <label for='email'>Email:</label><input type='text' name='email' value = '" . $usuario->email . "'></div><br>
                <div class='form-group'>
                <label for='type'>Tipo:</label><select name='type'>
                    <option value='user' "; if($usuario->type == 'user'){echo "selected";} echo ">Usuario</option>
                    <option value='admin' "; if($usuario->type == 'admin'){echo "selected";} echo ">Administrador</option>
                </select></div><br>
                <div class='form-group'>
                <label for='state'>Estado:</label><select name='state'>
                    <option value='alta' "; if($usuario->state == 'alta'){echo "selected";} echo ">Alta</option>
                    <option value='borrado' "; if($usuario->state == 'borrado'){echo "selected";} echo ">Borrado</option>
                </select></div><br>
                <div class='form-group'>
                <label for='image'>Añadir imagen:<input name='image' type='file'/></div><br>";
                echo "  <input type='hidden' name='action' value='modificacionUsuario'>
            <input class='btn btn-success btn-sm' type='submit' id='boton' value='Aceptar'><br><br>
          </form>";
}

echo "<p><a class='btn btn-success btn-sm' href='index.php?action=mostrarUsuarios'>Volver</a></p>";
?>
</div>
