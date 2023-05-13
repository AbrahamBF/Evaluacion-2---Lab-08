<?php include 'conexion.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 500px;
            margin: 0 auto;
            margin-top: 50px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 20px;
        }

        button[type="submit"] {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Crear Producto</h2>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $stock = $_POST['stock'];
            $precioVenta = $_POST['precio_venta'];

            $sql = "INSERT INTO Producto (Nombre, Descripcion, Stock, PrecioVenta) VALUES ('$nombre', '$descripcion', '$stock', '$precioVenta')";

            if ($conexion->query($sql) === TRUE) {
                echo '<div class="alert alert-success" role="alert">El producto se ha registrado correctamente.</div>';
                header("refresh:2; url=consultar_productos.php");
            } else {
                echo '<div class="alert alert-danger" role="alert">Error: ' . $sql . '<br>' . $conexion->error . '</div>';
            }
        }
        ?>

        <form method="POST" action="crear_producto.php">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" name="nombre" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" name="descripcion"></textarea>
            </div>

            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="number" class="form-control" name="stock" required>
            </div>

            <div class="form-group">
                <label for="precio_venta">Precio de venta:</label>
                <input type="text" class="form-control" name="precio_venta">
            </div>

            <button type="submit" class="btn btn-primary btn-block">Registrar Producto</button>
        </form>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>