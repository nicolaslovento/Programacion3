<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
require 'clases/Usuarios.php';
$app = new \Slim\App;



$app->group('/Usuario',function(){

    $this->post('/Alta[/]', \Usuario::class . '::AltaUsuario' );
    $this->get('/TraerUno[/]', \Usuario::class . '::TraerUnUsuario');
    $this->get('/TraerTodos[/]', \Usuario::class . '::TraerTodos');
    $this->delete('/EliminarUsuario[/]', \Usuario::class . '::EliminarUsuario');
    $this->put('/ModificarUsuario[/]', \Usuario::class . '::ModificarUsuario');
});


$app->run();

?>