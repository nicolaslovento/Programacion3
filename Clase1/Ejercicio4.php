<?php
    
    $contador=0;
    $suma=0;
    $acum=0;
    for($i=1;;$i++){
        for($j=2;;$j++){
            $contador++;
            $suma=$i+$j;
            if($acum<1000){
                $acum=$acum+$suma;
            }else{
                $acum=$acum-$suma;
                echo $acum."</br>";
                echo "Numeros sumados".$contador;
                $flag=1;
                break;
            }
            
        }
        if($flag==1){
            break;
        }    
        
    }
    
?>