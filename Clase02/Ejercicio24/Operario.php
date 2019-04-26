<?php

class Operario{
    private $_apellido;
    private $_legajo;
    private $_nombre;
    private $_salario;

    public function __construct($legajo,$apellido,$nombre)
    {
        $this->_apellido=$apellido;
        $this->_legajo=$legajo;
        $this->_nombre=$nombre;
    }

    public function SetSalario($salario){

        $this->_salario=$salario;
    }

    public function GetSalario(){
        return $this->_salario;
    }

    public function SetAumentarSalario($aumento){

        $nuevoSalario=($this->_salario*$aumento)/100;
    }

    public function GetNombreApellido(){
        return $this->_nombre.",".$this->_apellido;
    }

    public function MostrarInstancia(){
        return "Nombre y apellido: ".$this->GetNombreApellido()."<br>Legajo:".$this->_legajo."<br>Salario: ".$this->_salario;
    }

    public static function Mostrar($op){
        return $op->MostrarInstancia();
    }

    public function Equals($op){
        if($this->GetNombreApellido()==$op->GetNombreApellido() && $this->_legajo==$op->_legajo){
            return true;
        }else{
            return false;
        }
    }

}

?>