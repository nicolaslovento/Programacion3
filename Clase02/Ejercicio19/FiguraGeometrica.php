<?php

abstract class FiguraGeometrica{

    protected $_color;
    protected  $perimetro;
    protected $superficie;

    public function __construct($color){

        $this->SetColor($color);
        
    }

    public function GetColor(){
        return $this->_color;
    }
    public function SetColor($color){
        $this->_color=$color;
    }

    public function ToString(){

        return "</br>Color: ".$this->_color."</br>Perimetro: ".$this->perimetro."</br>Superficie: ".$this->superficie."</br>";
    }

    protected abstract function CalcularDatos();

    
    public abstract function Dibujar();

}

?>

