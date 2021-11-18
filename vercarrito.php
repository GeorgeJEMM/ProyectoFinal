<?php
    include './plantilla/encabezado.php';
    session_start(['name'=>'Carrito']);
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
                    <div class="modal-header bg-white">
                        <div class="modal-title navbar-brand ">Confirmar orden</div>
                            <button class="close btn1 btn-outline-success" data-dismiss="modal" data-target="#modal1" >X</button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <transition name="tap" >
                                    <div v-if="tap">
                                        <div class="row justify-content-center">
                                            <table class=" table table-success">
                                                <tbody>
                                                    <tr>
                                                        <th class="text-center">Subtotal:</th>
                                                        <th class="text-left subto">{{subtot}}</th>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center">Iva 12%:</th>
                                                        <th class="text-left iva">{{i}}</th>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center">Total a pagar:</th>
                                                        <th class="text-left tap">{{totap}}</th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row justify-content-end">
                                            <input type="submit" @click="activodireccion=true; tap=false;izder=true" class="btn1 btn-outline-success close offset-md-3" value="Sigiente" >
                                        </div>
                                    </div>
                                </transition>
                                <transition :name="transi">
                                    <div v-if="activodireccion">
                                        <input type="radio" id="uno" value="nuevo" v-model="direcc">
                                        <label for="uno">Ingresar nueva direccion</label>
                                        <input type="radio" id="Dos" value="viejo" v-model="direcc">
                                        <label for="Dos">Elegir direccion</label>
                                        <div v-if="direcc==='nuevo'">
                                            <h4 class="mb-4">Ingrese la direccion a enviar</h4>
                                        </div>
                                        <div v-else>
                                            <h4 class="mb-4">Elija la direccion de su domicilio</h4>
                                            <div class="row justify-content-center">
                                                <select @click="asignar(selected)" v-model="selected" class="select">
                                                    <option disabled value="" selected>Seleccione una direccion</option>
                                                    <option :label="'Direccion '+((index++)+1)" v-for="(d,index) in direcciones" :key="index">{{index-1}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <pre>(*)Campos obligatorios</pre>
                                        <form method="post" @submit.prevent="agregardireccion" enctype="multipart/form-data" >
                                            <div class="form-group row">
                                                <label for ="provincia" class="col-sm-12 col-form-label text-left">Provincia<span>*</span></label>
                                                <div class="col-sm-12">
                                                    <input type="text" name="provincia" id="provincia"  class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for ="ciudad" class="col-sm-12 col-form-label text-left">Ciudad<span>*</span></label>
                                                <div class="col-sm-12">
                                                    <input type="text" name="ciudad" id="ciudad" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for ="sector" class="col-sm-12 col-form-label text-left">Sector<span>*</span></label>
                                                <div class="col-sm-12">
                                                    <input type="text" name="sector" id="sector" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for ="calleprincipal" class="col-sm-12 col-form-label text-left">Calle principal<span>*</span></label>
                                                <div class="col-sm-12">
                                                    <input type="text" name="calleprincipal" id="calleprincipal" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for ="callesecundaria" class="col-sm-12 col-form-label text-left">Calle secundaria<span>*</span></label>
                                                <div class="col-sm-12">
                                                    <input type="text" name="callesecundaria" id="callesecundaria" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for ="numerodecasa" class="col-sm-12 col-form-label text-left">Numero de casa<span>*</span></label>
                                                <div class="col-sm-12">
                                                    <input type="text" name="numerodecasa" id="numerodecasa" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for ="imagendireccion" class="col-sm-2 col-form-label text-left">Imagen de referencia</label>
                                                <div class="col-sm-2 offset-md-3">
                                                    <div class="div_file form-control ">
                                                        <input @change="asignarruta($event)" type="file" name="imagendireccion" id="imagendireccion"  class="btn btn-block btn-add div_button" accept="image/*" >
                                                    </div>
                                                </div>
                                                    <label for ="imagendireccion" class="col-sm-2 col-form-label text-left">{{imagen}}</label>
                                            </div>
                                            <div class="row justify-content-end">
                                                <input type="submit" class="btn1 btn-outline-success close offset-md-3" value="Siguiente" >
                                            </div>
                                        </form>
                                        <div class="puesto">
                                            <input type="submit" @click="confirmarsubtotal();activodireccion=false; tap=true " class="btn1 btn-outline-warning close " value="Atras" >
                                        </div>
                                    </div>
                                </transition>
                                <transition name="celular">
                                    <div v-if="activocel" class="puesto1">
                                        <h4 class="mb-4">Ingrese su numero celular para informar la llegada de los productos</h4>
                                        <form  method="post" @submit.prevent="prevenir" enctype="multipart/form-data">
                                                <div class="form-group row">
                                                    <label for ="celular" class="col-sm-12 col-form-label text-left">Número celular<span>*</span></label>
                                                    <div class="col-sm-12">
                                                        <input type="number" name="celular" id="celular" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row justify-content-end">
                                                    <input type="submit" data-toggle="modal" data-target="#modal2" class="btn1 btn-outline-success close offset-md-3" value="Confirmar orden de compra" >
                                                </div>
                                        </form>
                                        <div>
                                            <input type="submit" @click="activodireccion=true; activocel=false;izder=false" class="btn1 btn-outline-warning close " value="Atras" >
                                        </div>
                                    </div>
                                </transition>
                                <div class="modal fade" id="modal2" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg modal-dialog-centered justify-content-center">
                                        <div class="modal-content">
                                            <div class="modal-header bg-white">
                                                <div class="modal-title navbar-brand ">Confirmar</div>
                                            </div>
                                            <div class="modal-body close">
                                            Confirme su pedido por favor
                                            </div>
                                            <div class="modal-footer row justify-content-center">
                                                <button type="button" class="btn1 btn-outline-danger close offset-md-3" data-dismiss="modal" aria-label="Close">Cancelar</button>
                                                <button type="button"  @click="confirmar"><a href="/vercarrito"  class="btn1 btn-outline-success close offset-md-3">Aceptar</a></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
    include './plantilla/footer.php'
?>
