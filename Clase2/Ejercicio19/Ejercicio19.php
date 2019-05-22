<?php   

require_once "FiguraGeometrica.php";
require_once "Rectangulo.php";
require_once "Triangulo.php";

$rectangulo=new Rectangulo("#F00505",16,4);

echo $rectangulo->ToString();
echo $rectangulo->Dibujar();

$triangulo=new Triangulo("#F00505",9,5);

echo $triangulo->ToString();
echo $triangulo->Dibujar();

?>