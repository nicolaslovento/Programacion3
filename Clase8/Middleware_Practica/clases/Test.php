<?php

class Test{

    public static function MetodoEstatico($request,$response,$next){

        $response->getBody()->write('<br>Middleware en metodo estatico..');
        return $response;
    }
    public function MetodoInstancia($request,$response,$next){

        $response->getBody()->write('<br>Middleware en metodo instancia..');
        return $response;
    }
}


?>