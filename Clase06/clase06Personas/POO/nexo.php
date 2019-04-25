<?php

include_once ("AccesoDatos.php");
include_once ("persona.php");

$op = isset($_POST['op']) ? $_POST['op'] : NULL;

switch ($op) {
    /*case 'accesoDatos':
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM ");
        $consulta->execute();
        
        $consulta->setFetchMode(PDO::FETCH_INTO, new cd);
        
        foreach ($consulta as $cd) {
        
            print_r($cd->MostrarDatos());
            print("
                    ");
        }

        break;*/
 
    case 'mostrarTodos':

        $personas = Persona::TraerTodasLasPersonas();
        
        foreach ($personas as $p) {
            
            echo $p->MostrarDatos();
            print("
                    ");
        }
    
        break;

    case 'insertarPersona':
    
        $p = new persona();
        $p->id =4;
        $p->nombre = "Roberto";
        $p->apellido ="Gonzalez";
        
        
        $p->InsertarPersona();

        echo "ok";
        
        break;

    case 'modificarPersona':
    
        $id = $_POST['id'];        
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];

    
        echo Persona::ModificarPersona($id, $nombre, $apellido);
            
        break;

    case 'eliminarPersona':
    
        $p = new Persona();
        $p->id = 4;
        
        $p->EliminarPersona($p);

        echo "ok";
        
        break;
        
        
    default:
        echo ":(";
        break;
}
