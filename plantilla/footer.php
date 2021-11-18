
    </main>


</div>

<script>
    var subtotal=0;
</script>

<script type="text/javascript" src="./public/js/carro.js"></script>
<script>
    var app = new Vue({
  el: '#app',
  data(){
        return{
            selected:'',direcciones:[],direcc:'nuevo',imagen:'',
            direccion:{
                imagendireccion:null,
                subtotal:0,
                iva:0,
                totalpag:0,
                provincia:'',
                ciudad:'',
                sector:'',
                calleprincipal:'',
                callesecundaria:'',
                numerodecasa:'',
                telefonocliente:'',
                iddireccion:'',
            },
            activodireccion:false,activocel:false,respuesta:[],direc:'viejo',
            i:0,totap:0,subtot:0,tap:true,izder:true,transicion:'entar1',
            confirmado:false,
        }
    },
    /*validations:{
        direccion:{
            provincia:{
                required
            },
            ciudad:{
                required
            },
            sector:{
                required
            },
            calleprincipal:{
                required
            },
            callesecundaria:{
                required
            },
            numerodecasa:{
                required
            },
            telefonocliente:{
                ceroynueve,
                minLength:minLength(10),
                maxLength:maxLength(10),
            }
        }
    },*/
    mounted(){
        /*axios.get('/clientedirecciones')
        .then((response)=>{
            this.direcciones=response.data.data;
        })
        .catch(function(error){
            console.log(error)
        });*/
       $(function(){
            $('#modal2').modal({
                backdrop:'static',
                keyboard:false,
                focus:false,
                show:false,
                });
            });
    },
    computed:{
        transi(){
        if(!this.izder)
            this.transicion='entar';
        else
            this.transicion='entar1';
        return this.transicion;
        
        },
        
    },
    methods:{
        /*status(validacion) {
            return {
                incorrecto: validacion.$error,
                correcto: !validacion.$invalid,
            }
        },*/
        agregardireccion(){
            this.subtot=subtotal;
            this.i=parseFloat(subtotal*0.12).toFixed(2);
            this.direccion.iva=(this.i++);
            this.direccion.subtotal=(this.subtot++);
            this.tap=parseFloat(this.direccion.iva+this.direccion.subtotal).toFixed(2);
            this.direccion.totalpag=(this.tap++);
            if(this.direccion.iddireccion=='')
                this.direccion.iddireccion=this.direcciones.length+1;
            else
                this.direccion.iddireccion=this.direcciones.length;
            /*if(!(this.$v.direccion.provincia.$invalid || this.$v.direccion.ciudad.$invalid ||
                this.$v.direccion.sector.$invalid || this.$v.direccion.calleprincipal.$invalid ||
                this.$v.direccion.callesecundaria.$invalid || this.$v.direccion.numerodecasa.$invalid))
            {
            this.activodireccion=false;
            this.activocel=true;
            }
            else{
                toastr.error("Los campos de la direccion son obligatorios")
            }*/
            this.activodireccion=false;
            this.activocel=true;
            this.tap=false;
            //console.log(this.direccion);
        },
        /*prevenir:  function(){
             if(this.$v.direccion.telefonocliente.$invalid)
                return false;
        },*/
        confirmar(){
            console.log(this.direccion)
            axios.post('/apiconfirmar',this.direccion)
            .then((response)=>{
            })
            .catch(function(error){
                console.log(error)
            });
            axios.post('/api/enviarsms',this.direccion)
            .then((response)=>{
                if (! (Notification)) {
                    alert('Web Notification is not supported');
                    return;
                    }
                    if(Notification.permission !=="granted")
                        Notification.requestPermission();
                    else
                    {
                        let notification = new Notification('Pedido generado correctamente', {
                            data:'En breve le llegara un sms',
                            icon: "../images/correcto.png" // optional image url
                        });
                    }
            })
            .catch(function(error){
                console.log(error)
            });
            $(function(){
                $('#modal1').modal('hide');
                $('#modal2').modal('hide');
            });
        },
        asignarruta(e){
            this.imagen=e.target.files[0].name;
            this.direccion.imagendireccion=this.imagen;
        },
        asignar(index){
            if(!index=='')
                this.direccion=this.direcciones[parseInt(index)];
        },
        borrar(){
            this.direccion={
                imagendireccion:null,
                subtotal:0,
                iva:0,
                totalpag:0,
                provincia:'',
                ciudad:'',
                sector:'',
                calleprincipal:'',
                callesecundaria:'',
                numerodecasa:'',
                telefonocliente:'',
                iddireccion:''
            }
            console.log(this.direccion);
        },
        puest(validacion){
            return {
                puesto:!validacion.$invalid
            }
        },
        confirmarsubtotal(){
            this.subtot=subtotal;
            this.i=parseFloat(subtotal*0.12).toFixed(2);
            console.log(this.i+this.subtot);
            this.totap=parseFloat(parseFloat(this.i)+parseFloat(this.subtot)).toFixed(2);
        }
    }
    })
</script>
<?php
if(isset($_SESSION['carrito'])){
    for($x=0;$x<count($_SESSION['carrito']);$x++){
?>
<script type="text/javascript">
    const contar<?php echo $x;?>=document.querySelector('.canti<?php echo $x; ?>');
    var cantidad<?php echo $x;?>=contar<?php echo $x;?>.value;
    contar<?php echo $x;?>.addEventListener('input',CatidadInput<?php echo $x; ?>);
    var idproducto<?php echo $x;?>=<?php echo $_SESSION['carrito'][$x]['IDPRODUCTO'];?>;
    var index<?php echo $x;?>=<?php echo $x;?>;
    function CatidadInput<?php echo $x; ?>() {
        if(
            parseInt(document.querySelector('.canti<?php echo $x; ?>').value)>=0&&
            parseInt(document.querySelector('.canti<?php echo $x; ?>').value)<=20){
            cantidad<?php echo $x;?>= document.querySelector('.canti<?php echo $x; ?>').value;
            console.log("a");
            subtotal=subtotal-(<?php echo $_SESSION['carrito'][$x]['PRECIO'];?>*cantidad<?php echo $x;?>);
            console.log(subtotal);
            var request="./peticiones/carrito.php?id="+ idproducto<?php echo $x;?> +"&cantidad="+parseInt(cantidad<?php echo $x;?>)+"&actualizar=<?php echo $x;?>";
            fetch(request)
            .then(function(response){
                //console.log(response.json());
                return response.json();
            })
            .then(function(texto){
                if(parseInt(texto[1])>=0){
                    location.reload();
                    document.querySelector('.circulo').innerHTML=texto[1];
                    var total=parseFloat(parseInt(<?php echo $_SESSION['carrito'][$x]['PRECIO'];?>)*parseInt(texto[0])).toFixed(2);
                    document.querySelector('.total<?php echo $x; ?>').innerHTML='<i class="fa fa-dollar colorfuente "></i> '+total;
                    subtotal=subtotal+(<?php echo $_SESSION['carrito'][$x]['PRECIO'];?>*texto[0]);
                    console.log(texto[1]);
                    console.log((<?php echo $_SESSION['carrito'][$x]['PRECIO'];?>*texto[0]));
                }
            });
        }
        else{
            if(document.querySelector('.canti<?php echo $x; ?>').value===""||parseInt(document.querySelector('.canti<?php echo $x; ?>').value))
                document.querySelector('.canti<?php echo $x; ?>').value="";

        }
    }
    subtotal=subtotal+(<?php echo $_SESSION['carrito'][$x]['PRECIO'];?>*document.querySelector('.canti<?php echo $x;?>').value);
    //document.querySelector('.subtotal').innerHTML=0;
</script>
<?php
    }
}
?>
<script type="text/javascript" src="./public/js/calculos.js"></script>
<script type="text/javascript" src="./public/js/agregaralcarrito.js"></script>
<!-- Optional JavaScript; choose one of the two! -->
<!-- Option 1: Bootstrap Bundle with Popper -->
<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
</body>
</html>