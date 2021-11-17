
const cantidad=document.querySelector('.canti'); 

const restar=document.querySelector(".fa-minus-circle");
const sumar=document.querySelector(".fa-plus-circle");

const agregar=document.querySelector(".agregar");
sumar.addEventListener('click',cantidadsumar);
restar.addEventListener('click',cantidadrestar);
agregar.addEventListener('click', agregaralcarrito);

var aux=cantidad.value;

function subtotalfn(){
    document.querySelector('.subtotal').innerHTML=0;
}
//restarcart.addEventListener('click',cantidadrestarcart);
function cantidadrestar(){
    if(cantidad.value>1){
        cantidad.value=parseInt(cantidad.value)-1;
        console.log(aux);
    }
    else
        document.querySelector('.canti').value=1;
    //cantidad.value=6;
}

function cantidadsumar(){
        //console.log(document.querySelector("."))
        
        if(parseInt(document.querySelector('.canti').value)<=0){
            document.querySelector('.canti').value=1;
            aux=1;
        }
        else
            if(parseInt(document.querySelector('.canti').value)){
                document.querySelector('.canti').value=parseInt(document.querySelector('.canti').value)+1;
                aux=document.querySelector('.canti').value; 
                console.log(cantidad.value);
            }
            else{
                console.log(cantidad.value);
                document.querySelector('.canti').value=aux;
            }
    //cantidad.value=6;
}
function cantidadrestarcart(idproducto,index,precio){
    var id='.canti'+index;
    var request="./peticiones/carrito.php?id="+ idproducto+"&cantidad="+parseInt(document.querySelector(id).value)+"&actualizar&restar";
    var clase='.total'+index;
    console.log(request);
    fetch(request)
    .then(function(response){
        return response.json();
    })
    .then(function(texto){
        if(texto.length<5){
            document.querySelector('.circulo').innerHTML=texto[1];
            document.querySelector(id).value=texto[0];
            document.querySelector(clase).innerHTML='<i class="fa fa-dollar colorfuente "></i> '+parseFloat(precio*texto[0]).toFixed(2);
        }
        location.reload();
        console.log(texto[0]);
    });
}
function cantidadsumarcart(idproducto,index,precio){
    var id='.canti'+index;
    var request="./peticiones/carrito.php?id="+ idproducto+"&cantidad="+parseInt(document.querySelector(id).value)+"&actualizar&sumar";
    var clase='.total'+index;
    console.log(request);
    fetch(request)
    .then(function(response){
        return response.json();
    })
    .then(function(texto){
        if(texto.length<5){
            document.querySelector('.circulo').innerHTML=texto[1];
            document.querySelector(id).value=texto[0];
            document.querySelector(clase).innerHTML='<i class="fa fa-dollar colorfuente "></i> '+parseFloat(precio*texto[0]).toFixed(2);
            
            location.reload();
        }
        console.log(texto[0]);
    });
}
function agregaralcarrito(){
    var idproducto=agregar.value;
    var request="./peticiones/carrito.php?id="+idproducto+"&cantidad="+cantidad.value;
    console.log(request);
    fetch(request)
    .then(function(response){
        return response.json();
    })
    .then(function(texto){
        if(texto.length<5){
            document.querySelector('.circulo').innerHTML=texto[1];
            document.querySelector('.canti1').value=texto[0];
        }
        console.log(texto[0]);
    });
}
