const restar=document.querySelector(".fa-minus-circle");
const sumar=document.querySelector(".fa-plus-circle");
const agregar=document.querySelector(".agregar");
sumar.addEventListener('click',cantidadsumar);
restar.addEventListener('click',cantidadrestar);
agregar.addEventListener('click', agregaralcarrito);
function cantidadrestar(){
    const cantidad=document.querySelector('.canti'); 
    if(cantidad.value>0)
        cantidad.value=parseInt(cantidad.value)-1;
    //cantidad.value=6;
}
function cantidadsumar(){
    const cantidad=document.querySelector('.canti'); 
        cantidad.value=parseInt(cantidad.value)+1;
    //cantidad.value=6;
}
function agregaralcarrito(){
    var idproducto=agregar.value;
    var request="peticiones.php?id="+idproducto;
    console.log(request);
    fetch(request)
    .then(function(response){
        return response.text();
    })
    .then(function(texto){
        console.log(texto);
    });
}
