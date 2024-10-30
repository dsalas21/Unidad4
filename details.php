<?php 
	include_once "app/ProductsController.php";
	$productsController = new ProductsController();
	$producto = $productsController->getBySlug($_GET['slug']);


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Producto</title>
    <link rel="stylesheet" href="styles.css">  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<main class="col-md-9 ms-sm-auto col-lg-10 px-4">
    <a href="home.php" class="btn btn-primary mt-4">Regresar</a>
    <h3 class="my-4"><?= $producto->name ?></h3>
    <img src="<?= $producto->cover ?>" class="img-fluid mb-4 rounded" style="max-width: 300px;" alt="...">
    <div class="card-body p-4">
        <p class="card-text"><strong>Descripción:</strong> <?= $producto->description ?></p>
        <p class="card-text"><strong>Características:</strong> <?= $producto->features ?></p>
        <p class="card-text"><strong>Marca:</strong> <?= $producto->slug ?></p>
    </div>
</main>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVFQW枯7GPOaxy9YLz7qOLuPqmETa9RPr7i++T9IkUveftrv4zXp" crossorigin="anonymous"></script>
</body>
</html>