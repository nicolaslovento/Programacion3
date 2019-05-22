<?php  

    function CalcularDivisores($numero){


        $retorno="";
        for($i=1;$i<$numero;$i++){

            if($numero%$i==0){
                $retorno.=$i.",";
            }
        }
        $retorno[strlen($retorno)-1]="";//elimino el ultimo ","
        return $retorno;

    }
    function CalcularSumaDeCifras($numero){

        $suma=0;
        for($i=0;$i<strlen($numero);$i++){

            $suma+=$numero[$i];
        }

        return $suma;
    }

    function CalcularImpar($numero){

        $cantImpares=0;
        for($i=0;$i<strlen($numero);$i++){

            if($numero[$i]%2!=0){
                $cantImpares++;
            }
        }

        return $cantImpares;
    }

    function CalcularPar($numero){


        $cantPares=0;
        for($i=0;$i<strlen($numero);$i++){

            if($numero[$i]%2==0){
                $cantPares++;
            }
        }

        return $cantPares;

    }


?>