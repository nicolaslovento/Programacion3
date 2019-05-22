<?php

require_once ("./clases/Usuario.php");

$email=$_REQUEST['email'];
$clave=$_REQUEST['clave'];

$usuario=new Usuario($email,$clave);

$retorno=new stdClass();
$retorno->exito=false;
$retorno->mensaje="El usuario no existe";

if(Usuario::VerificarExistencia($usuario)==true){

    echo "as";
    setcookie($email,date("YmdGis"), time()+360);
    $retorno->exito=true;
    $retorno->mensaje="El usuario existe y se creo la cookie";
    header("location:ListadoUsuarios.php");

}

echo json_encode($retorno);


?>