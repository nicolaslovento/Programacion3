<?php
//include_once ("Operario.php");

class Fabrica{
    private $_cantMaxOperarios;
    private $_operarios;
    private $_razonSocial;
    

    public function __construct($rs)
    {
        $this->_razonSocial=$rs;
        $this->_operarios=array();
        $this->_cantMaxOperarios=5;
    }
    
    private function RetornarCostos(){
        
        $costo=0;
        for($i=0;$i<count($this->_operarios);$i++){

            $costo+=$this->_operarios[$i]->GetSalario();
        }

        return $costo;
    }

    public function MostrarOperarios(){

        $retorno="";
        for($i=0;$i<count($this->_operarios);$i++){

            $retorno.=$this->_operarios[$i]->MostrarInstancia()."<br>";
        }

        return $retorno;
    }

    public static function MostrarCosto($fb){
        return $fb->RetornarCostos();
    }

    public static function Equals($fabrica,$op){

        for($i=0;$i<count($fabrica->_operarios);$i++){

            if($fabrica->_operarios[$i]->Equals($op)){
                return true;
            }
        }
        return false;
    }

    public function Add($op){
        
        if(count($this->_operarios)<$this->_cantMaxOperarios){
            
            if(!Fabrica::Equals($this,$op)){
                
                array_push($this->_operarios,$op);
                return true;
            }
        }
        return false;
    }

    public function Remove($op){
        
        if(Fabrica::Equals($this,$op)){
                
            $index=array_search($op,$this->_operarios);
            unset($this->_operarios[$index]);
                return true;
        }
        
        return false;
    }


    

}

?>