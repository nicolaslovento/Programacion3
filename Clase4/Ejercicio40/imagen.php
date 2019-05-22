<?php


switch($_SERVER["QUERY_STRING"]){

    case 1:
    echo "<img src=Imagenes/Chrysanthemum.jpg>"."<br>";
    break;
    case 2:
    echo "<img src=Imagenes\Hydrangeas.jpg>"."<br>";
    break;
    case 3:
    echo "<img src=Imagenes\Penguins.jpg>"."<br>";
    break;
    case 4:
    echo "<img src=Imagenes\Tulips.jpg>"."<br>";
    break;
}

echo "<a href='index.php'>Volver a la pagina principal</a>";

?>