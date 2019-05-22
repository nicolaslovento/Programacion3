<?php

require_once ("./clases/Televisor.php");

$arrayTelevisores=Televisor::Traer();
$tabla="<html><body><table border=1><caption>Lista de televisores</caption><tr><th>Tipo</th><th>Precio</th><th>Pais</th><th>Precio con IVA</th><th>Foto</th></tr>";
foreach($arrayTelevisores as $televisor){

    $tele=new Televisor($televisor->tipo,$televisor->precio,$televisor->pais,$televisor->foto);//lo ultilizo para llamar a CalcularIva()
    if($televisor->foto=='sin foto'){

        $tabla.="<tr><td>$televisor->tipo</td><td>$televisor->precio</td><td>$televisor->pais</td><td>".$tele->CalcularIva()."<td>SIN FOTO</td></td></tr>";
    }else{
        $tabla.="<tr><td>$televisor->tipo</td><td>$televisor->precio</td><td>$televisor->pais</td><td>".$tele->CalcularIva()."</td><td><img src='".$televisor->foto."' widht=100 height=100> </td></tr>";

    }


}

$tabla.="</table></body></html>";

echo $tabla;

?>