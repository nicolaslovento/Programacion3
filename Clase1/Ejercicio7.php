<?php
$fecha= date("l j  F  Y");
echo $fecha."<br>";
echo date("e")."<br>";
echo date("l")." de ".date("j")."<br>";
switch(date("m")){
    case 01:
    case 02:
    case 03:
        echo "verano";break;
    case 04:
    case 05:
    case 06:
        echo "Otoño";break;
    case 07:
    case 08:
    case 09:
        echo "Invierno";break;
    default:
        echo "Primavera";
}
?>