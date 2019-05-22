<?php
require_once ("IParte2.php");
require_once ("IParte3.php");
require_once ("IParte4.php");
require_once ("./Conexion.php");
class Televisor implements IParte2,IParte3,IParte4{
    public $tipo;
    public $precio;
    public $paisOrigen;
    public $path;

    public function __construct($tipo="sin tipo",$precio="sin precio",$paisOrigen="sin pais",$path="sin foto"){
        $this->tipo=$tipo;
        $this->precio=$precio;
        $this->paisOrigen=$paisOrigen;
        $this->path=$path;

    }

    public function ToJSON(){

       $retorno=new stdClass();
       $retorno->tipo=$this->tipo;
       $retorno->precio=$this->precio;
       $retorno->paisOrigen=$this->paisOrigen;
       $retorno->path=$this->path;

       return json_encode($retorno);
    }

    public function Agregar(){
        $ojbCon=new Conexion();
        $conexion=$ojbCon->GetConexion();
        $consulta=$conexion->prepare("INSERT INTO televisores (tipo,precio,pais,foto) VALUES (:tipo,:precio,:pais,:foto)");
        $consulta->bindValue(":tipo",$this->tipo,PDO::PARAM_STR);
        $consulta->bindValue(":precio",$this->precio,PDO::PARAM_INT);
        $consulta->bindValue(":pais",$this->paisOrigen,PDO::PARAM_STR);
        $consulta->bindValue(":foto",$this->path,PDO::PARAM_STR);

        $consulta->execute();

        if($consulta->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public static function Traer(){
        $ojbCon=new Conexion();
        $conexion=$ojbCon->GetConexion();
        $consulta=$conexion->query("SELECT * FROM televisores");
        
        $arrayTelevisores=$consulta->fetchAll(PDO::FETCH_CLASS, "stdClass");
        //var_dump($arrayTelevisores);
        return $arrayTelevisores;
    }

    public function CalcularIva()
    {
        return $this->precio*1.21;
    }

    public function Modificar($id){

        $retorno=new stdClass();
        $retorno->exito=false;
        $retorno->mensaje="No se pudo cargar";

        $objCon=new Conexion();
        $conexion=$objCon->GetConexion();
        $sentencia=$conexion->prepare('UPDATE televisores SET tipo=:tipo,precio=:precio,pais=:pais,foto=:foto WHERE id='.$id);
        $sentencia->bindValue(':tipo',$this->tipo,PDO::PARAM_STR);
        $sentencia->bindValue(':precio',$this->precio,PDO::PARAM_INT);
        $sentencia->bindValue(':pais',$this->paisOrigen,PDO::PARAM_STR);
        $sentencia->bindValue(':foto',$this->path,PDO::PARAM_STR);
        
        $sentencia->execute();

        if($sentencia->rowCount()>0){
            header("location:Listado.php");
        }else{
            
            echo json_encode($retorno);
        }
        
    }

    public function Eliminar(){
        $retorno=new stdClass();
        $retorno->exito=false;
        $retorno->mensaje="No se pudo cargar";

        $objCon=new Conexion();
        $conexion=$objCon->GetConexion();
        $sentencia=$conexion->prepare('DELETE FROM televisores WHERE tipo=:tipo');
        $sentencia->bindValue(':tipo',$this->tipo,PDO::PARAM_STR);
        $sentencia->execute();
        if($sentencia->rowCount()>0){

           header("location:Listado.php");
        }else{
            
            echo json_encode($retorno);
        }
        
    }
    



}