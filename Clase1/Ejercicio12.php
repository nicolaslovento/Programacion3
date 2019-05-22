<!--Aplicación Nº 12 (Arrays asociativos)
Realizar las líneas de código necesarias para generar un Array asociativo $lapicera, que
contenga como elementos: ‘color’, ‘marca’, ‘trazo’ y ‘precio’. Crear, cargar y mostrar tres
lapiceras.-->

<?php 

    $lapicera1=array("color"=>"rojo","marca"=>"aa","trazo"=>"fino","precio"=>34);

    foreach($lapicera1 as $key => $valor){
        echo "Clave: ".$key." Valor: ".$valor."<br>";
    }

?>