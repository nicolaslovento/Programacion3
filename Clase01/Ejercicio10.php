<?php
$vec=array();
$contador=0;
    for($i=1;;$i++){
        if($i%2!=0){
            $vec[$contador]=$i;
            $contador++;
        }
        if($contador==10){
            break;
        }
    }
    echo "Muestro con For <br>";
    for($i=0;$i<=9;$i++){
        echo $vec[$i]."<br>";
    }
    echo "Muestro con ForEach <br>";
    foreach($vec as $valor){
        echo $valor."<br>";
    }
    echo "Muestro con While <br>";
    $contador=0;
    while($contador<sizeof($vec)){
        echo $vec[$contador]."<br>";
        $contador++;
    }
?>