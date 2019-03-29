<?php

    function validarPalabra($palabra,$max){

        if(strlen($palabra)<=$max){

            $arreglo=array("Recuperatorio","Parcial","Programacion");
            if(in_array($palabra,$arreglo)){
                return 1;
            }

            return 0;
        }

        return 0;
    }

    echo validarPalabra("Programacion",15);


?>