<?php
/*2. Queremos almacenar en una matriz el número de alumnos con el que cuenta una
academia, ordenados en función del nivel y del idioma que se estudia. Tendremos
3 filas que representarán al Nivel básico, medio y de perfeccionamiento y 4
columnas en las que figurarán los idiomas (0 = Inglés, 1 = Francés, 2 = Alemán y 3
= Ruso). Mostrar por pantalla los alumnos que existen en cada nivel e idioma.
 */
function tab($num) {
    return str_repeat("&nbsp;", $num);  // Repite la entidad &nbsp; tantas veces como se indique
}

$niveles= array("Básico","Medio", "Perfecc.");
$idiomas=array("Inglés", "Francés", "Alemán", "Ruso");
$alumnos=array(
    array(1 ,14, 8, 3),
    array(6, 19, 7, 2),
    array(3, 13, 4, 1));
echo tab(20);

for( $i = 0; $i < count ($idiomas); $i++ ){
    echo $idiomas[$i] . "   |  ";
}
echo "<br>";
for( $j = 0; $j < count ($niveles); $j++ ){
    echo $niveles[$j] . "<br>";}
foreach($alumnos as $k){
    foreach($k as $v){
    echo $v . " ";}
    echo "<br>";}

/*foreach($alumnos as $k){
    foreach($k as $v){
    echo $v . " ";}
    echo "<br>";}*/
?> 