<?php
require_once "funciones.php";
/*Aplicación Nº 39 (Información del Número)
Construya una aplicación que permita el ingreso de un número entero y muestre en pantalla la
siguiente información:
1) Cantidad de cifras que posee.
2) Suma de cifras impares del número.
3) Suma de cifras pares del número.
4) Suma total de todas las cifras del número.
5) Todos los divisores de dicho número.
Mostrar los anteriores datos en una tabla convenientemente diseñada.*/

$numero=$_POST["numero"];

echo "Cifras: ".strlen($numero)."<br>";
echo "Cifras impares: ".CalcularImpar($numero)."<br>";
echo "Cifras pares: ".CalcularPar($numero)."<br>";
echo "Suma de cifras: ".CalcularSumaDeCifras($numero)."<br>";
echo "Divisores: ".CalcularDivisores($numero);

?>