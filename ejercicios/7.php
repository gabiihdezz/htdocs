<?php
/*Hacer un programa que calcule todos los números primos entre 1 y 50 y los
muestre por pantalla. Un número primo es un número entero que sólo es
divisible por 1 y por sí mismo..*/

for ( $i = 0; $i <= 50; $i=$i+1 ) {
    if ( $i %2== 0) {
    echo " | ". $i ;}
}
?>