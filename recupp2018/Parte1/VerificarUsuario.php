<?php

require_once ("./clases/Usuario.php");

$email=$_POST['email'];
$clave=$_POST['clave'];

$usuario=new Usuario($email,$clave);

$retorno=new stdClass();
$retorno->exito=false;
$retorno->mensaje="El usuario no existe";
echo $email.$clave;
if(Usuario::VerificarExistencia($usuario)==true){

    setcookie($email,date("YmdGis") , time()+360);
    $retorno->exito=true;
    $retorno->mensaje="El usuario existe y se creo la cookie";
    header("location:ListadoUsuarios.php");

}

echo json_encode($retorno);


?>