<?php
class Persona
{
    public $id;
    public $nombre;
    public $apellido;
    

    public function MostrarDatos()
    {
            return $this->id." - ".$this->nombre." - ".$this->apellido;
    }
    
    public static function TraerTodasLasPersonas()
    {    
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM persona");        
        
        $consulta->execute();
        
        $consulta->setFetchMode(PDO::FETCH_INTO, new Persona);                                                

        return $consulta; 
    }
    
    public function InsertarPersona()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO persona (id,nombre,apellido)"
                                                    . "VALUES(:id, :nombre, :apellido)");
        
        $consulta->bindValue(':id', $this->id, PDO::PARAM_INT);
        $consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
        $consulta->bindValue(':apellido', $this->apellido,PDO::PARAM_STR);
        

        $consulta->execute();   

    }
    
    public static function ModificarPersona($id, $nombre, $apellido)
    {

        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta =$objetoAccesoDato->RetornarConsulta("UPDATE persona SET nombre = :nombre, apellido = :apellido 
                                                        WHERE id = :id");
        
        $consulta->bindValue(':id', $id, PDO::PARAM_INT);
        $consulta->bindValue(':nombre', $nombre, PDO::PARAM_STR);
        $consulta->bindValue(':apellido', $apellido, PDO::PARAM_STR);
       

        return $consulta->execute();

    }

    public static function EliminarPersona($p)
    {

        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta =$objetoAccesoDato->RetornarConsulta("DELETE FROM persona WHERE id = :id");
        
        $consulta->bindValue(':id', $p->id, PDO::PARAM_INT);

        return $consulta->execute();

    }
    
}