<?php

require_once 'IAPIUsuarios.php';
require_once 'Conexion.php';

class Usuario implements IAPIUsuario{

    public $legajo;
    public $nombre;
    public $apellido;
    public $email;
    public $clave;
    public $sexo;
    public $sueldo;
    public $dni;
    public $path_foto;

    function __construct($legajo="null",$nombre="null",$apellido="null",$email="null",$clave="null",$sexo="null",$dni="null",$path_foto="null",$sueldo="null")
    {
        $this->legajo=$legajo;
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->email=$email;
        $this->clave=$clave;
        $this->sexo=$sexo;
        $this->dni=$dni;
        $this->path_foto=$path_foto;
        $this->sueldo=$sueldo;
    }

    public static function AltaUsuario($request, $response, $args)
    {
        $ArrayDeParametros = $request->getParsedBody();
        $objUsuario=json_decode($ArrayDeParametros['usuario']);
        //creo retorno
        $retorno= new stdClass();
        $retorno->Exito=false;
        $retorno->Mensaje="Error no se pudo agregar empleado";
        $retorno->Estado=404;

        
        //obtengo la foto
        $archivos= $request->getUploadedFiles();
        $foto=$archivos['foto']->getClientFilename();
        //extension
        $extension= explode(".", $foto);
        $extension=array_reverse($extension);
        $nombreFoto=date("d-m-Y").".".$objUsuario->legajo.".".$extension[0];
        $destino="./fotos/usuariosAgregados/";

        
        //creo objeto
        $nuevoUsuario=new Usuario($objUsuario->legajo,
                                $objUsuario->nombre,
                                $objUsuario->apellido,
                                $objUsuario->email,
                                $objUsuario->clave,
                                $objUsuario->sexo,
                                $objUsuario->dni,
                                $nombreFoto,
                                $objUsuario->sueldo
                            );
        
        if($nuevoUsuario->AgregarUsuarioBD()){
            $retorno= new stdClass();
            $retorno->Exito=true;
            $retorno->Mensaje="Se cargo el empleado en la BD";
            $retorno->Estado=200;
            $newResponse=$response->withJson($retorno,$retorno->Estado);
            try
            {
                $archivos["foto"]->moveTo($destino.$nombreFoto);
            }
            catch(Exception $e)
            {
                $retorno->Mensaje=$e->getMessage();
               $newResponse= $response->withJson($retorno,$retorno->Estado); 
            }
            
        }else{
            $newResponse=$response->withJson($retorno,$retorno->Estado);
        }

        return $newResponse;
        
    }

    public static function TraerUnUsuario($request,$response,$args){
        $legajo=$_GET['legajo'];
        $usuarioBuscado=Usuario::TraerUnUsuarioBD($legajo);
        if($usuarioBuscado==false){
            $retorno=new stdClass();
            $retorno->Mensaje="No se encontro el usuario";
            return $response->withJson($retorno);
        }

        return $response->withJson($usuarioBuscado,200);


    }

    public static function TraerTodos($request, $response, $args)
	{
        $legajo=$_GET['legajo'];
        $usuarioBuscado=Usuario::TraerTodosLosUsuariosBD();
        if($usuarioBuscado==false){
            $retorno=new stdClass();
            $retorno->Mensaje="No se encontro el usuario";
            return $response->withJson($retorno);
        }

        return $response->withJson($usuarioBuscado,200);
				
    }

    public static function EliminarUsuario($request, $response, $args){

        $arrayDeParametros = $request->getParsedBody();
        $legajo=$arrayDeParametros['legajo'];
    
        $retorno= new stdClass();
        $retorno->Exito=false;
        $retorno->Mensaje="No se encontro al usuario";
        

        if(Usuario::EliminarUnUsuarioBD($legajo)){

            $retorno->Exito=true;
            $retorno->Mensaje="Se borro el empleado con legajo ".$legajo;
            return $response->withJson($retorno);
        }

        return $response->withJson($retorno);
        
        
    }

    public static function ModificarUsuario($request,$response,$args){

    }


    public static function ModificarUnUsuarioBD($legajo){

        
        
    }




    public static function EliminarUnUsuarioBD($legajo){

        $objCon=new Conexion();
        $conexion=$objCon->GetConexion();
        $sentencia =$conexion->prepare("DELETE FROM usuarios WHERE legajo=:legajo");
        $sentencia->bindValue(':legajo',$legajo,PDO::PARAM_INT);
        $sentencia->execute();

        if($sentencia->rowCount()>0){
            return true;
        }
        
        return false;
        
    }

    public static function TraerTodosLosUsuariosBD()
	{
        $objCon=new Conexion();
        $conexion=$objCon->GetConexion();
        $sentencia =$conexion->prepare("SELECT * FROM usuarios ");
        $sentencia->execute();
        if($sentencia->rowCount()>0){
            $usuarioBuscado= $sentencia->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return false;
        }
        
        return $usuarioBuscado;	
    }

    public static function TraerUnUsuarioBD($legajo){

        $objCon=new Conexion();
        $conexion=$objCon->GetConexion();
        $sentencia =$conexion->prepare("SELECT * FROM usuarios WHERE legajo=:legajo");
        $sentencia->bindValue(':legajo',$legajo,PDO::PARAM_INT);
        $sentencia->execute();
        if($sentencia->rowCount()>0){
            $usuarioBuscado= $sentencia->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return false;
        }
        
        return $usuarioBuscado;
    }
    	

    public function AgregarUsuarioBD(){

        $objCon=new Conexion();
        $conexion=$objCon->GetConexion();
        $sentencia=$conexion->prepare('INSERT INTO usuarios (legajo,nombre,apellido,email,clave,sexo,dni,foto,sueldo) VALUES (:legajo,:nombre,:apellido,:email,:clave,:sexo,:dni,:foto,:sueldo)');
        $sentencia->bindValue(':legajo',$this->legajo,PDO::PARAM_INT);
        $sentencia->bindValue(':nombre',$this->nombre,PDO::PARAM_STR);
        $sentencia->bindValue(':apellido',$this->apellido,PDO::PARAM_STR);
        $sentencia->bindValue(':email',$this->email,PDO::PARAM_STR);
        $sentencia->bindValue(':clave',$this->clave,PDO::PARAM_STR);
        $sentencia->bindValue(':sexo',$this->sexo,PDO::PARAM_STR);
        $sentencia->bindValue(':dni',$this->dni,PDO::PARAM_STR);
        $sentencia->bindValue(':foto',$this->path_foto,PDO::PARAM_STR);
        $sentencia->bindValue(':sueldo',$this->sueldo,PDO::PARAM_INT);
        
        $sentencia->execute();

        if($sentencia->rowCount()>0){
            return true;
        }else{
            return false;
        }
    }


}

?>