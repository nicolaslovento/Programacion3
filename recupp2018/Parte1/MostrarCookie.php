<?php
$retorno=new stdClass();
$retorno->exito=false ;
$retorno->mensaje  =  " No hay cookie con estos correos electrónicos " ;
$email=isset($_GET["email"]) ? $_GET["email"]: " ";

if($email!=" "){
$auxEmail=str_replace("." ,"_" ,$email);

    if(isset($_COOKIE[$auxEmail])){

            $retorno->exito=true ;
            $retorno->mensaje=$_COOKIE[$auxEmail];
    }else{
         echo  "No se busca nada" ;
    }
            
}

echo json_encode($retorno);

?>