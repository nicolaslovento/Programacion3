<?php

class Triangulo extends FiguraGeometrica{

private $_base;
private $_altura;


public function __construct($color,$b,$a){

    parent::__construct($color);
    $this->_altura=$a;
    $this->_base=$b;
    $this->CalcularDatos();

}

protected function CalcularDatos(){
    
    
    $this->superficie=$this->_base*($this->_altura/2);
    $this->perimetro=($this->_base)+($this->_altura*2);
}

public function ToString()
{
    return "<b>TRIANGULO</b></br>Base: ".$this->_base."</br>Altura: ".$this->_altura.parent::ToString();
}

public function Dibujar(){

    $texto ='</br><div style="color:'.$this->_color.';">';
    
    for($i=0,$j=($this->_base/2)-0.5,$a=1;$i<$this->_altura;$i++,$j-=1,$a+=2){
        
        
            $texto.=str_repeat('&nbsp;&nbsp;',$j).str_repeat('*',$a).str_repeat('&nbsp;&nbsp;',$j).'</br>';
        
        
    }

    $texto.="</div>";

    return $texto;

}

}

?>