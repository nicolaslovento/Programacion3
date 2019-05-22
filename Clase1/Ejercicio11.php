<!--Aplicación Nº 11 (Carga aleatoria)
Imprima los valores del vector asociativo siguiente usando la estructura de control foreach:
$v[1]=90; $v[30]=7; $v['e']=99; $v['hola']= 'mundo';-->

<?php

    $v[1]=90;
    $v[30]=7;
    $v['e']=99;
    $v['hola']= 'mundo';

    foreach($v as $valor){
        echo $valor."<br>";
    }


?>


