
<!DOCTYPE html>
<html lang="en">
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Gestión de biblioteca - Un ejemplo de aplicación web</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" href="./estilos/fondo.css">
</head>
<body>

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
        Email:<input type='text' name='usuario' id='usuario' onblur='verificarEmail()'>
        <span id='mensajeUsuario'></span><br><br>
        Contraseña:<input type='text' name='password'>
        <br><br>
        <input type='hidden' name='action' value='procesarLogin'>
        <input type='hidden' name='direction' value='ControladorUsuarios'>
        <input type='submit' id='boton' value='Aceptar'>
    </form>

    <script>
        function verificarEmail()
        { 
            var usuario = document.getElementById("usuario").value;

            peticion = new XMLHttpRequest();
            peticion.onreadystatechange = procesarRespuesta;
            peticion.open('GET', 'index.php?action=comprobarEmail&direction=ControladorUsuarios&email=' + usuario, true);
            peticion.send(null);
        }	

        function procesarRespuesta() {
            if(peticion.readyState == 4) {
                if(peticion.status == 200) {
                    
                    if (peticion.responseText == '0')
                    {
                        document.getElementById('mensajeUsuario').innerHTML = "Error, ese usuario no existe";
                    }
                    if (peticion.responseText == '1')
                    {
                        document.getElementById('mensajeUsuario').innerHTML = "Usuario OK";
                    }

                }

            }
        }	
        
    </script>

</body>
</html>

