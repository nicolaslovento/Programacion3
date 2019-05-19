<?php

include_once ("Juguete.php");

$tipo=$_POST['tipo'];
$pais=$_POST['paisOrigen'];
$precio=$_POST['precio'];
$foto=$_FILES['img']['tmp_name'];
$id=$_POST['id'];
$pathDestino = "./juguetesModificados/".$_POST["tipo"].".".$_POST["paisOrigen"].".modificado.".date("Gis").".".pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
$juguete=new Juguete($tipo,$precio,$pais,$pathDestino);
$pathOrigen = $foto;   

$juguete=new Juguete($tipo,$precio,$pais,$pathDestino);
if($juguete->Modificar($id)){

    move_uploaded_file($pathOrigen,$pathDestino);
    header("Location:Listado.php");
    echo "se modifico";
}else{
    echo "no se pudo modificar.";
}


?>