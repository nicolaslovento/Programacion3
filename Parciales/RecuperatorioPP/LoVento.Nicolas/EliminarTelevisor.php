<?php
require_once ("./clases/Televisor.php");


$accion=isset($_POST['accion']);

if(isset($_GET['tipo'])){

    $tipo=$_GET['tipo'];
    $arrayTelevisores=Televisor::Traer();
    $esta=false;
    foreach($arrayTelevisores as $tele){
        if($tele->tipo==$tipo){
            echo "Esta en la base.";
            $esta=true;
            break;
        }
    }

    if($esta==false){
    echo "No esta en la base";
    }
}

if(isset($_POST['tipo']) && $accion=='borrar'){

    $tipo=$_POST['tipo'];
    $tele=new Televisor($tipo);
    $tele->Eliminar();   
}




?>