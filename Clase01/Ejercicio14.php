<!--Aplicación Nº 14 (Arrays de Arrays)
Realizar las líneas de código necesarias para generar un Array asociativo y otro indexado que
contengan como elementos tres Arrays del punto anterior cada uno. Crear, cargar y mostrar los
Arrays de Arrays.-->

<?php 

    $mascotas=array();
    $años=array();
    $lenguajes=array();

    array_push($mascotas,"Perro","Gato","Ratón","Araña","Mosca");
    array_push($años,"1986","1996", "2015", "78", "86");
    array_push($lenguajes,"php", "mysql", "html5", "typescript", "ajax");

    $arrayAsociativo=array("uno"=>$mascotas,"dos"=>$años,"tres"=>$lenguajes);
    $arrayIndexeado=array($mascotas,$años,$lenguajes);    

    foreach($arrayAsociativo as $elemento){
        
        foreach($elemento as $valor){
            echo $valor."<br>";
        }
    }

    foreach($arrayIndexeado as $elemento){
        
        foreach($elemento as $valor){
            echo $valor."<br>";
        }
    }

?>

