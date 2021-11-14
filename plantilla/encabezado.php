
<?php
    include("./basededatos/procesos.php");
?>
<!doctype html>
<html lang="es" style="">
<head>
    
    <meta charset="UTF-8">
    <meta name="description" content="HTML5">
    <meta name="keyboards" content="HTML,CSS,JavaScript">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="./css/Img/icono0.jpg" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Required meta tags -->
    <link rel="stylesheet" href="./public/css/estilos.css">
    <link rel="stylesheet" href="./public/css/font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Compras</title>
    <style>
        
        

    </style>
</head>
<body >
    <header>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm">
                <a class="navbar-brand nav-link" href="index.php">Inicio</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse navbar-brand" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item ">
                            <a class=" navbar-brand " aria-current="page" href="#">Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="" href="#">Registro</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Categorías 
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <!--<li class="nav-item">
                            <a class="nav-link disabled">Disabled</a>
                        </li>-->
                    </ul>
                </div>
                <div class="contaier justify-content-center">
                    <a href="./vercarrito.php">
                        <div class="circulo text-center"></div>
                        <div class="carrito"></div>
                    </a>
                </div>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
            </nav>
        </div>
    </header>
    <main>