<?php

require "vendor/autoload.php";

//require "sdk-php";

MercadoPago\SDK::setAccessToken('TEST-4230125490296814-010412-ebff25e83a6a07fc6c1ab235f63c4bef-557585605');

$preference = new MercadoPago\Preference;

$item = new MercadoPago\Item();
$item->id = '0001';
$item->title = 'Producto CDP';
$item->quantity = 1;
$item->unit_price = 150.00;
$item->currency_id = "MXN";

$preference->items = array($item);

$preference->back_urls = array(
    "success" => "https://prueba-pagos.castelancarpinteyro.club/captura.php",
    "failure" => "https://prueba-pagos.castelancarpinteyro.club/fallo.php"
);

$preference->auto_return = "approved";
$preference->binary_mode = "true";

$preference->save();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://sdk.mercadopago.com/js/v2"></script>
</head>

<body>
    <h3>MercadoPago</h3>
    <div class="checkout-btn"></div>

    <script>
        const mp = new MercadoPago('TEST-fdbc651b-08b6-4093-b936-c3397e44b299', {
            locale: 'es-MX'
        });

        mp.checkout({
            preference: {
                id: '<?php echo $preference->id; ?>'
            },
            render: {
                container: '.checkout-btn',
                label: 'Pagar con MercadoPago'
            }
        })
    </script>
</body>

</html>