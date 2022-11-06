<?php
require 'config/database.php';
$db = new Database();
$con = $db->conectar();
$sql = $con->prepare("SELECT id, nombre, precio FROM productos WHERE activo=1");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Online</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="css/estilos.css" rel="stylesheet">
</head>

<body>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <header>
        <div class="navbar navbar-dark bg-dark navbar-expand-lg">
            <div class="container">
                <a href="#" class="navbar-brand">
                    <strong>Tienda Online</strong>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarHeader">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="#" class="nav-link active">Catálogo</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Contacto</a>
                        </li>
                    </ul>
                    <a href="carrito.php" class="btn btn-primary">Carrito</a>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php
                foreach ($resultado as $row) {

                ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <?php
                            $id = $row['id'];
                            $imagen = "images/productos/$id/principal.jpg";

                            if (!file_exists($imagen)) {
                                $imagen = "images/no-photo.jpg";
                            }
                            ?>
                            <img src="<?php echo $imagen; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['nombre']; ?></h5>
                                <p class="card-text">$ <?php echo $row['precio']; ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="" class="btn btn-primary">Detalles</a>
                                    </div>
                                    <a href="" class="btn btn-success">Agregar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </main>

</body>

</html>