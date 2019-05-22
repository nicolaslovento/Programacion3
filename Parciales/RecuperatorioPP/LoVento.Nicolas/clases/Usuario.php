<?php

class Usuario{

    private $_email;
    private $_clave;
    

    public function __construct($email,$clave){
        $this->_email=$email;
        $this->_clave=$clave;
        ;

    }

    public function ToJSON(){
        return '{"email":"'.$this->_email.'","clave":"'.$this->_clave.'"}';
    }

    public function GuardarEnArchivo(){
        $retorno=new stdClass();
        $retorno->exito=false;
        $retorno->mensaje="no se guardó";
        $file=fopen("./archivos/usuarios.json","a");
        if(fwrite($file,$this->ToJSON()."\r\n")){
            $retorno->exito=true;
            $retorno->mensaje="se guardo";
        }
        fclose($file);


        return json_encode($retorno);
    }

    public static function TraerTodos(){
        $arrayUsuarios=array();
        $file=fopen("./archivos/usuarios.json","r");

        while(!feof($file)){

            $jsonLeido=trim(fgets($file));
            
            if($jsonLeido==""){
                continue;
            }

            $objJson=json_decode($jsonLeido);
            $nuevoUsuario=new Usuario($objJson->email,$objJson->clave);
            array_push($arrayUsuarios,$nuevoUsuario);
        }
        
        fclose($file);

        return $arrayUsuarios;
    }

    public static function VerificarExistencia($usuario){
        
        $arrayUsuarios=Usuario::TraerTodos();

        foreach($arrayUsuarios as $usuarioGuardado){
            if($usuarioGuardado->ToJSON()===$usuario->ToJSON()){
                return true;
            }
        }

        return false;
    }



}
?>