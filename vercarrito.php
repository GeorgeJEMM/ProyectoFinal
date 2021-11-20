<?php
    session_start(['name'=> 'Carrito']);
    include './plantilla/navbar.php';
    //print_r($_SESSION['carrito'][0]);
?>
<section >
    <div  class="container mt-4 m">
        <h2>CARRITO DE COMPRAS</h2>
        <div class="">
            <?php
            if(isset($_SESSION['carrito'])){
            ?>
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
                                    <button class=" btn fa fa-minus text-lg-center cartminus" onclick="cantidadrestarcart(<?php echo $_SESSION['carrito'][$x]['IDPRODUCTO'];?>, <?php echo $x; ?>,<?php echo $_SESSION['carrito'][$x]['PRECIO'];?>)"></button>
                                        <div class="linea2" >
                                        <input type="number" class="qty canti<?php echo $x; ?>" step="1" min="1" max="" name="cantidad" value="<?php echo $_SESSION['carrito'][$x]['CANTIDAD'];?>" size="4" placeholder="" inputmode="numeric">
                                        </div>
                                    <button class=" btn fa fa-plus" onclick="cantidadsumarcart(<?php echo $_SESSION['carrito'][$x]['IDPRODUCTO'];?>, <?php echo $x; ?>,<?php echo $_SESSION['carrito'][$x]['PRECIO'];?>)"></button>
                                </td>
                                <td class="text-left total<?php echo $x; ?>"><i class="fa fa-dollar colorfuente "></i> <?php echo ($_SESSION['carrito'][$x]['PRECIO']*$_SESSION['carrito'][$x]['CANTIDAD']);?></td>
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
                        <div class="linea close">Subtotal:</div><i class="fa fa-dollar colorfuente"></i><span class="subtotal close"></span> 
                    </div>
                </div>
                <div class="row ">
                    <a href="index.php" class="btn1 btn-outline-danger  my-4 close offset-md-4"><i class="fa fa-arrow-left"></i> Seguir Comprando</a>
                    <div class="btn1 btn-outline-success my-4 close col-md-2 offset-md-3" data-toggle="modal" data-target="#modal1" ><i class="fa fa-check"></i>Generar Orden de compra</div>
                </div>    
            <?php
            }else{
            ?>
                <div><h3 class="row justify-content-center my-5">Sin productos en el carrito </h3>
            <?php } ?>
            <div class="modal fade" tabindex="-1" id="modal1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content ">
                        <?php include "modal.php";?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
    include './plantilla/footer.php'
?>