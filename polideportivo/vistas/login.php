<link rel="stylesheet" href="./estilos/fondo.css">


<h1>Pagina de login</h1>
<br><br>

<?php
	if (isset($data['msjError'])) {
		echo "<p style='color:lightcoral'>".$data['msjError']."</p>";
	}
	if (isset($data['msjInfo'])) {
		echo "<p style='color:rgb(189, 214, 247)'>".$data['msjInfo']."</p>";
	}
?>

<form action='index.php'>
    Email:<input type='text' name='usuario'>
    <br><br>
    Contraseña:<input type='text' name='password'>
    <br><br>
    <input type='hidden' name='action' value='procesarLogin'>
    <input type='submit' id='boton' value='Aceptar'>
</form>
