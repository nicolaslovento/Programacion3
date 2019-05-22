<?php
include_once ("Juguete.php");


$arrayJuguetes=Juguete::Traer();
$tabla="<table border=1><caption>Listado de juguetes</caption><tr><th>Tipo</th><th>Precio</th><th>Pais</th><th>Imagen</th></tr>";
foreach($arrayJuguetes as $juguete){

    if($juguete->GetPathImagen()=='sin foto'){

        $tabla.="<tr><td>".$juguete->GetTipo()."</td><td>".$juguete->GetPrecio()."</td><td>".$juguete->GetPaisOrigen()."</td><td>".$juguete->GetPathImagen()."</td></tr>";
    }else{
        $tabla.="<tr><td>".$juguete->GetTipo()."</td><td>".$juguete->GetPrecio()."</td><td>".$juguete->GetPaisOrigen()."</td><td><img src='".$juguete->GetPathImagen()."' widht=100 height=100> </td></tr>";
    }

}

$tabla.="</table>";

echo $tabla;


?>