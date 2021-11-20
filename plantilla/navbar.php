<?php include 'encabezado.php';?>
<header>
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
</header>
<div id="app">
    <main>

