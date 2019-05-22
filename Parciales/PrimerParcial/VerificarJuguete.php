<?php

include_once ("Juguete.php");

$tipo=$_GET["tipo"];
$pais=$_GET["paisOrigen"];

$seEncontro=false;
$array=Juguete::Traer();

foreach($array as $obj){
    
        if($obj->GetPaisOrigen()==$pais && $obj->GetTipo()==$tipo){

            echo $obj->ToString()."\n";
            echo "Precio con IVA: ".$obj->CalcularIva()."\n";
            $seEncontro=true;
            break;
        } 
        
}

if($seEncontro==false){

    $flagPais=false;
    $flagTipo=false;

    foreach($array as $obj){
    
        if($obj->GetPaisOrigen()==$pais){

            $flagPais=true;
            
        } 

        if($obj->GetTipo()==$tipo){

            $flagTipo=true;
            
        } 
        
    }

    if($flagPais==false && $flagTipo==false){

        echo "No coincide tipo ni pais.";
    }
    if($flagPais==false && $flagTipo==true){

        echo "No coincide el pais pero si el tipo.";
    }

    if($flagPais==true && $flagTipo==false){
        
        echo "No coincide el tipo pero si el pais.";
    }


}








?>