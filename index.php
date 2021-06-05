<?php
    #SDK de Mercado Pago
    require 'vendor/autoload.php';

    #Credenciales
    require_once 'credenciales.php';

    MercadoPago\SDK::setAccessToken($access_token);

    $producto = [
        'precio' => 1200,
        'cantidad' => 1,
        'titulo' => 'Remera'
    ];

    $preference = new MercadoPago\Preference();

    $item = new MercadoPago\Item();

    $item->unit_price = $producto['precio'];
    $item->title = $producto['titulo'];
    $item->quantity = $producto['cantidad'];

    $preference->items = array($item);

    $preference->save();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="card" style="width: 18rem;">
  <img src="https://www3.azogue.org/img/products/254333-chemise-mujer-camisa-mujeres-blusa-2018-algodon-a-cuadros-camisas-mujeres-tops-manga-larga-corea-moda-ropa-mujer-blusas-femininas.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text"><?php echo $producto['titulo']  ?></p>
    <p class="card-text"><?php echo $producto['precio']  ?></p>
    <p class="card-text"><?php echo $producto['cantidad']  ?></p>
    <a href="<?php echo $preference->init_point; ?>" class="btn btn-primary">comprar</a>
  </div>

<script
  src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
  data-preference-id="<?php echo $preference->id; ?>">
</script>

</div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</html>