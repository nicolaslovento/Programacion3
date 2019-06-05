<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Firebase\JWT\JWT;


require_once './vendor/autoload.php';
require_once 'usuario.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;


$app = new \Slim\App(["settings" => $config]);

$app->post("/Crear[/]",function (Request $request, Response $response) {   
    $userDatos=$request->getParsedBody();
    
    $payload = array('nombre'=>$userDatos['nombre'],'apellido'=>$userDatos['apellido'],'division'=>$userDatos['division']);
    //$ahora=time();
    $token=JWT::encode($payload,"miClave");

    

    return $response->withJson($token,200);
});

$app->post("/Verificar[/]",function (Request $request, Response $response) {   
    $userDatos=$request->getParsedBody();
    $token=$userDatos['token'];
    if(empty($token) || $token===""){
        throw new Exception("El token esta vacio");
    }

    try
    {
        $decodificado=JWT::decode(
            $token,
            "miClave",
            ['HS256']
        );
    }
    catch(Exception $e){
        throw new Exception("Token no valido!!");
    }
    
    return "Token valido"; 
});

//falta
$app->post("/ObtenerPayload[/]",function (Request $request, Response $response) {   
    $userDatos=$request->getParsedBody();
    $token=$userDatos['token'];
    if(empty($token) || $token===""){
        throw new Exception("El token esta vacio");
    }

    try{
        $decodificado=JWT::decode(
            $token,
            "miClave",
            ['HS256']
        );
        //var_dump($decodificado);
        $retorno=new stdClass();
        $retorno->nombre=$decodificado->nombre;
        $retorno->apellido=$decodificado->apellido;
        $retorno->division=$decodificado->division;
        
    }
    catch(Exception $e){
        throw new Exception("Token no valido!!");
    }
    
    return $response->withJson($retorno,200); 
});

$app->group("/jwt",function(){

    $this->post("/Recibir",function (Request $request,Response $response){
            $arrayParametros=$request->getParsedBody();

            $user=new stdClass();
            $user->nombre=$arrayParametros['nombre'];
            $user->apellido=$arrayParametros['apellido'];
            $user->division=$arrayParametros['division'];

            if(Usuario::Verificar($user)){
                

                //$response=$response->withJson("sii",200);
                $payload = array(
                    'data'=>$user
                );
                //$ahora=time();
                $token=JWT::encode($payload,"miClave");
                
                $response=$response->withJson($token,200);
            }else{
                $retornoFail=new stdClass();
                $retornoFail->mensaje="El usuario no se encuentra";
                $response=$response->withJson($retornoFail,409);
            }

            return $response;
        

            

    });
})->add(function($request,$response,$next){
    
    $flag = true;
    if($_POST['nombre']=="" || $_POST['apellido']=="" || $_POST['division']=="")
    {
        $flag=false;
    }
 
    if($flag==true)
    {
      $response =$next($request,$response);
    }
    else
    {
        $retorno= new stdClass();
        $retorno->mensaje="Error algun parametro esta vacio";
        return $response->withJson($retorno,409);
        
    }
 
     return $response;
    

})->add(function($request,$response,$next){
    
    if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['division'])){

        $response->withJson(true,200);;
        $response= $next($request,$response);
        
    }else{
        return $response->withJson("error",409);
    }

    return $response;
    
    
});





$app->run();