<?php
    include('../Conexion.php');
    /*$id=$_GET['id'];
    $cantidad=$_GET['cantidad'];
    $datos=array($id,$cantidad);
    //return $datos;
    echo(json_encode($datos));*/
class PeticionesCarrito
{
 /*   public function verificar()
    {
        $validado=true;
        if(Auth::user()==null)
            $validado=false;
        return CarritoResource::collection(array(['valido'=>$validado]))[0];
    }*/
    public function Agregar()
    {
        session_start(['name'=>'Carrito']);
        if($_GET['cantidad']>0){
            $sql="SELECT *  FROM productos where IDPRODUCTO =". $_GET['id'];
            $producto=Conexion::Conectar()->query($sql);
            $prod=$producto->fetch_row();
            $prod[3]=base64_encode($prod[3]);
            if(isset($_SESSION['carrito']))
            {
                $agregado=$_SESSION['carrito'];
                $index=0;
                for($x=0;$x<count($agregado);$x++)
                {
                    if($agregado[$x]['IDPRODUCTO']==$_GET['id'])
                        $index=$x;
                }
                if($agregado[$index]['IDPRODUCTO']==$_GET['id']){
                    if(isset($_GET['actualizar'])){
                        if(isset($_GET['sumar'])){
                            $agregado[$index]['CANTIDAD']=$agregado[$index]['CANTIDAD']+1;
                        }
                        else
                            if(isset($_GET['restar']))
                                $agregado[$index]['CANTIDAD']=$agregado[$index]['CANTIDAD']-1;
                            else
                                $agregado[$index]['CANTIDAD']=$_GET['cantidad'];
                    }
                    else
                        $agregado[$index]['CANTIDAD']=$agregado[$index]['CANTIDAD']+$_GET['cantidad'];
                    $_SESSION['carrito']=$agregado;
                }
                else{
                    $nuevoarreglo=array(
                        'IDPRODUCTO'=> $prod[0],
                        'DESCRIPCIONCORTA'=>$prod[2],
                        'FOTOG'=>$prod[3],
                        'PRECIO'=>$prod[5],
                        'CANTIDAD'=>$_GET['cantidad'],
                    );
                    array_push($agregado,$nuevoarreglo);
                    $_SESSION['carrito']=$agregado;
                }
            }else
            {
                $arreglo[]=array(
                    'IDPRODUCTO'=> $prod[0],
                    'DESCRIPCIONCORTA'=>$prod[2],
                    'FOTOG'=>$prod[3],
                    'PRECIO'=>$prod[5],
                    'CANTIDAD'=>$_GET['cantidad'],
                );
                $_SESSION['carrito']=$arreglo;
                $index=0;
            }
            echo (json_encode(array(
                                0=> $_SESSION['carrito'][$index]['CANTIDAD'],
                                1=>PeticionesCarrito::Contar()
                 )           )      );
        }
        else{
            if(isset($_GET['actualizar'])&&$_GET['cantidad']==0){
                if(isset($_SESSION['carrito'])){
                    unset($_SESSION['carrito'][$_GET['actualizar']]);
                    $_SESSION['carrito']=array_values($_SESSION['carrito']);
                    if(count($_SESSION['carrito'])==0)
                        session_destroy();
                }
                echo (json_encode(array(
                                        0=> 0,
                                        1=>0
                        )           )      );  
            }
            else{
                $_SESSION['carrito']=array_values($_SESSION['carrito']);
                echo (json_encode(array(
                                        0=> $_SESSION['carrito'][$index]['CANTIDAD'],
                                        1=>PeticionesCarrito::Contar()
                        )           )      );             
            } 
        }
    }
    public function Contar(){
        if(isset($_GET['contar']))
            session_start(['name'=>'Carrito']);
        $totalprod=0;
        if(isset($_SESSION['carrito'])){
            for($x=0;$x<count($_SESSION['carrito']);$x++)
                $totalprod=$totalprod+$_SESSION['carrito'][$x]['CANTIDAD'];
        }
        return $totalprod;
    }
    public function borrarcarrito($accion){
        session_start();
        if(isset($_SESSION['carrito']))
            if($accion=='items')
            {
                if(Auth::user()==null)
                {
                    session_destroy();
                    return CarritoResource::collection([]);
                }
                return CarritoResource::collection(array(['items'=>count($_SESSION['carrito'])]))[0];
            }
            else{
                if($accion=='mostrar')
                    return CarritoResource::collection($_SESSION['carrito']);
            }
        else
            return CarritoResource::collection(array(['items'=>0]))[0];
    }
}

?>