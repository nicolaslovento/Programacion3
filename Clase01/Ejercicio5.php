<!--/*Aplicación Nº 5 (Obtener el valor del medio)
Dadas tres variables numéricas de tipo entero $a, $b y $c, realizar una aplicación que muestre
el contenido de aquella variable que contenga el valor que se encuentre en el medio de las tres
variables. De no existir dicho valor, mostrar un mensaje que indique lo sucedido.
Ejemplo 1: $a = 6; $b = 9; $c = 8; => se muestra 8.
Ejemplo 2: $a = 5; $b = 1; $c = 5; => se muestra un mensaje “No hay valor del medio”-->

<?php

    $a=3;
    $b=5;
    $c=4;

    
    if(((($a<$b) && ($a>$c))) || (($a>$b) && ($a<$c))){
        echo $a;
    }else{
        if(((($b<$c) && ($b>$a))) || (($b>$c) && ($b<$a))){
            echo $b;
        }else if(((($c<$b) && ($c>$a))) || (($c>$b) && ($c<$a))){
            echo $c;
        }else{
            echo "No hay valor del medio";
        }
    }

?>