
<?php
include("./plantilla/encabezado.php");
require_once('Conexion.php');
?>

<!doctype html>
<html lang="en" style="">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <style src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Compras</title>
</head>
<body style="max-height: 768px; max-width: 824px;">
<!--<nav class="navbar navbar-expand navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Inicio</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Registro</a>
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
                <li class="nav-item">
                    <a class="nav-link disabled">Disabled</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
        </div>
    </div>
</nav>-->
<div class="row" >

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <div class="col-4">
        <div class="list-group" id="list-tab" role="tablist">
            <?php
            $categorias = Conexion::Conectar()->query("select * from categorias");
            $IdCat="";
            while($lista=$categorias->fetch_row()){
                //echo $lista[0]." ".$lista[1]."</br >";
                if ($lista[0] == '1'){
                    echo "<a class=\"list-group-item list-group-item-action active\" id=\"list-$lista[1]-list\" data-bs-toggle=\"list\" href=\"#list-$lista[1]\" role=\"tab\" aria-controls=\"list-$lista[1]\">$lista[1]</a>";
                    $idCat=$lista[1];
                    //print_r($idCat);
                }
                else
                    echo "<a class=\"list-group-item list-group-item-action\" id=\"list-$lista[1]-list\" data-bs-toggle=\"list\" href=\"#list-$lista[1]\" role=\"tab\" aria-controls=\"list-$lista[1]\">$lista[1]</a>";
                  $listaCat[] = $lista[1];
            }
            ?>
        </div>
    </div>
    <div class="col-8">
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-content" id="nav-tabContent">
                <?php
                $categorias = Conexion::Conectar()->query("select * from categorias");

                while($listaP=$categorias->fetch_row()){
                    echo "<div class=\"tab-pane fade\" id=\"list-$listaP[1]\" role=\"tabpanel\" aria-labelledby=\"list-$listaP[1]-list\">";

                        //echo "Productos: ".$listaP[1];
                        $NomCat=$listaP[1];
                    $categoriasxproductos = Conexion::Conectar()->query("SELECT categorias.IDCATEGORIA,
                                                                            categorias.NOMBRECATEGORIA, 
                                                                            productos.DESCRIPCIONCORTA, 
                                                                            productos.PRECIO, 
                                                                            productos.IDPRODUCTO,
                                                                            productos.FOTOP,        
                                                                            productos.DESCRIPCIONLARGA       
                                                                         FROM productos INNER JOIN categorias 
                                                                         ON categorias.IDCATEGORIA=productos.IDCATEGORIA
                                                                         where categorias.NOMBRECATEGORIA='$NomCat'
                                                                         ORDER BY productos.DESCRIPCIONCORTA");
                    while($listaPxC=$categoriasxproductos->fetch_row()){
                        //echo $listaPxC[2]."<br>";
                       echo "<div class=\"card\" style=\"width: 18rem;\">";
                       echo "<img src=\"...\" class=\"card-img-top\" alt=\"...\">";
                       echo "<div class=\"card-body\">";
                       echo "<h5 class=\"card-title\">$listaPxC[2]</h5>";
                       echo "<p class=\"card-text\">$listaPxC[6]</p>";
                       echo "<a href=\"#\" class=\"btn btn-primary\">Ver Producto</a>";
                       echo "</div>";
                       echo "</div>";


                    }

                    echo  "</div>";
                }
                ?>
                <div class="tab-pane fade show active" id="list-Alimentos" role="tabpanel" aria-labelledby="list-Alimentos-list">
                    <div class="card" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div></div>

            </div>
        </div>
    </div>
</div>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
</body>
<?php include("./plantilla/footer.php") ?>
</html>