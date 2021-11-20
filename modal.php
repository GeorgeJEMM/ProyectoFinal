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
                            <input type="submit" @click="modalconfirmar=true" class="btn1 btn-outline-success close offset-md-3" value="Siguiente" >
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
                                    <input :class="correcto()" type="number" v-model="celular" name="celular" id="celular" class="form-control celular">
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <input v-if="valido" type="submit" data-toggle="modal" data-target="#modal2" class="btn1 btn-outline-success close offset-md-3" value="Confirmar orden de compra" >
                            </div>
                    </form>
                    <div>
                        <input type="submit" @click="activodireccion=true; activocel=false;izder=false" class="btn1 btn-outline-warning close " value="Atras" >
                    </div>
                    {{telfcelular}}
                </div>
            </transition>
            <div v-if="modalconfirmar" class="modal fade" id="modal2" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg modal-dialog-centered justify-content-center">
                    <div class="modal-content">
                        <div class="modal-header bg-white">
                            <div class="modal-title navbar-brand" @click="modalconfirmar=false">Confirmar</div>
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