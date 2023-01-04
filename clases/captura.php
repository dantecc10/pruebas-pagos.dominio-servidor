<?php

    require '../config/config.php';
    require '../config/database.php';
    $db = new Database();
    $con = $db->conectar();

    $json = file_get_contents('php//inptu');
    $datos = json_decode($json, true);

    echo '<pre>';
    print_r($datos);

    if (is_array($datos)) {
        $id_trasaccion = $datos['detalles']['id'];
        $total = $datos['detalles']['purchace_units'][0]['amount']['value'];
        $status = $datos['detalles']['status'];
        $fecha = $datos['detalles']['update_time'];
        $fecha_nueva = date('Y-m-d H:i:s', strtotime($fecha));
        $email = $datos['detalles']['payes']['email_address'];
        $id_cliete = $datos['detalles']['payes']['payer_id'];

        $sql = $con->prepare("INSERT INTO compra (id_transacción, fecha, status, email, id_cliente, total) VALUES (?,?,?,?,?,?)");
        $sql->execute([$id_trasaccion, $fecha_nueva, $status, $email, $id_cliete, $total]);
        $id = $con->lastInsertId();
    }

?>