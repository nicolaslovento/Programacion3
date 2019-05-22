<?php
require_once ("./clases/Televisor.php");
$tipo=$_POST['tipo'];
$precio=$_POST['precio'];
$paisOrigen=$_POST['paisOrigen'];

$retorno=new stdClass();
$retorno->exito=false;
$retorno->mensaje="no se agrego";
$televisor=new Televisor($tipo,$precio,$paisOrigen);

if($televisor->Agregar()){

    $retorno->exito=true;
    $retorno->mensaje="se agrego";

}

echo json_encode($retorno);





?>