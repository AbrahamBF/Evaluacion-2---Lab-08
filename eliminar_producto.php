<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Producto</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            margin-top: 50px;
        }

        h2 {
            margin-bottom: 20px;
        }

        .alert {
            margin-top: 20px;
        }

        .button-container {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Eliminar Producto</h2>

        <?php
        include 'conexion.php';

        if (isset($_GET['id'])) {
            $idProducto = $_GET['id'];
            $sql = "DELETE FROM Producto WHERE IdProducto='$idProducto'";

            if ($conexion->query($sql) === TRUE) {
                echo '<div class="alert alert-success" role="alert">El producto se ha eliminado correctamente.</div>';

                echo '<div class="button-container">';
                echo '<a href="crear_producto.php" class="btn btn-primary">Crear Producto</a>';
                echo '<a href="consultar_productos.php" class="btn btn-success">Ver Productos</a>';
                echo '</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error al eliminar el producto: ' . $conexion->error . '</div>';
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">No se especificó un ID de producto.</div>';
        }
        ?>

    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>