<?php
    include './plantilla/encabezado.php';
    session_start(['name'=>'Carrito']);
    //print_r($_SESSION['carrito'][0]);
?>
<section>
    <div  class="container mt-4 m">
        <h2>CARRITO DE COMPRAS</h2>
        <div v-if="carrito.length>0" class="">
            <div class="row justify-content-center">
                <table class=" table table-success text-center">
                    <thead class="table-success ">
                        <tr >
                            <th>Indice</th>
                            <th colspan="2" >Nombre del Producto</th>
                            <th> Precio</th>
                            <th> Cantidad</th>
                            <th colspan="2" class="text-left"> Total</th>
                        </tr>
                    </thead>
                    <tbody >
                        <?php
                            for($x=0;$x<count($_SESSION['carrito']);$x++){
                        ?>
                        <tr>
                            <td><?php echo $x+1?></td>
                            <td><img src="data:image/png ;base64,<?php echo $_SESSION['carrito'][$x]['FOTOG'];?>" alt="" width="50" ></td>
                            <td class="text-left"><?php echo $_SESSION['carrito'][$x]['DESCRIPCIONCORTA'];?></td>
                            <td ><i class="fa fa-dollar colorfuente"></i> <?php echo $_SESSION['carrito'][$x]['PRECIO'];?></td>
                            <td>
                                <button class=" btn fa fa-minus text-lg-center cartminus"></button>
                                    <div class="linea2" v-else>
                                   <p><input type="number" class="qty canti<?php echo $x; ?>" step="1" min="1" max="" name="cantidad" value="<?php echo $_SESSION['carrito'][$x]['CANTIDAD'];?>" size="4" placeholder="" inputmode="numeric"><span>focus fire</span></p> 
                                    </div>
                                <button class=" btn fa fa-plus cartplus"></button>
                            </td>
                            <td class="text-left"><i class="fa fa-dollar colorfuente"></i>0</td>
                            <td class="">
                            <button  @click="eliminardelCarrito(index)"><i class="fa fa-trash colorfuente"></i></button>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="row ">
               <div class="card-header2  col-md-2 offset-md-8 text-center" >
                   <div class="linea close">Subtotal:</div><i class="fa fa-dollar colorfuente"></i> {{parseFloat(subtot).toFixed(2)}}
               </div>
            </div>
            <div class="row ">
               <a href="index.php" class="btn1 btn-outline-danger  my-4 close offset-md-4"><i class="fa fa-arrow-left"></i> Seguir Comprando</a>
               <div class="btn1 btn-outline-success my-4 close col-md-2 offset-md-3" data-toggle="modal" data-target="#modal1" ><i class="fa fa-check"></i>Generar Orden de compra</div>
            </div>
        </div>
        <div v-else> <h3 class="row justify-content-center my-5">Sin productos en el carrito </h3></div>
        <div class="modal fade" tabindex="-1" id="modal1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content ">
                    <Confirmar :sub="parseFloat(subtot).toFixed(2)"/>
                </div>
            </div>
        </div>
    </div>
    <div id="conrol">
        <?php echo $prueba=10;?>
    </div>
</section>
<?php
    for($x=0;$x<count($_SESSION['carrito']);$x++){
?>
<script type="text/javascript">
    const contar1<?php echo $x;?>=document.querySelector('.canti<?php echo $x; ?>');
    const contar<?php echo $x;?>=document.querySelector('.canti<?php echo $x; ?>');
    var cantidad<?php echo $x;?>=0;
    contar<?php echo $x;?>.addEventListener('keypress',CatidadKey<?php echo $x; ?>);
    
    function CatidadInput<?php echo $x; ?>(evObject) {
        console.log(evObject);
        document.querySelector('.canti<?php echo $x; ?>').value=null;
        document.querySelector('.canti<?php echo $x; ?>').value=<?php echo $_SESSION['carrito'][$x]['CANTIDAD'];?>;
        /*if(parseInt(elCaracter<?php echo $x;?>)>=0&&parseInt(elCaracter<?php echo $x;?>)<=9){
            var idproducto<?php echo $x;?>= <?php echo $_SESSION['carrito'][$x]['IDPRODUCTO'];?>;
            console.log(idproducto<?php echo $x;?>);
            /*console.log("funciona");
            var request="./peticiones/carrito.php?id="+ idproducto +"&cantidad="+document.querySelector('.canti').value+"&actualizar";
            console.log(request);
            fetch(request)
            .then(function(response){
                return response.text();
            });
        }*/
        
    }
    function CatidadKey<?php echo $x; ?>(evObject) {
        var elCaracter<?php echo $x;?> = String.fromCharCode(evObject.which);
        //console.log(evObject.which);
        if(parseInt(elCaracter<?php echo $x;?>)>=0&&parseInt(elCaracter<?php echo $x;?>)<=9){
            cantidad<?php echo $x;?>= document.querySelector('.canti<?php echo $x; ?>').value;
            contar1<?php echo $x;?>.addEventListener('input',CatidadInput<?php echo $x; ?>(cantidad<?php echo $x;?>));
            console.log(cantidad<?php echo $x;?>);
            var idproducto<?php echo $x;?>= <?php echo $_SESSION['carrito'][$x]['IDPRODUCTO'];?>;
            console.log(idproducto<?php echo $x;?>);
            //document.querySelector('.canti<?php echo $x; ?>').value=null;
            /*console.log("funciona");
            var request="./peticiones/carrito.php?id="+ idproducto +"&cantidad="+document.querySelector('.canti').value+"&actualizar";
            console.log(request);
            fetch(request)
            .then(function(response){
                return response.text();
            });*/
        }
        
    }
</script>
<?php
    }
?>
<?php
    include './plantilla/footer.php'
?>
