<?php
include_once ("Juguete.php");

$tipo=$_POST['tipo'];
$precio=$_POST['precio'];
$paisOrigen=$_POST['paisOrigen'];

$juguete=new Juguete($tipo,$precio,$paisOrigen);

if($juguete->Agregar()){

    $file=fopen("./archivos/juguetes_sin_foto.txt","a");
    if(fwrite($file,date("Yis")."-".$juguete->ToString()."\r\n")){
        echo "Se escribio con exito";
    }else{
        echo $juguete->ToString();
    }

    fclose($file);

}



?>