<?php
include_once "app/ProductsController.php";
$productsController = new ProductsController();
$productos = $productsController->get();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            overflow-x: hidden;
        }

        .sidebar {
            min-height: 100vh;
        }



    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Mi </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Características</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block sidebar bg-light">
                <div class="sidebar-sticky">
                    <h5 class="sidebar-heading">Menú</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Op</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Op</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Op</a>
                        </li>
                    </ul>
                </div>
            </nav>


            <main class="col-md-9 ms-sm-auto col-lg-10 px-4">
                <h2>Lista de productos</h2>
                <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#addProductModal">Agregar Producto</a>

                <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addProductModalLabel">Agregar Producto</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="app/ProductsController.php" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="slug" class="form-label">Slug</label>
                                        <input type="text" class="form-control" id="slug" name="slug" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Descripción</label>
                                        <textarea class="form-control" id="description" name="description"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="features" class="form-label">Características</label>
                                        <textarea class="form-control" id="features" name="features"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="image" class="form-label">Imagen del producto</label>
                                        <input type="file" class="form-control" id="cover" name="cover" accept="image/*" >
                                    </div>

                                    <button type="submit" class="btn btn-primary">Guardar Producto</button>
                                    <input type="hidden" name="action" value="addProduct">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="container mt-4">
                    <div class="row">
                        <?php if (isset($productos) && count($productos)): ?>
                            <?php foreach ($productos as $product): ?>
                                <div class="col-md-4 mb-4 h-100">
                                    <div class="card" style="width: 18rem;">
                                        <img src="<?= $product->cover ?>" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $product->name ?></h5>
                                            <p class="card-text"><?= $product->description ?> </p>
                                            <a href="details.php?slug=<?= $product->slug ?>" class="btn btn-primary">Ver detalles</a>
                                            <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#cuestionarioModal">Editar</a>
                                            <button onclick="deleteProduct(<?= $product->id ?>)" type="button" class="btn btn-danger m-2">Eliminar</button>

                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>No se encontraron productos.</p>
                        <?php endif ?>
                    </div>
                </div>

            </main>

            <form method="POST" id="delete_Product" action="app/ProductsController.php">
                <input type="hidden" name="action" value="deleteProduct">
                <input type="hidden" name="idProduct" id="id_Product">
            </form>

            <!-- Modal -->
            <div class="modal fade" id="cuestionarioModal" tabindex="-1" aria-labelledby="cuestionarioModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="cuestionarioModalLabel">Cuestionario</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Correo Electronico</label>
                                    <input type="email" class="form-control" id="email">
                                    <label for="password" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" id="password">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>





        <script type="text/javascript">
            function deleteProduct(idProduct) {
                swal({
                        title: "Estas Seguro de querer eliminar este elemento?",
                        text: "No hay vuelta atras",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {

                            swal("El elemento ha sido eliminado", {
                                icon: "success",
                            });
                            document.getElementById("id_Product").value = idProduct;
                            document.getElementById('delete_Product').submit();
                        } else {
                            console.log(idProduct)

                        }
                    });
            }
        </script>



</body>

</html>