
const restar=document.querySelector(".fa-minus-circle");
const sumar=document.querySelector(".fa-plus-circle");
const agregar=document.querySelector(".agregar");
const cantidad=document.querySelector('.canti'); 
sumar.addEventListener('click',cantidadsumar);
restar.addEventListener('click',cantidadrestar);
agregar.addEventListener('click', agregaralcarrito);
function cantidadrestar(){
    if(cantidad.value>0)
        cantidad.value=parseInt(cantidad.value)-1;
    //cantidad.value=6;
}
function cantidadsumar(){
        cantidad.value=parseInt(cantidad.value)+1;
    //cantidad.value=6;
}
function agregaralcarrito(){
    var idproducto=agregar.value;
    var request="./peticiones/carrito.php?id="+idproducto+"&cantidad="+cantidad.value;
    console.log(request);
    fetch(request)
    .then(function(response){
        return response.text();
    })
    .then(function(texto){
        if(texto.length<5)
        document.querySelector('.circulo').innerHTML=texto;
        console.log(texto);
    });
}