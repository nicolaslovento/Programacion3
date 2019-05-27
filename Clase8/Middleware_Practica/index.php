<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once './vendor/autoload.php';
require_once '/clases/AccesoDatos.php';
require_once '/clases/cd.php';
require_once '/clases/Test.php';
require_once '/clases/Verificadora.php';
require_once '/clases/Usuario.php';
$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

/*
¡La primera línea es la más importante! A su vez en el modo de 
desarrollo para obtener información sobre los errores
 (sin él, Slim por lo menos registrar los errores por lo que si está utilizando
  el construido en PHP webserver, entonces usted verá en la salida de la consola 
  que es útil).

  La segunda línea permite al servidor web establecer el encabezado Content-Length, 
  lo que hace que Slim se comporte de manera más predecible.
*/

//*********************************************************************************************//
//INICIALIZO EL APIREST
//*********************************************************************************************//
$app = new \Slim\App(["settings" => $config]);

//*********************************************************************************************//
//CONFIGURO LOS VERBOS GET, POST, PUT Y DELETE
//*********************************************************************************************//
$app->get('[/]', function (Request $request, Response $response) {    
    $response->getBody()->write("GET => Bienvenido!!! a SlimFramework");
    return $response;

});

$app->post('[/]', function (Request $request, Response $response) {   
    $response->getBody()->write("POST => Bienvenido!!! a SlimFramework");
    return $response;

});

$app->put('[/]', function (Request $request, Response $response) {  
    $response->getBody()->write("PUT => Bienvenido!!! a SlimFramework");
    return $response;

});

$app->delete('[/]', function (Request $request, Response $response) {  
    $response->getBody()->write("DELETE => Bienvenido!!! a SlimFramework");
    return $response;

});

$app->group('/credenciales',function(){

    $this->get('[/]', function ($request, $response, $args) {
        $response->getBody()->write("Estoy en GET");
    });

    $this->post('[/]', function ($request, $response, $args) {
        

        $response->getBody()->write("Estoy en POST");
    });

    

})->add(function($request,$response,$next){
    //Agrego middleware a nivel grupo.
    if($request->IsGet()){//$request(Todo lo que trae la solicitud)
        $response->getBody()->write('Middleware uno en get..<br>');
        $response=$next($request,$response);//llamada a la API
        $response->getBody()->write('<br>Middleware uno en get..');
    }

    if($request->IsPost()){
        $response->getBody()->write('Middleware uno en post..<br>');
        $arrayParam=$request->getParsedBody();

        if($arrayParam['nombre']=='admin'){

            $response=$next($request,$response); //llamada a la API. Proxima que se puede ejecutar
        }else{

            $response->getBody()->write('<br>No tiene permisos para acceder..');
        }
       
        $response->getBody()->write('<br>Middleware uno en post..');
    }
    
    

    return $response;//siempre devuelve un objeto de tipo Response
});

//falta terminar
$app->group('/metodo', function () {

    $this->get('/instancia', function ($request, $response, $args) {
       
    })->add(\Test :: class . ':MetodoInstancia');

    $this->get('/estatico', function ($request, $response, $args) {
        
    })->add(\Test :: class . '::MetodoEstatico');
 
    
});


//Nuevo ejercicio
$app->group('/poo', function () {

    $this->get('[/]', function ($request, $response, $args) {
        $arrayUsuarios=array();
        $file=fopen("usuarios.txt","r");
        while(!feof($file)){

            $texto=trim(fgets($file));
            if($texto==""){
                continue;
            }

            $usuarioSeparado=explode("-",$texto);
            $usuarioLeido=new Usuario(trim($usuarioSeparado[0]),trim($usuarioSeparado[1]));
            array_push($arrayUsuarios,$usuarioLeido);
            

        }
        fclose($file);
        
        //var_dump($arrayUsuarios);
        return $response->withJson($arrayUsuarios,200);

    });

    $this->post('[/]', function ($request, $response) {

        $arrayParam=$request->getParsedBody();
        $usuario=new Usuario($arrayParam['tipo'],$arrayParam['nombre']);
        var_dump($arrayParam);
        $file=fopen("usuarios.txt","a");
        fwrite($file,$usuario->ToString()."\r\n");
        fclose($file);
    });
 
    
})->add(\Verificadora :: class . ':VerificarUsuario');


//*********************************************************************************************//
//RUTEOS
//*********************************************************************************************//
/*$app->get('/ruteo/', function (Request $request, Response $response) {    
    $response->getBody()->write("Ruteo, sin params");
    return $response;

});

$app->get('/ruteo/{param}', function (Request $request, Response $response) {    
    $response->getBody()->write("Ruteo, con params");
    return $response;

});

$app->get('/ruteoOpcional[/]', function (Request $request, Response $response) {    
    $response->getBody()->write("Ruteo, sin params y / opcional");
    return $response;

});

$app->get('/ruteoOpcional/{param}', function (Request $request, Response $response) {    
    $response->getBody()->write("Ruteo, con params opcional");
    return $response;

});
*/
//*********************************************************************************************//
//ATENDER TODOS LOS VERBOS DE HTTP
//*********************************************************************************************//
/*$app->any('/cualquiera/[{id}]', function ($request, $response, $args) {
    
    var_dump($request->getMethod());
    $id=$args['id'];
    $response->getBody()->write("Cualquier verbo de HTTP. Parametro: {$id} - ");
    return $response;
});*/

//*********************************************************************************************//
//ATENDER ALGUNOS VERBOS DE HTTP
//*********************************************************************************************//
/*$app->map(['GET', 'POST'], '/mapeado', function ($request, $response, $args) {

      var_dump($request->getMethod());
     $response->getBody()->write("Solo POST y GET - ");
});
*/
//*********************************************************************************************//
//AGRUPACION DE RUTAS
//*********************************************************************************************//
/*$app->group('/saludo', function () {

    $this->get('/', function ($request, $response, $args) {
        $response->getBody()->write("HOLA, Bienvenido a la apirest... ingresá tu nombre");
    });

    $this->get('/{nombre}', function ($request, $response, $args) {
        $nombre=$args['nombre'];
        $response->getBody()->write("HOLA, Bienvenido <h1>$nombre</h1> a la apirest");
    });
 
     $this->post('/', function ($request, $response, $args) {      
        $response->getBody()->write("HOLA, Bienvenido a la apirest por post");
    });
     
});*/

//*********************************************************************************************//
//AGRUPACION DE RUTAS Y MAPEO
//*********************************************************************************************//
/*$app->group('/usuario/{id:[0-9]+}', function () {

    $this->map(['POST', 'DELETE'], '', function ($request, $response, $args) {
        $response->getBody()->write("Accedo al usuario por ID (con POST o DELETE) ");
    });

    $this->get('/nombre', function ($request, $response, $args) {
        $response->getBody()->write("Accedo al usuario por ID y retorno el nombre (con GET) ");
    });

});
*/
//*********************************************************************************************//
//PARAMETROS 
//*********************************************************************************************//
/*$app->get('/datos/', function (Request $request, Response $response) {     
    $datos = array('nombre' => 'rogelio','apellido' => 'agua', 'edad' => 40);
    $newResponse = $response->withJson($datos, 200);  
    return $newResponse;
});

$app->post('/datos/', function (Request $request, Response $response) {    
    $ArrayDeParametros = $request->getParsedBody();
    //var_dump($ArrayDeParametros);
    $objeto= new stdclass();
    $objeto->nombre=$ArrayDeParametros['nombre'];
    $objeto->apellido=$ArrayDeParametros['apellido'];
    $objeto->edad=$ArrayDeParametros['edad'];
    $newResponse = $response->withJson($objeto, 200);  
    return $newResponse;

});

$app->put('/datos/', function (Request $request, Response $response) {    
    $ArrayDeParametros = $request->getParsedBody();
    $obj = json_decode(($ArrayDeParametros["cadenaJson"]));
    var_dump($obj);
});
*/


//*********************************************************************************************//
/*LLAMADA A METODOS DE INSTANCIA DE UNA CLASE*/
//*********************************************************************************************//
/*$app->group('/cd', function () {   

    $this->get('/', \cd::class . ':traerTodos');
    $this->get('/{id}', \cd::class . ':traerUno');
    $this->delete('/', \cd::class . ':BorrarUno');
    $this->put('/', \cd::class . ':ModificarUno');*/

//*********************************************************************************************//
//SUBIDA DE ARCHIVOS (SE PUEDEN TENER FUNCIONES DEFINIDAS)
//*********************************************************************************************//
  /*  $this->post('/', function (Request $request, Response $response) {
            
        $ArrayDeParametros = $request->getParsedBody();
        //var_dump($ArrayDeParametros);
        $titulo= $ArrayDeParametros['titulo'];
        $cantante= $ArrayDeParametros['cantante'];
        $año= $ArrayDeParametros['anio'];
        
        $micd = new cd();
        $micd->titulo=$titulo;
        $micd->cantante=$cantante;
        $micd->año=$año;
        $micd->InsertarElCdParametros();

        $archivos = $request->getUploadedFiles();
        $destino="./fotos/";
        //var_dump($archivos);
        //var_dump($archivos['foto']);

        $nombreAnterior=$archivos['foto']->getClientFilename();
        $extension= explode(".", $nombreAnterior)  ;
        //var_dump($nombreAnterior);
        $extension=array_reverse($extension);

        $archivos['foto']->moveTo($destino.$titulo.".".$extension[0]);
        $response->getBody()->write("cd");

        return $response;

    });
     
});
*/

$app->run();