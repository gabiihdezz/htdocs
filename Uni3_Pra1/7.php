<?php
/* 
7. Generar una matriz de 3x4 y generar un vector que contenga los valores máximos
de cada fila y otro que contenga los promedios de los mismos. Imprimir ambos
vectores a razón de uno por renglón.*/
$promedio=0;
$matriz=array();
$mayor=-1;
for ($i= 0; $i <= 2; $i++){
    $mayor=0;
    $j=0;
    for ($j= 0; $j <= 3; $j++){
        $nums= rand(0,20);
        $matriz[$i][$j] = $nums;
        echo"(". $matriz[$i][$j] .") ";
        $promedio=$matriz[$i][$j];
        if($mayor<$matriz[$i][$j]){
            $mayor= $matriz[$i][$j];
        }
        $promedio=$promedio+$nums;
    }
    echo "<br>";
    echo "El número mas grande de la fila ".$i." es el: ".$mayor ." <br>";
    echo "El promedio de la fila ".$i." da: ".$promedio ." <br>";
    $promedio=0;

}
echo "<br>";

?>
