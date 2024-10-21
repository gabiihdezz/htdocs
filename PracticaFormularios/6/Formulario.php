<?php
echo "<style>
    body {
        background-color: aliceblue;
    }
</style>";
$num=0;

echo "Numero de elementos:    <input type=\"text\" id=\"num1\" name=\"$num\" required>";
echo "<form action=\"Formulario.php\" method=\"POST\">";
echo <<<_END
<input type="submit" value="Aceptar">
_END;

echo "<form action=\"resultadoFormularioDinamico.php\" method=\"POST\">";
for( $i = 0; $i < $num; $i++ ){
    echo <<<_END
    <label for="$i">$i:</label>
    <input type="text" id="num1" name="$i" required>
    <br>
    _END;
}
echo <<<_END
<input type="submit" value="Enviar">
_END;


?>