<?php
    include("Conexion.php");
    include("./plantilla/navbar.php");
    //$productos=Mostrar("productos");
    $productos= Conexion::Conectar()->query("select * from productos where IDPRODUCTO=10");
    /*foreach ($productos as $key => $value) :
        $productos[$key]['FOTOG']=base64_encode($value['FOTOG']);
        $productos[$key]['FOTOP']=base64_encode($value['FOTOP']);
    endforeach;*/
   //$cantidad=1;
   while($lista=$productos->fetch_row()){
       $prod=$lista;
        $prod[3]=base64_encode($lista[3]);
        $prod[4]=base64_encode($lista[4]);
    }
  //  print_r( $prod);
?>
<section>
    <div class="container m5 m card"> 
        <div class="row offset-md">
            <div class="col-sm-1">
                <img class="card-body justify-content-center" src="data:image/png ;base64,<?php echo $prod[3];?>">
            </div>
            <img class="col-sm card-body2 justify-content-center" src="data:image/jpeg ;base64,<?php echo $prod[3];?>">
            <div class="col-sm">
                <h2 class="line-bottom text-center align-self-start"><?php echo $prod[2];?> </h2>
                <h5>Detalle:</h5>
                <p><?php echo $prod[7];?></p>
                <div>
                    <div>
                        <h5 class="custom-control-inline">Precio unidad: </h5><i class="fa fa-dollar"></i>
                        <p class="custom-control-inline"><?php echo $prod[5];?></p>
                    </div>
                </div>
                <div class="text-center">
                    <h6 >Agregar producto al carrito</h6>
                    <div class="qty-box">
                        <button class="btn fa fa-minus-circle text-lg-center" ></button>
                        <input type="number" class="qty canti" step="1" min="1" max="" name="cantidad" value="<?php echo $cantidad=1;?>" size="4" placeholder="" inputmode="numeric">
                        <button class="btn fa fa-plus-circle"></button>
                    </div>
                    <div class="row justify-content-center ">
                        <div class="text-center">
                            
                            <button class="btn1 btn-outline-success close agregar" value="<?php echo $prod[0];?>"> Agregar </button>
                        </div>
                        <!--div>
                            <a href="/login" class="btn1 btn-outline-success close ">Agregar</a>
                        </div-->
                    </div>
                </div>
            </div>
        </div>
    </div>  
</section>
 
<?php include("./plantilla/footer.php") ?>