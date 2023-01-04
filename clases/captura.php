<?php

    require '../config/config.php';
    require '../config/database.php';
    $db = new Database();
    $con = $db->conectar();

    $json = file_get_contents('php://input');
    $datos = json_decode($json, true);

/*     echo '<pre>';
    print_r($datos); */

    if (is_array($datos)) {
        $id_trasaccion = $datos['detalles']['id'];
        $total = $datos['detalles']['purchase_units'][0]['amount']['value'];
        $status = $datos['detalles']['status'];
        $fecha = $datos['detalles']['update_time'];
        $fecha_nueva = date('Y-m-d H:i:s', strtotime($fecha));
        $email = $datos['detalles']['payer']['email_address'];
        $id_cliete = $datos['detalles']['payer']['payer_id'];

        print_r($id_trasaccion, $total, $status, $fecha, $email, $id_cliete);

        $sql = $con->prepare("INSERT INTO compra (id_transacción, fecha, status, email, id_cliente, total) VALUES (?,?,?,?,?,?)");
        $sql->execute([$id_trasaccion, $fecha_nueva, $status, $email, $id_cliete, $total]);
        $id = $con->lastInsertId();
    }

    if ($id > 0) {
        $productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;
        
        if ($productos != null) {
            foreach ($productos as $clave => $cantidad) {
                $sql = $con->prepare("SELECT id, nombre, precio, descuento FROM productos WHERE id=? AND activo=1");
                $sql->execute([$clave]);
                $row_prod[] = ($sql->fetch(PDO::FETCH_ASSOC));

                $precio = $row_prod['precio'];
                $descuento = $row_prod['descuento'];
                $precio_desc = $precio - (($precio * $descuento) / 100);

            }
        }
    }

?>