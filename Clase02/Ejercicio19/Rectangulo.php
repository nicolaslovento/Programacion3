<?php



class Rectangulo extends FiguraGeometrica{

private $_base;
private $_altura;


public function __construct($color,$b,$a){

    parent::__construct($color);
    $this->_base=$b;
    $this->_altura=$a;
    $this->CalcularDatos();

}

protected function CalcularDatos(){

    $this->perimetro=($this->_base*2)+($this->_altura*2);
    $this->superficie=($this->_base*$this->_altura);
}

public function ToString()
{
    return "<b>RECTANGULO</b></br>Base: ".$this->_base."</br>Altura: ".$this->_altura.parent::ToString();
}

public function Dibujar(){

    $texto ='</br><div style="color:'.$this->_color.';">';
    for($i=0;$i<$this->_altura;$i++){

        $texto.= str_repeat("*",$this->_base);
        $texto.= "</br>";
        
    }
    $texto.="</div>";

    return $texto;
    
}


}



?>