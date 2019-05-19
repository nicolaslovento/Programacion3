<?php
require_once ("IParte2.php");
require_once ("./Conexion.php");
class Televisor implements IParte2{
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



}