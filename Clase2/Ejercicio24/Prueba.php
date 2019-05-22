<?php
include_once ("Operario.php");
include_once ("Fabrica.php");


$op1=new Operario(144,"Lo Vento","Nicolas");
$op1->SetSalario(15000);

$op2=new Operario(144,"Lo Vento","Nicolas");
$op2->SetSalario(25620);

$op3=new Operario(133,"Gutierrez","Nadia");
$op3->SetSalario(35240);

$fab=new Fabrica("S.A");

echo "MUESTRO UNO<br>";
echo Operario::Mostrar($op1);
echo "<br>";

echo "AGREGO OPERARIOS<br>";
if($fab->Add($op1)){
    echo "se agrego..";
    echo "<br>";
}
if($fab->Add($op2)){
    echo "se agrego..";
    echo "<br>";
}else{
    echo "no se agrego..";
    echo "<br>";
}
if($fab->Add($op3)){
    echo "se agrego..";
    echo "<br>";
}

echo "Costo de salarios: ".Fabrica::MostrarCosto($fab);
echo "<br>";

echo "MUESTRO OPERARIOS<br>";
echo $fab->MostrarOperarios();

echo "ELIMINO UNO<br>";
$fab->Remove($op3);

echo "MUESTRO OPERARIOS<br>";
echo $fab->MostrarOperarios();
?>