<?php
  require("clases.php");
  $plantas = json_decode(file_get_contents("data/plantas.json"), true);
  $p = new Plantas;

  foreach($plantas as $planta){
    $text = [$planta['descripcion'], $planta['cuidados'], $planta['instrucciones'], $planta['riego'], $planta['cosecha']];
    $plnt = new Planta($planta['nombre'], $planta['id'], $planta['imagen'], $text);
    $p->addPlant($plnt);
  }
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>EcoLink</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="js/script.js"></script>
  <link rel="icon" type="image/x-icon" href="favicon.png">
</head>
<body class="bg-light">
  <div class="container mt-4">
    <h1 class="text-center mb-5">🌱 Enciclopedia de Hortalizas de Traspatio 🌱</h1>
    <div class="row row-cols-1 row-cols-md-4 g-4">
      <?php
        $plantData = $p->getData();
        foreach ($plantData as $pt): 
          $image = $pt->getImage();
          $name = $pt->getName();
          $id = $pt->getID();
          $img = file_exists("images/" . $image ) ? $image : "placeholder.png";
      ?>
      <div class="col">
        <div class="card h-100 shadow-sm">
          <img src="images/<?= $img ?>" class="card-img-top" alt="<?= $name ?>" style="height: 250px; width: 250px; margin:0 auto;">
          <div class="card-body">
            <h5 class="card-title"><?= $name ?></h5>
            <a href="planta.php?id=<?= $id ?>" class="btn btn-success">Ver más</a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</body>
</html>
