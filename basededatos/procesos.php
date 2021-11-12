<?php 
include("conexion.php");

function Mostrar($tabla){
    $con=conectar();
    /*switch ($num) {
        case 1:
            $sql="SELECT *  FROM tipoproduc";
            break;
        case 2:
            $sql="SELECT *  FROM productos where TIPOPRODUC = $id";
            break;
    }*/
    $sql="SELECT *  FROM $tabla";
    $query=mysqli_query($con,$sql);
    $rows = array();
    while($r=mysqli_fetch_assoc($query)){
        $rows[] = $r;
    }
    Desconectar($con);
    return $rows;
}

function Insert($num,$id){
    $con=conectar();
    switch ($num) {
        case 1:
            $CODTIPOPRO=$_POST['CODTIPOPRO'];
            $NOMBRETIPO=$_POST['NOMBRETIPO'];
            $LUGAR=$_POST['LUGAR'];
            $DISPONIBILIDAD=$_POST['DISPONIBILIDAD'];
            $sql="INSERT INTO tipoproduc VALUES('$CODTIPOPRO','$NOMBRETIPO','$LUGAR','$DISPONIBILIDAD')";
            $query= mysqli_query($con,$sql);
            if($query){
                Header("Location: tablauno.php");
            }else {
            }
            break;
        case 2:
            $CODPRODUCTO=$_POST['CODPRODUCTO'];
            $DESCRIPCION=$_POST['DESCRIPCION'];
            $PRECIO=$_POST['PRECIO'];
            $TIPOPRODUC=$_POST['TIPOPRODUC'];
            $sql="INSERT INTO productos VALUES('$CODPRODUCTO','$DESCRIPCION','$PRECIO','$TIPOPRODUC')";
            $query= mysqli_query($con,$sql);
            if($query){
                Header("Location: tablamuchos.php?id=$id");
            }else {
            }
            break;
    }
}

function Actualizar($num){
    $con=conectar();
    $id=$_GET['id'];
    switch ($num) {
        case 1:
            $sql="SELECT * FROM tipoproduc WHERE CODTIPOPRO='$id'";
            break;
        case 2:
            $sql="SELECT * FROM productos WHERE CODPRODUCTO='$id'";
            break;
        }
    $query=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($query);
    return $row;
}

function Update($num, $id){
    $con=conectar();
    switch ($num) {
        case 1:
            $CODTIPOPRO=$_POST['CODTIPOPRO'];
            $NOMBRETIPO=$_POST['NOMBRETIPO'];
            $LUGAR=$_POST['LUGAR'];
            $DISPONIBILIDAD=$_POST['DISPONIBILIDAD'];
            $sql="UPDATE tipoproduc SET  NOMBRETIPO='$NOMBRETIPO',LUGAR='$LUGAR',DISPONIBILIDAD='$DISPONIBILIDAD' WHERE CODTIPOPRO='$CODTIPOPRO'";
            $query=mysqli_query($con,$sql);

            if($query){
                Header("Location: tablauno.php");
            }
            else {
            }
            break;
        case 2:
            $DESCRIPCION=$_POST['DESCRIPCION'];
            $PRECIO=$_POST['PRECIO'];
            $TIPOPRODUC=$_POST['TIPOPRODUC'];
            $CODPRODUCTO=$_POST['CODPRODUCTO'];
            $sql="UPDATE productos SET  DESCRIPCION='$DESCRIPCION',PRECIO='$PRECIO',TIPOPRODUC='$TIPOPRODUC' WHERE CODPRODUCTO='$CODPRODUCTO'";
            $query=mysqli_query($con,$sql);
            if($query){
                Header("Location: tablamuchos.php?id=$id");
            }
            break;
    }
}

function Eliminar($num,$id){
    $con=conectar();
    switch ($num) {
        case 1:
            $CODTIPOPRO=$_GET['id'];
            $sql="DELETE FROM tipoproduc  WHERE CODTIPOPRO='$CODTIPOPRO'";
            $query=mysqli_query($con,$sql);
            $sql="DELETE FROM productos  WHERE TIPOPRODUC='$CODTIPOPRO'";
            $query=mysqli_query($con,$sql);
            if($query){
                Header("Location: tablauno.php");
            }
            break;
        case 2:
            $CODPRODUCTO=$_GET['id'];
            $sql="DELETE FROM productos  WHERE CODPRODUCTO='$CODPRODUCTO'";
            $query=mysqli_query($con,$sql);
            if($query){
                Header("Location: tablamuchos.php?id=$id");
            }
            break;
    }
}

function CantRegis($num){
    $con=conectar();
    switch ($num) {
        case 1:
            $sql="SELECT count(*) FROM tipoproduc";
            break;
        case 2:
            $sql="SELECT count(*) FROM productos";
            break;
    }
    $query=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($query);
    return $row;
}

function EliminarCascada($num, $eliminar){
    $con=conectar();
    $cad = "'";
    $cant = count($eliminar);
    $query=[];
    for($i=0;$i<$cant;$i++){
        if($i<$cant-1)
            $cad =$cad.$eliminar[$i]."','";
        else
            $cad = $cad.$eliminar[$i]."'";
    }
    switch ($num) {
        case 1:
            $sql = "SELECT * FROM tipoproduc WHERE CODTIPOPRO IN ($cad)";
            break;
        case 2:
            $sql = "SELECT * FROM productos WHERE CODPRODUCTO IN ($cad)";
            break;
    }
    $query=mysqli_query($con,$sql);
    $row = array();
    while($r=mysqli_fetch_assoc($query)){
        $row[] = $r;
    }
    return $row;
}

function DeletCascada($num, $eliminar, $id){
    $con=conectar();
    switch ($num) {
        case 1:
            $sql = "DELETE FROM tipoproduc WHERE CODTIPOPRO IN ($eliminar);";
            $query=mysqli_query($con,$sql);
            $sql = "DELETE FROM productos WHERE TIPOPRODUC IN ($eliminar);";
            $query=mysqli_query($con,$sql);
            if($query){
                Header("Location: tablauno.php");
            }
            break;
        case 2:
            $sql = "DELETE FROM productos WHERE CODPRODUCTO IN ($eliminar);";
            $query=mysqli_query($con,$sql);
            if($query){
                Header("Location: tablamuchos.php?id=$id");
            }
            break;
    }
}

?>