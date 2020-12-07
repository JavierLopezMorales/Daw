
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" href="./estilos/fondo.css">
</head>
<body>
    <?php

        echo "<style>
        table{border:2px solid red;background-color:white;}
        td{border:2px solid black;background-color:white;height:4em;width:4em;text-align:center;color:black;}
        </style>";
        /*
        $nombredia = (new DateTime('first day of this month'))->format('m j Y');

        $dias = array('Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo');

        $fecha = $dias[date('N', strtotime(date('Y-m-01')))-1];
        
        echo $fecha;
        echo date('N', strtotime(date('Y-m-01')));//Dia 1 de este mes
        echo date('N', strtotime('first day of +1 month'));//Dia 1 del siguiente mes
        */
        //////////////////////////////////////////////////////////////////////////////////////////////////



        $dia = 0;
        $contador = 1;
        $numDias = date('t', strtotime(date('Y-m')));

        echo "<table>";
        echo "<tr><td>Lunes</td><td>Martes</td><td>Miercoles</td><td>Jueves</td><td>Viernes</td><td>Sabado</td><td>Domingo</td></tr>";
        for($x=0; $x<6; $x++){

            if($numDias <= $contador){
            break;
            }

            echo "<tr>";
            for($y=0; $y<7; $y++){

                if($contador >= date('N', strtotime(date('Y-m-01'))) && !($numDias <= $dia))
                {
                    $dia++;
                    $fecha = $dia .' '. date('M Y');
                    $fecha =  getdate(strtotime($fecha));
                    $fecha = $fecha['year'] . ' ' .$fecha['mon'] . ' ' . $fecha['mday'];
                    $fecha = str_replace(' ', '-', $fecha);
                    echo "<td class='fecha' id='". $fecha ."'>";
                    echo "<a href='index.php?action=mostrarDia&fecha=" . $fecha . "&direction=ControladorReservas' style='color: black; background-color:white; text-decoration: none'>" . $dia . "</a>";
                    
                }
                else
                {
                    echo "<td>";
                }
                    
                echo "</td>";

                $contador++;

            }
            echo "</tr>";
        }
        echo "</table><br>";

        $dia2 = 0;
        $contador2 = 1;
        $numDias2 = date('t', strtotime(date('Y-m')));

        echo "<table>";
        echo "<tr><td>Lunes</td><td>Martes</td><td>Miercoles</td><td>Jueves</td><td>Viernes</td><td>Sabado</td><td>Domingo</td></tr>";
        for($x=0; $x<6; $x++){

            if($numDias2 <= $contador2){
            break;
            }

            echo "<tr>";
            for($y2=0; $y2<7; $y2++){
                

                if($contador2 >= date('N', strtotime('first day of +1 month')) && !($numDias2 <= $dia2))
                {
                    $dia2++;
                    $fecha2 = $dia2 .' '. date('M Y', strtotime('+1 month'));
                    $fecha2 =  getdate(strtotime($fecha2));
                    $fecha2 = $fecha2['year'] . ' ' .$fecha2['mon'] . ' ' . $fecha2['mday'];
                    $fecha2 = str_replace(' ', '-', $fecha2);
                    echo "<td class='fecha2' id='". $fecha2 ."'>";
                    echo "<a href='index.php?action=mostrarDia&fecha=" . $fecha2 . "&direction=ControladorReservas' style='color: black; background-color:white; text-decoration: none'>" . $dia2 . "</a>";
                }
                else
                {
                    echo "<td>";
                }
                    
                echo "</td>";

                $contador2++;

            }
            echo "</tr>";
        }
        echo "</table>";
        $undia = '10';
        echo "<p><a href='index.php?action=inicio&direction=ControladorUsuarios' style='color:white;'>Inicio</a></p>";  
    ?>

<p style='color:lightcoral' id='msjError'></p>


<p style='color:rgb(189, 214, 247)' id='msjInfo'></p>

    <script>
        //fechaCalendario = document.getElementsByClassName('fecha')[0].id;

        var fecha = new Date();
        var dias = new Date(fecha.getFullYear(), fecha.getMonth() + 1, 0).getDate(); // este mes
        var dias2 = new Date(fecha.getFullYear(), fecha.getMonth() + 2, 0).getDate(); // mes siguiente
        var idUser;
        var type = "<?php echo $_SESSION['type']; ?>";
        var direccion;

        if(type == 'admin')
        {
            idUser = 0;
        }
        else
        {
            idUser = "<?php echo $_SESSION['idUser']; ?>";
        }

///////////////////////////////////////////////////////////////////////////////////////
        for(var x = 0; x < dias; x++)
        {
            fechaCalendario = document.getElementsByClassName('fecha')[x].id;
            pintarFondo(idUser, fechaCalendario);
        }
///////////////////////////////////////////////////////////////////////////////////////
        for(var y = 0; y < dias2; y++)
        {
            fechaCalendario = document.getElementsByClassName('fecha2')[y].id;
            pintarFondo(idUser, fechaCalendario);
        }
//////////////////////////////////////////////////////////////////////////////////////
        function pintarFondo(idUser, fechaCalendario)
		{
			peticion = new XMLHttpRequest();
			peticion.onreadystatechange = procesarRespuesta;
			peticion.open('GET', 'index.php?action=diasReservas&direction=ControladorReservas&id=' + idUser + '&fecha=' + fechaCalendario, false);
			peticion.send(null);

		}

		function procesarRespuesta() {
            if(peticion.readyState == 4) {
                if(peticion.status == 200) {
				    fechaResult = peticion.responseText;
                    if (peticion.responseText != '0')
                    {
						document.getElementById(fechaResult).style.background = "red";
                        document.getElementById(fechaResult).children[0].style.background = "red";
                    }

                }

            }
        }	
    </script>

</body>
</html>