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
                                <button class=" btn fa fa-minus-circle text-lg-center" @click="resta(index,producto.cantidad)"  ></button>
                                    <div class="linea2" v-else>
                                        <div><?php echo $_SESSION['carrito'][$x]['CANTIDAD'];?></div>
                                    </div>
                                <button class=" btn fa fa-plus-circle" @click="suma(index,producto.cantidad)"></button>
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
</section>
<?php
    include './plantilla/footer.php'
?>
