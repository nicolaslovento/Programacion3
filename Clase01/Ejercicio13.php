<!--Aplicación Nº 13 (Arrays asociativos II)
Cargar los tres arrays con los siguientes valores y luego ‘juntarlos’ en uno. Luego mostrarlo por
pantalla.
“Perro”, “Gato”, “Ratón”, “Araña”, “Mosca”
“1986”, “1996”, “2015”, “78”, “86”
“php”, “mysql”, “html5”, “typescript”, “ajax”
Para cargar los arrays utilizar la función array_push. Para juntarlos, utilizar la función
array_merge.-->


<?php

    $mascotas=array();
    $años=array();
    $lenguajes=array();
    $arrayJuntos=array();
    array_push($mascotas,"Perro","Gato","Ratón","Araña","Mosca");
    array_push($años,"1986","1996", "2015", "78", "86");
    array_push($lenguajes,"php", "mysql", "html5", "typescript", "ajax");

    $arrayJuntos=array_merge($mascotas,$años,$lenguajes);

    foreach($arrayJuntos as $valor){
        echo $valor.",";
    }

?>