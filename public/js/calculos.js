
subtotalfn();
function subtotalfn(){
    var iva=subtotal*0.12;
    document.querySelector('.subtotal').innerHTML=' ' + parseFloat(subtotal).toFixed(2);
    document.querySelector('.subto').innerHTML=' ' + parseFloat(subtotal).toFixed(2);
    document.querySelector('.iva').innerHTML=' ' + parseFloat(iva).toFixed(2);
    document.querySelector('.tap').innerHTML=' ' + parseFloat(parseFloat(subtotal)+parseFloat(iva)).toFixed(2);
}

function confirmarmodal(){
    var iva=subtotal*0.12;
    document.querySelector('.subto').innerHTML=' ' + parseFloat(subtotal).toFixed(2);
    document.querySelector('.iva').innerHTML=' ' + parseFloat(iva).toFixed(2);
    document.querySelector('.tap').innerHTML=' ' + parseFloat(parseFloat(subtotal)+parseFloat(iva)).toFixed(2);
}

$(function(){
    $('#modal1').modal({
        backdrop:'static',
        keyboard:false,
        focus:false,
        show:false,
        });
    });