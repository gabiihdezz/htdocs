<?php
/*
Determinar la cantidad de dinero que recibirá un trabajador por concepto de las
horas extras trabajadas en una empresa, sabiendo que cuando las horas de
trabajo exceden de 40, el resto se consideran horas extras y que estas se pagan al
doble de una hora normal cuando no exceden de 8; si las horas extras exceden de
8 se pagan las primeras 8 al doble de lo que se pagan las horas normales y el resto
al triple.
*/
//las primeras 40 -->20€
//40-48 --> 40€
//48-56 --> 60€
$horas=40;
if ($horas>=40){
    $horas1=$horas-40;
    $dinero1=($horas-$horas1)*20;

    if ($horas1>=8){
        $horas2=$horas1-8;
        $dinero2=($horas1-$horas2)*40;
    }
    else{
        $horas2=$horas1-8;
        $dinero2=($horas1-$horas2)*40;
    }

        if ($horas2>=8){
            $horas3=$horas2-8;
            $dinero3=($horas2-$horas3)*60;
    }
    else{
        $horas3=$horas2-8;
        $dinero3=($horas2-$horas3)*60;
}
}
else{
    $horas1=$horas-40;
    $dinero1=($horas-$horas1)*20;
}
$dinero=$dinero1 + $dinero2 + $dinero3;
echo "El total de dinero generado esta semana es de: " . $dinero ;
?>