<?php
    function conectar(){
        global $con;
        $host="localhost";
        $user="root";
        $pass="";
        $bd="proyectofinal";
        $con=mysqli_connect($host,$user,$pass);
        mysqli_select_db($con,$bd);
        if(!$con)
            die('Error en la conexion!!');
        return $con;
    }
    function Desconectar($con)
    {
        mysqli_close($con);
    }
?>