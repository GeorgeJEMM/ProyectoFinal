const restar=document.querySelector(".fa-minus-circle");
const sumar=document.querySelector(".fa-plus-circle");
sumar.addEventListener('click',cantidadsumar);
restar.addEventListener('click',cantidadrestar);
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
