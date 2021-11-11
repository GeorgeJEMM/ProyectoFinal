<?php

class Conexion
{

    static public function Conectar() {
        global $con;
        $usuario = 'root';
        $clave = '';
        $con = new mysqli('localhost',$usuario,$clave,'proyectofinal');
        if ($con->connect_error)
            echo "Fallo al conectar a MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
        else
            return $con;
    }
    static public function Conectar_Usuario($usuario,$contrasena){
        $con = new mysqli("localhost",$usuario,$contrasena,"proyectofinal");
        if ($con->connect_error)
            echo "Fallo al conectar a MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
        else
            return $con;
    }
}
?>