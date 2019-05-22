<?php

class Auto{


private $_color;
private $_precio;
private $_marca;
private $_fecha;

public function __construct($marca,$color,$precio=0,$fecha="sin fecha")
{
    $this->_marca=$marca;
    $this->_color=$color;
    if($precio!=0){
        $this->_precio=$precio;
    }
    if(strcmp($fecha,"sin fecha")<1){
        $this->_fecha=$fecha;
    }
    
}

public function AgregarImpuestos($impuesto){

    $this->_precio+=$impuesto;
}

public static function MostrarAuto($auto){

    return sprintf("Marca: %s Color: %s Precio: %g Fecha: %s",$auto->_marca,$auto->_color,$auto->_precio,$auto->_fecha);
}

public function Equals($auto2){

    if($this->_marca===$auto2->_marca){
        return true;
    }

    return false;
}

public static function Add($auto1,$auto2){

    if($auto1->Equals($auto2) && ($auto1->_color===$auto2->_color)){

        return $auto1->_precio+$auto2->_precio;
    }else{
        return 0;
    }

}


}
?>