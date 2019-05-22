<?php

require_once ("./clases/Televisor.php");

$tipo=$_POST['tipo'];
$pais=$_POST['paisOrigen'];
$precio=$_POST['precio'];
$foto=$_FILES['foto']['tmp_name'];
$id=$_POST['id'];

$tele=new Televisor($tipo,$precio,$pais);
$ubicacion=$foto=$_FILES['foto']['tmp_name'];
$destino="./televisores/imagenes/".$tele->tipo.".".$tele->paisOrigen.".".date("gis").".MODIFICADO.jpg";
if(move_uploaded_file($ubicacion,$destino)){

    $tele->path=$destino;
}

$tele->Modificar($id);

?>

