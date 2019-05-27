<?php
require_once ("IMiddlewareable.php");

class Verificadora implements IMiddlewareable{

    public function VerificarUsuario($request,$response,$next){

        

        if($request->IsGet()){//$request(Todo lo que trae la solicitud)
            $response->getBody()->write('Middleware uno en get..<br>');
            $response=$next($request,$response);//llamada a la API
            $response->getBody()->write('<br>Middleware uno en get..');

            return $response;
        }
    
        if($request->IsPost()){
            $response->getBody()->write('Middleware uno en post..<br>');
            $arrayParam=$request->getParsedBody();
            $retornoJson=new stdClass();
            $retornoJson->exito=false;
            $retornoJson->mensaje="El nombre ".$arrayParam['nombre']." no tiene permisos.";
            $newResponse=$response->withJson($retornoJson,403);
            if($arrayParam['nombre']=='admin'){

                $retornoJson->exito=true;
                $retornoJson->mensaje="Bienvenido admin";
                $newResponse=$response->withJson($retornoJson,200);
                
                $response=$next($request,$response); //llamada a la API. Proxima que se puede ejecutar
                
            }
            
            //$response->getBody()->write($response->withJson($retornoJson,200).'<br>');
            //$response->getBody()->write('<br>Middleware uno en post..');
         
        
        }
        
        return $newResponse;//siempre devuelve un objeto de tipo Response


    }




}

?>