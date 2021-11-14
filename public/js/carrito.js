fetch("./peticiones/carrito.php?contar=canti")
    .then(function(response){
        return response.text();
    })
    .then(function(texto){
        conte=texto
        document.querySelector('.circulo').innerHTML=conte;
        console.log(texto);
    });