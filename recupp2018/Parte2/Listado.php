<?php

require_once ("./clases/Televisor.php");

$arrayTelevisores=Televisor::Traer();
$tabla="<html><body><table border=1><caption>Lista de televisores</caption><tr><th>Tipo</th><th>Precio</th><th>Pais</th><th>Foto</th><th>Precio con IVA</th></tr>";
foreach($arrayTelevisores as $televisor){

    $tele=new Televisor($televisor->tipo,$televisor->precio,$televisor->pais,$televisor->foto);//lo ultilizo para llamar a CalcularIva()
    $tabla.="<tr><td>$televisor->tipo</td><td>$televisor->precio</td><td>$televisor->pais</td><td>$televisor->foto</td><td>".$tele->CalcularIva()."</td></tr>";

}

$tabla.="</table></body></html>";

echo $tabla;

?>