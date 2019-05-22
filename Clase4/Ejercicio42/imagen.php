<?php
require_once "funciones.php";


$nombresDeFotos=$_FILES["fotos"]["name"];
$tamaños=$_FILES["fotos"]['size'];
$tmp_name=$_FILES["fotos"]["tmp_name"];
var_dump($tamaños);
var_dump($nombresDeFotos);
//ValidarYGuardarFotoEnCarpeta($nombresDeFotos,$tamaños,$tmp_name);
//MostrarImagenes();


?>