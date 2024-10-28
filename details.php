<?php include 'app/detailsCards.php'; ?>

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
        <?php
            
            if ($product !== null) {
                $name = htmlspecialchars($product->name);
                $cover = $product->cover;
                $description = htmlspecialchars($product->description);
                $features = htmlspecialchars($product->features);
                $brandName = htmlspecialchars($product->brand->name);
                
        ?>
        <h1><?= $name ?></h1>
        <img src="<?= $cover ?>" class="card-img-top" alt="<?= $name ?>">
        <div class="card-body">
            <p class="card-text"><strong>Descripción:</strong> <?= $description ?></p>
            <p class="card-text"><strong>Características:</strong> <?= $features ?></p>
            <p class="card-text"><strong>Marca:</strong> <?= $brandName ?></p>
            </div>
        <?php } else { ?>
            <p>Producto no encontrado.</p>
        <?php } ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVFQW枯7GPOaxy9YLz7qOLuPqmETa9RPr7i++T9IkUveftrv4zXp" crossorigin="anonymous"></script>
</body>
</html>