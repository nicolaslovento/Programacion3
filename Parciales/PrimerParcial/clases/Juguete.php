<?php
include_once ("IParte1.php");
include_once ("Conexion.php");
include_once ("IParte2.php");

class Juguete implements IParte1{
    private $_tipo;
    private $_precio;
    private $_paisOrigen;
    private $_pathImagen;

    public function __construct($tipo,$precio,$paisOrigen,$pathImagen="sin foto"){
        $this->_tipo=$tipo;
        $this->_precio=$precio;
        $this->_paisOrigen=$paisOrigen;
        $this->_pathImagen=$pathImagen;

    }

    public function GetTipo(){
        return $this->_tipo;
    }
    public function GetPrecio(){
        return $this->_precio;
    }
    public function GetPaisOrigen(){
        return $this->_paisOrigen;
    }
    public function GetPathImagen(){
        return $this->_pathImagen;
    }

    public function ToString(){
        return $this->_tipo."-".$this->_precio."-".$this->_paisOrigen."-".$this->_pathImagen;
    }

    public function Agregar(){
        $objCon=new Conexion();
        $conexion=$objCon->GetConexion();
        $sentencia=$conexion->prepare('INSERT INTO juguetes (tipo,precio,pais,foto) VALUES (:tipo,:precio,:pais,:foto)');
        $sentencia->bindValue(':tipo',$this->_tipo,PDO::PARAM_STR);
        $sentencia->bindValue(':precio',$this->_precio,PDO::PARAM_STR);
        $sentencia->bindValue(':pais',$this->_paisOrigen,PDO::PARAM_STR);
        $sentencia->bindValue(':foto',$this->_pathImagen,PDO::PARAM_STR);
        $sentencia->execute();

        if($sentencia->rowCount()>0){

            return true;
        }else{
            
            return true;
        }

        
    }

    public static function Traer(){

        $arrayJuguetes=array();
        $objCon=new Conexion();
        $conexion=$objCon->GetConexion();
        $sentencia=$conexion->prepare('SELECT* FROM juguetes');
        $sentencia->execute();

        while($objJuguete=$sentencia->fetch()){

            $juguete=new Juguete($objJuguete[1],$objJuguete[2],$objJuguete[3],$objJuguete[4]);
            array_push($arrayJuguetes,$juguete);
        }
        

        return $arrayJuguetes;

    }

    public static function MostrarLog(){
        $retorno="";
        $file=fopen("./archivos/juguetes_sin_foto.txt","r");

        $retorno=fread($file,filesize(("./archivos/juguetes_sin_foto.txt")));

        fclose($file);

        return $retorno;
    }

    public function CalcularIva(){

        return $this->_precio*1.21;
    }

    public function Verificar($arrayJuguetes){

        foreach ($arrayJuguetes as $objJuguete) {
            
            if($objJuguete->GetTipo()==$this->GetTipo() && $objJuguete->GetPaisOrigen()==$this->GetPaisOrigen()){
                return false;
            }
        }

        return true;
    }

    public function Modificar($id){

        $objCon=new Conexion();
        $conexion=$objCon->GetConexion();
        $consulta=$conexion->prepare("UPDATE juguetes SET tipo=:tipo,precio=:precio,pais=:pais,foto=:foto WHERE id=".$id);
        $consulta->bindValue(':tipo', $this->_tipo, PDO::PARAM_STR);
        $consulta->bindValue(':precio', $this->CalcularIVA(), PDO::PARAM_STR);
        $consulta->bindValue(':pais', $this->_paisOrigen, PDO::PARAM_STR);
        $consulta->bindValue(':foto', $this->_pathImagen, PDO::PARAM_STR);

        
        $consulta->execute();
        if($consulta->rowCount()){
            return true;
        }else{
            return false;
        }
    }
}

?>