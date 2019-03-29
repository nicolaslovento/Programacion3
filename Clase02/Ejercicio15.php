<?php

    function mostrarPotencias(){

        for($i=1;$i<5;$i++)
        echo "Potencias del $i: ".pow($i,1)."-".pow($i,2)."-".pow($i,3)."-".pow($i,4)."</br>";
        
    }

    mostrarPotencias();



?>