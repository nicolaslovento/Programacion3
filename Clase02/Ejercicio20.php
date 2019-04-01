<?php

require_once ("Auto.php");

$a1=new Auto("Kia","Rojo",221232);
$a2=new Auto("Kia","Azul",233000);

$a3=new Auto("Fiat","Negro",221232);
$a4=new Auto("Fiat","Negro",233000);

$a5=new Auto("Peugeot","Blanco",233000,"23/02/2004");

$a3->AgregarImpuestos(1500);
$a4->AgregarImpuestos(1500);
$a5->AgregarImpuestos(1500);

$resultado=Auto::Add($a1,$a2);
if($resultado!=0){

    echo "</br>Suma auto 1 y 2: ".$resultado;
}else{
    echo "</br>LOS AUTOS NO SON IGUALES, NO SE PUEDEN SUMAR. ";
}


if($a1->Equals($a2)){
    echo "</br>Auto 1 y 2 son iguales";
}else{
    echo "</br>Auto 1 y 2 NO son iguales";
}

if($a1->Equals($a5)){
    echo "</br>Auto 1 y 5 son iguales";
}else{
    echo "</br>Auto 1 y 5 NO son iguales";
}

echo "</br>".Auto::MostrarAuto($a1);
echo "</br>".Auto::MostrarAuto($a3);
echo "</br>".Auto::MostrarAuto($a5);
?>