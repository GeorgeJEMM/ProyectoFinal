<?php
    include("./plantilla/encabezado.php");
    $productos=Mostrar("productos");
    foreach ($productos as $key => $value) :
        $productos[$key]['FOTOG']=base64_encode($value['FOTOG']);
        $productos[$key]['FOTOP']=base64_encode($value['FOTOP']);
    endforeach;
   //$cantidad=1;
    /*print_r( $productos[9]['FOTOG']);*/
?>
 <main>
    <section>
    
    <div class="container m5 m card"> 
        <div class="row offset-md">
            <div class="col-sm-2">
                <img class="card-body justify-content-center" src="data:image/png ;base64,<?php echo $productos[9]['FOTOG'];?>">
                <!--img class="card-body justify-content-center" src="data:image/png ;base64,<?php echo $productos[9]['FOTOG'];?>"-->
            </div>
            <img class="col-sm card-body2 justify-content-center" src="data:image/jpeg ;base64,<?php echo $productos[9]['FOTOG'];?>">
            <div class="col-sm">
                <h2 class="line-bottom text-center align-self-start"><?php echo $productos[9]['DESCRIPCIONCORTA'];?> </h2>
                <h5>Detalle:</h5>
                <p><?php echo $productos[9]['DESCRIPCIONLARGA'];?></p>
                <div>
                    <div>
                        <h5 class="custom-control-inline">Precio unidad: </h5><i class="fa fa-dollar"></i>
                        <p class="custom-control-inline"><?php echo $productos[9]['PRECIO'];?></p>
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
                            
                            <button class=" btn1 btn-outline-success close "> Agregar </button>
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
 </main>
<?php include("./plantilla/footer.php") ?>