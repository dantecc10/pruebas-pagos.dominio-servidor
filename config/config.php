<?php

define("CLIENT_ID", "AZfUU5uy4JNNgtbnwTOkZeicL8gO3f9GOZ03iRE1FKDVMeqB3DcUQ7Rm2QvNnF9rRiBNySF82QOEIGhB");
define("TOKEN_MP", "TEST-4230125490296814-010412-ebff25e83a6a07fc6c1ab235f63c4bef-557585605");
define("CURRENCY", "MXN");
define("KEY_TOKEN", "APR.wqc-354*");
define("MONEDA", "$");
session_start();
$num_cart = 0;
if (isset($_SESSION['carrito']['productos'])) {
    $num_cart = array_sum($_SESSION['carrito']['productos']);
}