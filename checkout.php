<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba de pagos</title>
    <script src="https://www.paypal.com/sdk/js?client-id=AZfUU5uy4JNNgtbnwTOkZeicL8gO3f9GOZ03iRE1FKDVMeqB3DcUQ7Rm2QvNnF9rRiBNySF82QOEIGhB&currency=MXN"></script>
</head>

<body>
    <div id="paypal-button-container"></div>
    <script>
        paypal.Buttons({
            style: {
                color: 'blue',
                shape: 'pill',
                label: 'pay'
            },
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: 100
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                actions.order.capture().then(function(detalles) {
                    console.log(detalles);
                    // window.location.href="/completado.html";
                });
            },
            onCancel: function(data) {
                alert("Pago cancelado");
                console.log(data);
            }
        }).render('#paypal-button-container');
    </script>
</body>


</html>