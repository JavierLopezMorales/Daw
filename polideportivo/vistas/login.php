<nav class='navbar bg-dark text-white p-2'>

    <h1>Inicio</h1>
</nav>
<div class="container p-4 my-4 bg-dark text-white rounded">
<?php
        if (isset($data['msjError'])) {
            echo "<p class='text-danger'>".$data['msjError']."</p>";
        }
        if (isset($data['msjInfo'])) {
            echo "<p class='text-info'>".$data['msjInfo']."</p>";
        }
    ?>
    <form action='index.php' >
        <div class="form-group">
            <input class="form-control" type='text' name='usuario' id='usuario' onblur='verificarEmail()' placeholder='Introduce tu email'>
            <span class='text-warning' id='mensajeUsuario'></span> <br> <br>
        </div>
        <div class="form-group">
            <input class="form-control" type='password' name='password' placeholder='Introduce tu contraseña'> <br>
        </div>
        <input type='hidden' name='action' value='procesarLogin'>
        <input type='hidden' name='direction' value='ControladorUsuarios'>
        <input type='submit' id='boton' value='Aceptar' class='btn btn-primary btn-block'>
    </form>
</div>

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
                        document.getElementById('mensajeUsuario').innerHTML = "Usuario existente";
                    }

                }

            }
        }	
        
    </script>



