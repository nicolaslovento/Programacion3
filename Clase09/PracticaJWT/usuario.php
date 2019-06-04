<?php

class Usuario{

    private $nombre;
    private $apellido;
    private $division;

    public function __construct($nombre,$apellido,$division)
    {
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->division=$division;
    }

    public static function Verificar($user){
        
        $arrayUsuarios=Usuario::TraerTodos();
        //cho $usuarios[0]['nombre'];
        //var_dump($usuarios);
        //var_dump($user);
        //$i=0;
        
        foreach($arrayUsuarios as $usuarioGuardado){
            if($usuarioGuardado->nombre==$user->nombre){
                return true;
            }
        }

        return false;

    }

    private static function TraerTodos(){

        $arrayUsuarios=array();
        $user1=new Usuario('nicolas','Lovento','3A');
        $user2=new Usuario('daniel','gutierrez','1A');
        $user3=new Usuario('sofia','lala','2A');

        array_push($arrayUsuarios,$user1);
        array_push($arrayUsuarios,$user2);
        array_push($arrayUsuarios,$user3);
        //var_dump($usuarios);

        return $arrayUsuarios;
    }

    
}



?>