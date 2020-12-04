<link rel="stylesheet" href="./estilos/fondo.css">
<?php

    echo "<style>
    table{border:2px solid red;background-color:white;}
    td{border:2px solid black;background-color:white;}
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
    $dia = 1;
    $contador = 1;
    $numDias = date('t', strtotime(date('Y-m')));

    echo "<table>";
    for($x=0; $x<6; $x++){

        if($numDias <= $contador){
        break;
        }

        echo "<tr>";
        for($y=0; $y<7; $y++){
            echo "<td>";

            if($contador >= date('N', strtotime(date('Y-m-01'))) && !($numDias < $dia)){
                $fecha = $dia .' '. date('M Y');
                $fecha =  getdate(strtotime($fecha));
                $fecha = $fecha['year'] . ' ' .$fecha['mon'] . ' ' . $fecha['mday'];
                $fecha = str_replace(' ', '-', $fecha);
                
                echo "<a href='index.php?action=mostrarDia&fecha=" . $fecha . "&direction=ControladorReservas' style='color: black; background-color:white; text-decoration: none'>" . $dia . "</a>";
                $dia++;
            }
                
            echo "</td>";

            $contador++;

        }
        echo "</tr>";
    }
    echo "</table><br>";

    $dia2 = 1;
    $contador2 = 1;
    $numDias2 = date('t', strtotime(date('Y-m')));

    echo "<table>";
    for($x=0; $x<6; $x++){

        if($numDias2 <= $contador2){
        break;
        }

        echo "<tr>";
        for($y2=0; $y2<7; $y2++){
            echo "<td>";

            if($contador2 >= date('N', strtotime('first day of +1 month')) && !($numDias2 < $dia2)){
                $fecha2 = $dia2 .' '. date('M Y', strtotime('+1 month'));
                $fecha2 =  getdate(strtotime($fecha2));
                $fecha2 = $fecha2['year'] . ' ' .$fecha2['mon'] . ' ' . $fecha2['mday'];
                $fecha2 = str_replace(' ', '-', $fecha2);

                echo "<a href='index.php?action=mostrarDia&fecha=" . $fecha2 . "&direction=ControladorReservas' style='color: black; background-color:white; text-decoration: none'>" . $dia2 . "</a>";
                $dia2++;
            }
                
            echo "</td>";

            $contador2++;

        }
        echo "</tr>";
    }
    echo "</table>";
    $undia = '10';
    echo "<p><a href='index.php?action=inicio&direction=ControladorUsuarios' style='color:white;'>Inicio</a></p>";
    

    /*
    //$fecha = date('d') .' '. date('M') .' '. date('Y');
    $fecha = $undia .' '. date('M Y', strtotime('+1 month'));
    //echo $fecha;

    $aver =  getdate(strtotime($fecha));

    $fecha3 = $aver['year'] . ' ' .$aver['mon'] . ' ' . $aver['mday'];
    echo str_replace(' ', '-', $fecha3);
    */