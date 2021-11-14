<?php
    include('peticiones.php');
    //print_r  ($_GET);
    if(isset($_GET['contar']))
        PeticionesCarrito::Contar();
    else{
        PeticionesCarrito::Agregar($_SERVER['REQUEST_METHOD']);
        //header('Location:catalogodetallesagregar.php');
    }
?>