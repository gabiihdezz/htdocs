<?php
/* Cree los accesos de todos los atributos.
 Cree un constructor en la clase vehículo que tome como argumento el
color y el peso.
 Cree el método _toString de la clase vehículo para que muestre
información respecto al objeto.
 Modifique el método circula() para que muestre "El vehículo circula".
 Modifique el método añadir_persona(peso_persona) para que cambie el
peso del vehículo en función del peso de la persona que pasa como
argumento.
 Cree la página mostrar.php y un vehículo negro de 1500 kg y muestre
información sobre el vehículo.
 Haga que circule. Añada una persona de 70 kg y muestre el nuevo peso
del vehículo.*/
include 'vehiculo.php';
$vehiculo = new Vehiculo("negro", 1500);
echo "<br>" . $vehiculo->__toString();
echo "<br>" . $vehiculo->circula();
$nuevoPeso = $vehiculo->anadirPersona(peso_persona: 70);
echo "<br>Nuevo peso del vehículo: " . $nuevoPeso . " kg";

/*Realice las siguientes operaciones (continuación del ejercicio anterior, dificultad
media):
 Aplique el método repintar(color) para cambiar el color definido en la
clase Vehículo.
 Ejecute el método poner_gasolina(litros) para cambiar el peso definido en
la clase Vehículo. En este ejercicio, un litro equivale a un kilo.
 Aplique los métodos añadir_cadenas_nieve() y quitar_cadenas_nieve()
modificando el atributo numero_cadenas_nieve.
 Aplique el método añadir_remolque(longitud_remolque) modificando el
atributo longitud.
 En la página mostrar.php, cree un coche verde de 1400 kg. Añada dos
personas de 65 kg cada una. Muestre su color y su nuevo peso.
 Retome el coche en rojo y añada dos cadenas para la nieve.
 Muestre su color y su número de cadenas para la nieve.
 Cree un objeto Dos_ruedas negro de 120 kg. Añada una persona de 80 kg.
Ponga 20 litros de gasolina.
 Muestre el color y el peso de dos ruedas.
 Cree un camión azul de 10000 kg y de 10 metros de longitud con 2
puertas. Añada un remolque de 5 metros y una persona de 80 kg.
 Muestre su color, su peso, su longitud y su número de puertas.
 */
echo "<br><br><br>";
echo "Ejercicio 4:";
echo "<br>";
$vehiculo = new Vehiculo("verde", 1500);
$vehiculo = new poner_gasolina(30); 
?>
