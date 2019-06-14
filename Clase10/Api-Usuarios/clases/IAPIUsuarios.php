<?php

interface IAPIUsuario{

    public static function AltaUsuario($request,$response,$args);
    public static function TraerTodos($request,$response,$args);
    public static function TraerUnUsuario($request,$response,$args);
    public static function EliminarUsuario($request,$response,$args);
    public static function ModificarUsuario($request,$response,$args);
}


?>