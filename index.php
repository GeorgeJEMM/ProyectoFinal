
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



<div class="row">
    <div class="col-4">
        <div class="list-group" id="list-tab" role="tablist">
            <?php
            $categorias = Conexion::Conectar()->query("select * from categorias");
            while($lista=$categorias->fetch_row()){
                //echo $lista[0]." ".$lista[1]."</br >";
                if ($lista[0] == '1')
                    echo "<a class=\"list-group-item list-group-item-action active\" id=\"list-$lista[1]-list\" data-bs-toggle=\"list\" href=\"#list-$lista[1]\" role=\"tab\" aria-controls=\"list-$lista[1]\">$lista[1]</a>";
                else
                    echo "<a class=\"list-group-item list-group-item-action\" id=\"list-$lista[1]-list\" data-bs-toggle=\"list\" href=\"#list-$lista[1]\" role=\"tab\" aria-controls=\"list-$lista[1]\">$lista[1]</a>";
            }
            ?>
        </div>
    </div>
    <div class="col-8">
        <div class="tab-content" id="nav-tabContent">
            <?php
            $categorias = Conexion::Conectar()->query("select * from categorias");
            $productos = Conexion::Conectar()->query("select * from productos");
            while($lista=$categorias->fetch_row()){
                $cont =0;
                $cont++;
                //echo $listaP[0]." ".$listaP[1]." ".$listaP[2]." ".$listaP[5]." ".$listaP[6]." ".$listaP[7]." ".$listaP[9]." ".$listaP[9]."</br >";
                echo "<div class=\"tab-pane fade\" id=\"list-$lista[1]\" role=\"tabpanel\" aria-labelledby=\"list-$lista[1]-list\">";

                        while($listaP=$productos->fetch_row()){
                            /*if($lista[0]==$listaP[1]){
                                echo $listaP[0]." ".$listaP[1]." ".$listaP[2]." ".$listaP[5]." ".$listaP[6]." ".$listaP[7]." ".$listaP[9]." ".$listaP[9]."</br >";
                            }*/
                            echo $lista[1]." ".$listaP[2]."</br>";
                        }

                    echo  "</div>";
            }
            ?>
            <!--<div class="tab-pane fade show active" id="list-Alimentos" role="tabpanel" aria-labelledby="list-Alimentos-list">Productos 1</div>
            <div class="tab-pane fade" id="list-Belleza" role="tabpanel" aria-labelledby="list-Belleza-list">Productos 2</div>
            <div class="tab-pane fade" id="list-Salud" role="tabpanel" aria-labelledby="list-Salud-list">Productos 3</div>
            <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">Productos 4</div>-->
        </div>
    </div>
</div>
<?php include("./plantilla/footer.php") ?>
