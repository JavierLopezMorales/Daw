<link rel="stylesheet" href="./estilos/header.css">
<link rel="stylesheet" href="./estilos/login.css">


<div id='contenedor'>

	
	<h1>Iniciar sesión</h1>
		<div id='caja'>
		<?php
			if (isset($data['msjError'])) {
				echo "<p style='color:lightcoral'>".$data['msjError']."</p>";
			}
			if (isset($data['msjInfo'])) {
				echo "<p style='color:rgb(189, 214, 247)'>".$data['msjInfo']."</p>";
			}
		?>

		<form action='index.php'>
				<label for='usr'>Usuario:</label><input type='text' name='usr'><br>
				<label for='pass'>Contraseña:</label><input type='password' name='pass'><br>
				<input type='hidden' name='action' value='procesarLogin'>
				<input type='submit' id='boton'>
		</form>
	</div>

</div>