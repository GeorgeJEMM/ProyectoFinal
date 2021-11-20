</main>
    <footer class="footer-classic">
    <div class="footer-content">
        <div class="footer-section about">
            <div>
                <h1>
                    <sup>info</sup>Mental
                </h1>
                <p>
                    Página web universitario que trata de ayudar a la comunidad en general
                    a conocer sobre los trastornos mentales causados por la cuarentena a causa del
                    virus Covid-19

                </p>
            </div>
        </div>
        <div class="footer-section contact icon">
            <div>
                <p>Contactos</p>
                <div><i class="fa fa-phone" aria-hidden="true"></i> +593-0987451235 Henry Chiluiza</div>
                <div><i class="fa fa-phone" aria-hidden="true"></i> +593-0965471248 Daniel Iza</div>
                <div><i class="fa fa-phone" aria-hidden="true"></i> +593-0974124369 Xavier Jaya</div>
                <div><i class="fa fa-phone" aria-hidden="true"></i> +593-0991234723 Ian Masache</div>
                <div><i class="fa fa-phone" aria-hidden="true"></i>+593-0997465832 Andres Salazar</div>
                <div><i class="fa fa-phone" aria-hidden="true"></i> +593-0997456891 Atik Yumbay</div>
                <div> <i class="fa fa-envelope-o" aria-hidden="true"></i> grupo6@infomental.com</div>
            </div>
        </div>
        <div class="footer-section  links">
            <div>
                <p>Siguenos en nuestras redes sociales </p>
                <div class="icon">
                    <a href="https://www.facebook.com"><i class="fa fa-facebook " aria-hidden="true"></i>infoMentalEc</a><br />
                    <a href="https://www.instagram.com/?hl=es-la"><i class="fa fa-instagram " aria-hidden="true"></i>@infoMentalEc</a><br />
                    <a href="https://twitter.com/home"><i class="fa fa-twitter " aria-hidden="true"></i>infoMentalEc</a><br />
                </div>
            </div>
        </div>
    </div>

    <div id="container"><hr id="linea" /><h4><small> &#169 2020 Todos los derechos reservados. Diseñado por Grupo 6</small></h4></div>
</footer>
</div>

<script>
    var subtotal=0;
</script>
<script type="text/javascript" src="./public/js/carrito.js"></script>
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
                activodireccion:false,activocel:false,completo:true,direc:'viejo',
                i:0,totap:0,subtot:0,tap:true,izder:true,transicion:'entar1',
                confirmado:false,modaldirec:false,modalconfirmar:false,celular:'',
                invalido:false,valido:false,focused: false
            }
        },
        mounted(){
            $(function(){
                $('#modal1').modal({
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
                    this.transicion='entar1';
                else
                    this.transicion='entar';
                return this.transicion;
            },
            telfcelular(){
                if(this.celular!=''&&(this.celular.length<10||this.celular.length>10||this.celular.substr(0,2)!='09')){
                    this.invalido=true;
                    this.valido=false;
                    console.log(this.celular.substr(0,2));
                }
                else {
                    if(this.celular.length == 10){
                        this.invalido=false;
                        this.valido=true;
                        if (! (Notification)) {
                            alert('Web Notification is not supported');
                            return;
                        }
                        if(Notification.permission !=="granted")
                            Notification.requestPermission();
                        else
                        {
                            let notification = new Notification('Pedido generado correctamente', {
                                icon: "./public/images/correcto.png",
                                body:"En breve le llegara un sms",
                            });
                        }
                    }
                }
            }
        },
        methods:{
            controlFormatoCelular(){
                console.log(celular.value);
            },
            agregardireccion(){
                this.subtot=subtotal;
                this.i=parseFloat(subtotal*0.12).toFixed(2);
                this.direccion.iva=(this.i++);
                this.direccion.subtotal=(this.subtot++);
                this.totap=parseFloat(this.direccion.iva+this.direccion.subtotal).toFixed(2);
                this.direccion.totalpag=(this.totap++);
                if(this.direccion.iddireccion=='')
                    this.direccion.iddireccion=this.direcciones.length+1;
                else
                    this.direccion.iddireccion=this.direcciones.length;
                /*if((this.direccion.provincia!="" || this.direccion.ciudad!="" ||
                    this.direccion.sector!="" || this.direccion.calleprincipal!="" ||
                    this.direccion.callesecundaria!="" || this.direccion.numerodecasa!=""))
                {
                this.activodireccion=false;
                this.activocel=true;
                }
                else{
                    toastr.error("Los campos de la direccion son obligatorios")
                }/**/
                this.activodireccion=false;
                this.activocel=true;
                this.tap=false;
                //console.log(this.direccion);
            },
            prevenir:  function(){
                console.log(this.direccion.telefonocliente=="")
                /*if(this.direccion.telefonocliente=="")
                    return true;*/
            },
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
                console.log(e);
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
            correcto(){
                return {
                    is_invalid:this.invalido,
                    is_valid:this.valido
                }
            },
            confirmarsubtotal(){
                this.subtot=subtotal;
                this.i=parseFloat(subtotal*0.12).toFixed(2);
                console.log(this.i+this.subtot);
                this.totap=parseFloat(parseFloat(this.i)+parseFloat(this.subtot)).toFixed(2);
            },
            onFocus(){
                this.focused = true
            },
            onBlur(){
                this.focused = false;
                console.log("se perdió el foco");
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

<script type="text/javascript" src="./public/js/toastr.js"></script>

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