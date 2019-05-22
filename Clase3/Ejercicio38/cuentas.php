<?php
/*Aplicación Nº 38 (Descuento por Compra)
Un restaurante ofrece un descuento del 10% para consumos entre $ 300 y $ 550 y un
descuento del 20% para consumos mayores a $ 550. Para todos los demás casos no se aplica
ningún tipo de descuento.
Elaborar una aplicación web que permita determinar el importe a pagar por el consumidor. */

$gasto=$_POST["gasto"];
$importeFinal=0;
if(($gasto>300) && ($gasto<550)){
    $importeFinal=$gasto*0.90;
    echo "Descuento del %10."."<br>"."Importe final: $".$importeFinal;
}elseif($gasto>550){
    $importeFinal=$gasto*0.80;
    echo "Descuento del %20."."<br>"."Importe final: $".$importeFinal;
}else{
    $importeFinal=$gasto;
    echo "Sin descuento."."<br>"."Importe final: $".$importeFinal;
}

?>