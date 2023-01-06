<?php
/* Coonexion a db */
require 'config/config.php';
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

#session_destroy();
#print_r($_SESSION);
?>
<!DOCTYPE html>
<html lang="es-MX">

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
    <!-- Encabezado -->
    <header>
        <div class="navbar navbar-dark bg-dark navbar-expand-lg">
            <div class="container">
                <a href="#" class="navbar-brand">
                    <strong>Tienda Online</strong>
                </a>
                <!-- Contenido de la navbar -->
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
                    <a href="checkout.php" class="btn btn-primary">
                        Carrito <span id="num_cart" class="badge bg-secondary"><?php echo $num_cart; ?></span>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="container">
            <h2>Datos del cliente</h2>
            <form class="row g-3" action="registro.php" method="post" autocomplete="off">
                <div class=" col-md-6">
                    <label for="nombres"><span class="text-danger">*Nombres</span></label>
                    <input type="text" name="nombres" id="nombres" class="form-control" required>
                </div>

                <div class=" col-md-6">
                    <label for="apellidos"><span class="text-danger">*Apellidos</span></label>
                    <input type="text" name="apellidos" id="apellidos" class="form-control" required>
                </div>

                <div class=" col-md-6">
                    <label for="email"><span class="text-danger">*email</span></label>
                    <input type="text" name="email" id="email" class="form-control" required>
                </div>

                <div class=" col-md-6">
                    <label for="telefono"><span class="text-danger">*Numero telefonico</span></label>
                    <input type="tel" name="telefono" id="telefono" class="form-control" required>
                </div>

                <div class=" col-md-6">
                    <label for="dni"><span class="text-danger">*DNI</span></label>
                    <input type="text" name="dni" id="dni" class="form-control" required>
                </div>

                <div class=" col-md-6">
                    <label for="usuario"><span class="text-danger">*Escriba un nombre de usuario</span></label>
                    <input type="text" name="usuario" id="usuario" class="form-control" required>
                </div>

                <div class=" col-md-6">
                    <label for="password"><span class="text-danger">*Contrasña</span></label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>

                <div class=" col-md-6">
                    <label for="repassword"><span class="text-danger">*Escriba otra vez su contraseña</span></label>
                    <input type="password" name="repassword" id="repassword" class="form-control" required>
                </div>

                <i><b>Nota:</b> Los campos con un asterisco(*) son obligatorios</i>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Registar</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>