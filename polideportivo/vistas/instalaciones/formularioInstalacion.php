<nav class='navbar bg-dark text-white p-2 mb-5'>

    <h1>Formulario Instalacion</h1>
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
if(!isset($data['instalacion'])){
    echo "<form action = 'index.php' method = 'get'>
        <div class='form-group'>
        <label for='name'>Nombre:</label><br><input class='form-control' type='text' name='name'></div><br><br>
        <div class='form-group'>
        <label for='description'>Descripcion:</label><br><textarea class='form-control' name='description'></textarea></div><br><br> 
        <div class='form-group'>
        <label for='price'>Precio:</label><br><input class='form-control' type='number' name='price'></div><br><br>";
        echo "  <input type='hidden' name='action' value='insertarInstalaciones'>
        <input type='hidden' name='direction' value='ControladorInstalaciones'>
            <input class='btn btn-success btn-sm' type='submit' id='boton' value='Aceptar'><br><br>
          </form>";
}else{
foreach($data['instalacion'] as $instalacion)
    echo "<form enctype='multipart/form-data' action = 'index.php' method = 'POST'>
                <input type='hidden' name='idFacility' value='" . $instalacion->idFacility . "'>
                <div class='form-group'>
                <label for='name'>Nombre:</label><br><input type='text' name='name' value='" . $instalacion->name . "'></div><br>
                <div class='form-group'>
                <label for='description'>Descripcion:</label><br><textarea name='description'>" . $instalacion->description . "</textarea></div><br>
                <div class='form-group'>
                <label for='price'>Precio:</label><br><input type='number' name='price' value='" . $instalacion->price . "'></div><br>
                <div class='form-group'>
                <label for='image'>Añadir imagen:<br><input name='image' type='file'/></div><br>";
                echo "  <input type='hidden' name='action' value='modificacionInstalaciones'>
                <input type='hidden' name='direction' value='ControladorInstalaciones'>
            <input class='btn btn-success btn-sm' type='submit' id='boton' value='Aceptar'> <br><br>
          </form>";
}


echo "<p><a class='btn btn-success btn-sm' href='index.php?action=mostrarInstalaciones&direction=ControladorInstalaciones'>Volver</a></p>";
?>
</div>