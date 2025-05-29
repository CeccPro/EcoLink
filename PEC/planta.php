<?php
  require("clases.php");

  $p = new Plantas;
  $plantas = json_decode(file_get_contents("data/plantas.json"), true);

  foreach($plantas as $planta){
    $text = [$planta['descripcion'], $planta['cuidados'], $planta['instrucciones'], $planta['riego'], $planta['cosecha']];
    $plnt = new Planta($planta['nombre'], $planta['id'], $planta['imagen'], $text);
    $p->addPlant($plnt);
  }
  $id = $_GET["id"] ?? null;

  $planta = null;

  $plantData = $p->getData();
  $pt = $p->matchID("$id");
  $image = $pt->getImage();
  $name = $pt->getName();
  $text = $pt->getText();
  $img = file_exists("images/" . $image ) ? $image : "placeholder.png";
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title><?= $name ?> - EcoLink</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style1.css">
  <link rel="icon" type="image/x-icon" href="favicon.png">
</head>
<body class="bg-light">

  <div class="container mt-4">
    <div class="mb-4 text-center">
      <a href="catalogo.php" class="btn btn-outline-secondary">← Volver al Catálogo</a>
    </div>

    <div class="card mx-auto shadow-sm" style="max-width: 800px;">
      <img src="images/<?= $img ?>" class="card-img-top" alt="<?= $name ?>" style="max-height: 500px; max-width: 500px; margin:0 auto;">
      <div class="card-body">
        <h2 class="card-title text-center"><?= $name ?></h2>
        <hr>
        <h5 class="mt-3 text-success">🌱 Descripción</h5>
        <p><?= $text[0] ?></p>

        <h5 class="mt-3 text-success">🧤 Cuidados</h5>
        <p><?= $text[1] ?></p>

        <h5 class="mt-3 text-success">🌿 Instrucciones de Cultivo</h5>
        <p><?= $text[2] ?></p>

        <h5 class="mt-3 text-success">💧 Instrucciones de Riego</h5>
        <p><?= $text[3] ?></p>

        <h5 class="mt-3 text-success">🌾 Cosecha</h5>
        <p><?= $text[4] ?></p>
      </div>
    </div>
  </div>

</body>
</html>
