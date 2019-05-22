<?php
include_once ("Juguete.php");

$tipo=$_POST['tipo'];
$precio=$_POST['precio'];
$paisOrigen=$_POST['paisOrigen'];


$juguete=new Juguete($tipo,$precio,$paisOrigen);

$arrayDeJuguetes=Juguete::Traer();

if($juguete->Verificar($arrayDeJuguetes)){

    
    $ubicacion=$_FILES['img']['tmp_name'];
    $pathImagen="./juguetes/imagenes/".$tipo.".".$precio.".".$paisOrigen.".".date("Gis").".".pathinfo($_FILES['img']['name'],PATHINFO_EXTENSION);
    $jugueteConImagen=new Juguete($tipo,$precio,$paisOrigen,$pathImagen);
    if($jugueteConImagen->Agregar()){

        if(move_uploaded_file($ubicacion,$pathImagen)){

            header("Location:Listado.php");
        }
        }else{
            echo "Error.No se pudo cargar.";
        }
}else{
    echo "Ya existe";
}



?>