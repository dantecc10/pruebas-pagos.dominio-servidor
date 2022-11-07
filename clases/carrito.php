<?php
require '../config/config.php';
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $token = $_POST['token'];
} else {
    $datos['ok'] = false;
}
