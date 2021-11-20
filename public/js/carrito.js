fetch("./peticiones/carrito.php?contar=canti")
    .then(function(response){
        return response.text();
    })
    .then(function(texto){
        document.querySelector('.circulo').innerHTML=texto;
        console.log(texto);
    });