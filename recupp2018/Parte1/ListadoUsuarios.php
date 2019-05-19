<?php
require_once ("./clases/Usuario.php");


$arrayUsuarios=Usuario::TraerTodos();
$retorno="";
foreach($arrayUsuarios as $usuario){
    $retorno.=$usuario->toJSON()."\n";
}

echo $retorno;

?>