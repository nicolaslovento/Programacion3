<?php
require_once ("./clases/Televisor.php");

$tipo=$_POST['tipo'];
$pais=$_POST['paisOrigen'];
$precio=$_POST['precio'];
$foto=$_FILES['foto']['tmp_name'];

$tele=new Televisor($tipo,$precio,$pais,$foto);
$destino="./televisores/imagenes/".$tele->tipo.".".$tele->paisOrigen.".".date("gis").".jpg";
$tele->path=$destino;


move_uploaded_file($foto,$destino);

$retorno=new stdClass();
$retorno->exito=false;
$retorno->mensaje="No se pudo cargar";

$objCon=new Conexion();
$conexion=$objCon->GetConexion();
$sentencia=$conexion->prepare('INSERT INTO televisores (tipo,precio,pais,foto) VALUES (:tipo,:precio,:pais,:foto)');
$sentencia->bindValue(':tipo',$tele->tipo,PDO::PARAM_STR);
$sentencia->bindValue(':precio',$tele->precio,PDO::PARAM_INT);
$sentencia->bindValue(':pais',$tele->paisOrigen,PDO::PARAM_STR);
$sentencia->bindValue(':foto',$tele->path,PDO::PARAM_STR);
$sentencia->execute();

if($sentencia->rowCount()>0){
    header("location:Listado.php");
}else{
    
    echo json_encode($retorno);
}



?>

