<?php
/*Aplicación Nº 36 (Empresa de turismo con promociones)
Modificar la aplicación anterior para que la empresa pueda ofrecer una promoción de acuerdo
al modo de pago y la cantidad de pasajes a comprar.
Si el pago es en efectivo se realizará un descuento del 12% del valor del pasaje. Si es por
medio de tarjetas de crédito o débito el descuento será del 7%.
Independientemente de la forma de pago, si la cantidad de pasajes es superior a 2 cada pasaje
extra se abonará el 35% menos. */       

       echo '<span><b>Valor de viaje:</b></span><br>';
       
        
        //€900, €550, €1000, €1250 y €1500
        $arrayDeDestinos=array("1"=>900,"2"=>550,"3"=>1000,"4"=>1250,"5"=>1500);        
        $valorPasaje=$arrayDeDestinos[$_POST["destino"]];
        $importeTotal=0;

        if($_POST["metodoDePago"]==1){//efectivo: 12% descuento

            switch($_POST["pasajes"]){
                case 1:
                    $importeTotal=$valorPasaje*0.88;
                    
                    break;
                case 2:
                    $importeTotal=($valorPasaje*0.88)*2;
                    
                    break;
                case 3:
                    $importeTotal=($valorPasaje*0.88)*2;
                    $importeTotal+=$valorPasaje*0.65;
                    
                    break;
                case 4:
                    $importeTotal=($valorPasaje*0.88)*2;
                    $importeTotal+=($valorPasaje*0.65)*2;
                    
                    break;
                case 5:
                    $importeTotal=($valorPasaje*0.88)*2;
                    $importeTotal+=($valorPasaje*0.65)*3;
                    
                    break;
            }

            echo "$".$importeTotal;

        }else{//tarjeta de credito o debito: 7% descuento

                switch($_POST["pasajes"]){
                    case 1:
                        $importeTotal=$valorPasaje*0.93;
                        
                        break;
                    case 2:
                        $importeTotal=($valorPasaje*0.93)*2;
                        
                        break;
                    case 3:
                        $importeTotal=($valorPasaje*0.93)*2;
                        $importeTotal+=$valorPasaje*0.65;
                        
                        break;
                    case 4:
                        $importeTotal=($valorPasaje*0.93)*2;
                        $importeTotal+=($valorPasaje*0.65)*2;
                        
                        break;
                    case 5:
                        $importeTotal=($valorPasaje*0.93)*2;
                        $importeTotal+=($valorPasaje*0.65)*3;
                        
                        break;
                }

                echo "$".$importeTotal;
            }
    ?>