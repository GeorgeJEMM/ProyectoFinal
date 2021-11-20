<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-header">
                        <h4>Busqueda avanzada</h4>
                    </div>
                </div>
            </div>
            
            <!-- Categoria  -->
            <div class="col-md-3">
                <form action="" method="GET">
                    <div class="card shadow mt-3">      
                        <div class="card-header">
                            <h5>Filtros</h5>
                        </div>
                        <div class="card-body">
                            <h6>Categorias</h6>
                            <hr>
                            <?php
                                $con = mysqli_connect("localhost","root","","proyectofinal");
                                $categ_query = "SELECT * FROM categorias";
                                $categ_query_run  = mysqli_query($con, $categ_query);

                                if(mysqli_num_rows($categ_query_run) > 0)
                                {
                                    foreach($categ_query_run as $categlist)
                                    {
                                        $checked = [];
                                        if(isset($_GET['categ']))
                                        {
                                            $checked = $_GET['categ'];
                                        }
                                        ?>
                                            <div>
                                                <input type="checkbox" name="categ[]" value="<?= $categlist['IDCATEGORIA']; ?>" 
                                                    <?php if(in_array($categlist['IDCATEGORIA'], $checked)){ echo "checked"; } ?>
                                                 />
                                                <?= $categlist['NOMBRECATEGORIA']; ?>
                                            </div>
                                        <?php
                                    }
                                }
                                else
                                {
                                    echo "No se encuentran categorias";
                                }
                            ?>
                        </div>
                        <div class="card-body">

                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-12">
                                <h6>Palabra a buscar</h6>
                                    <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Buscar palabra">  <br>                  
                                </div>
                                <div class="col-md-4">
                                    <label for="">Minimo</label>
                                    <input type="text" name="min_precio" value="<?php if(isset($_GET['min_precio'])){echo $_GET['min_precio']; }else{echo "0";} ?>" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Maximo</label>
                                    <input type="text" name="max_precio" value="<?php if(isset($_GET['max_precio'])){echo $_GET['max_precio']; }else{echo "10000";} ?>" class="form-control">
                                </div>
                                <div class="col-md-12">
                                    <h6>Orden</h6>
                                    <select name="sort_cat" class="form-control">
                                        <option value="">--Seleccione una opción--</option>
                                        <option value="menor-mayor" <?php if(isset($_GET['sort_cat']) && $_GET['sort_cat'] == "menor-mayor") { echo "selected"; } ?> > PRECIO - Menor - Mayor</option>
                                        <option value="mayor-menor" <?php if(isset($_GET['sort_cat']) && $_GET['sort_cat'] == "mayor-menor") { echo "selected"; } ?> > PRECIO - Mayor - Menor</option>
                                        <option value="A-Z" <?php if(isset($_GET['sort_cat']) && $_GET['sort_cat'] == "A-Z") { echo "selected"; } ?> > A-Z</option>
                                        <option value="Z-A" <?php if(isset($_GET['sort_cat']) && $_GET['sort_cat'] == "Z-A") { echo "selected"; } ?> > Z-A</option>
                                    </select>
                                </div> 
                                <div class="col-md-4"><br/>
                                    <button type="submit" class="btn btn-primary px-4">BUSCAR</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    </div>
                </form>
            </div>
            <!-- Busqueda-Filtros -->
            <div class="col-md-9 mt-3">
                <div class="card ">
                    <div class="card-body row">
                        <!-- Orden -->
                        <!-- Busqueda Filtros -->
                        <?php
                        
                            if(isset($_GET['categ']))
                            {
                                $categoriasArr = [];
                                $categoriasArr = $_GET['categ'];
                                $minprecio = $_GET['min_precio'];
                                $maxprecio = $_GET['max_precio'];
                                $search = $_GET['search'];
                                $sort_option = "";
                                if($_GET['sort_cat'] == "menor-mayor"){
                                    $sort_option = "PRECIO ASC";
                                }elseif($_GET['sort_cat'] == "mayor-menor"){
                                    $sort_option = "PRECIO DESC";
                                }elseif($_GET['sort_cat'] == "A-Z"){
                                    $sort_option = "DESCRIPCIONCORTA ASC";
                                }elseif($_GET['sort_cat'] == "Z-A"){
                                    $sort_option = "DESCRIPCIONCORTA DESC";
                                }
                                
                                foreach($categoriasArr as $colcateg)
                                {
                                    $productos = "SELECT * FROM productos WHERE IDCATEGORIA IN ($colcateg) AND PRECIO BETWEEN $minprecio AND $maxprecio";
                                    $productos_run = mysqli_query($con, $productos);
                                    if(mysqli_num_rows($productos_run) > 0)
                                    {
                                        foreach($productos_run as $proditems) :
                                            ?>
                                                <div class="col-md-4 mt-3">
                                                    <div class="border p-2">
                                                        <h6><?= $proditems['DESCRIPCIONCORTA']; ?></h6>
                                                        <h6>PRECIO: <?php echo $proditems['PRECIO']; ?></h6>
                                                    </div>
                                                </div>
                                            <?php
                                        endforeach;
                                    }
                                }
                            }
                            elseif(isset($_GET['search']))
                            {
                                $minprecio = $_GET['min_precio'];
                                $maxprecio = $_GET['max_precio'];
                                $search = $_GET['search'];
                                $sort_option = "";
                                if($_GET['sort_cat'] == "menor-mayor"){
                                    $sort_option = "PRECIO ASC";
                                }elseif($_GET['sort_cat'] == "mayor-menor"){
                                    $sort_option = "PRECIO DESC";
                                }elseif($_GET['sort_cat'] == "A-Z"){
                                    $sort_option = "DESCRIPCIONCORTA ASC";
                                }elseif($_GET['sort_cat'] == "Z-A"){
                                    $sort_option = "DESCRIPCIONCORTA DESC";
                                }
                                
                                $productos = "SELECT * FROM productos WHERE DESCRIPCIONCORTA LIKE '%$search%'AND PRECIO BETWEEN $minprecio AND $maxprecio ORDER BY $sort_option";
                                $productos_run = mysqli_query($con, $productos);
                                if(mysqli_num_rows($productos_run) > 0)
                                {
                                    foreach($productos_run as $col) :
                                        ?>
                                            <div class="col-md-4 mt-3">
                                                <div class="border p-2">
                                                    <h6><?= $col['DESCRIPCIONCORTA']; ?></h6>
                                                    <h6>PRECIO: <?php echo $col['PRECIO']; ?></h6>
                                                </div>
                                            </div>
                                        <?php
                                    endforeach;
                                }
                            }
                            else
                            {   if(isset($_GET['sort_cat'])) {
                                    $sort_option = "";
                                    if($_GET['sort_cat'] == "menor-mayor"){
                                        $sort_option = "PRECIO ASC";
                                    }elseif($_GET['sort_cat'] == "mayor-menor"){
                                        $sort_option = "PRECIO DESC";
                                    }elseif($_GET['sort_cat'] == "A-Z"){
                                        $sort_option = "DESCRIPCIONCORTA ASC";
                                    }elseif($_GET['sort_cat'] == "Z-A"){
                                        $sort_option = "DESCRIPCIONCORTA DESC";
                                    }
                                
                                    $productos = "SELECT * FROM productos ORDER BY $sort_option";
                                    $productos_run = mysqli_query($con, $productos);
                                    if(mysqli_num_rows($productos_run) > 0)
                                    {
                                        foreach($productos_run as $proditems) :
                                            ?>
                                                <div class="col-md-4 mt-3">
                                                    <div class="border p-2">
                                                        <h6><?= $proditems['DESCRIPCIONCORTA']; ?></h6>
                                                        <h6>PRECIO: <?php echo $proditems['PRECIO']; ?></h6>
                                                    </div>
                                                </div>
                                            <?php
                                        endforeach;
                                    }
                                    else
                                    {
                                        echo "No se encuentran registros";
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
