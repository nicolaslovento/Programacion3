<?php
    $vec=array();
    $suma=0;
    $promedio;
    
    for($i=1;$i<6;$i++){
        $vec[$i]=rand(0,10);
        $suma+=$vec[$i];
        echo "Nota ".$i.": ".$vec[$i]."<br>";
    }
    
    $promedio=$suma/sizeof($vec);
    if($promedio==6){
        echo "Igual a 6.."."Promedio: ".$promedio;
    }else if($promedio<6){
        echo "Menor a 6.."."Promedio: ".$promedio;
    }else{
        echo "Mayor a 6.."."Promedio: ".$promedio;
    }
?>