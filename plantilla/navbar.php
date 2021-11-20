<html lang="es" style="">
<head>
    
    <meta charset="UTF-8">
    <meta name="description" content="HTML5">
    <meta name="keyboards" content="HTML,CSS,JavaScript">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="./css/Img/icono0.jpg" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    

    <!-- Required meta tags -->
    <link rel="stylesheet" href="./public/css/estilos.css">
    <link rel="stylesheet" href="./public/css/font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
  </style>
</head>

<div class="bg-dark">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-expand-lg navbar-dark">
                

                <div class="container-fluid">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Nosotros</a>
                        </li>
                    </ul>
                </div>
                

                <div class="container-fluid">
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Ingrese el nombre del producto" aria-label="Search">
                        <button type="submit">BUSCAR</button>
                    </form>
                    <li class="nav-item">
                            <a class="nav-link" href="bavanzada.php">Busqueda Avanzada</a>
                    </li>
                </div>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">    
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <?php if(!isset($_SESSION['authenticated'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="registro.php">Registro</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                        <?php endif ?>

                        <?php if(isset($_SESSION['authenticated'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                        <?php endif ?>
                    </ul>
                </div>
                
                <div class="contaier justify-content-center">
                        <a href="./vercarrito.php">
                            <div class="circulo text-center"></div>
                            <div class="carrito"></div>
                        </a>
                </div>
            </nav>
        </div>
    </div>
</div>
</div>