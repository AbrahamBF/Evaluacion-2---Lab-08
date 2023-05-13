<?php include 'conexion.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Producto</title>
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
    </style>
</head>

<body>
    <div class="container">
        <h2>Actualizar Producto</h2>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idProducto = $_POST['id'];
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $stock = $_POST['stock'];
            $precioVenta = $_POST['precio_venta'];

            $sql = "UPDATE Producto SET Nombre='$nombre', Descripcion='$descripcion', Stock='$stock', PrecioVenta='$precioVenta' WHERE IdProducto='$idProducto'";

            if ($conexion->query($sql) === TRUE) {
                echo '<div class="alert alert-success" role="alert">El producto se ha actualizado correctamente.</div>';
                echo '<a href="consultar_productos.php?id=' . $idProducto . '" class="btn btn-primary">Ver Producto</a>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error: ' . $sql . '<br>' . $conexion->error . '</div>';
            }
        }

        // Obtener el producto a actualizar
        if (isset($_GET['id'])) {
            $idProducto = $_GET['id'];
            $sql = "SELECT * FROM Producto WHERE IdProducto='$idProducto'";
            $result = $conexion->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                ?>

                <form method="POST" action="actualizar_producto.php">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $row['Nombre']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $row['Descripcion']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock:</label>
                        <input type="number" class="form-control" id="stock" name="stock" value="<?php echo $row['Stock']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="precio_venta">Precio de venta:</label>
                        <input type="number" step="0.01" class="form-control" id="precio_venta" name="precio_venta" value="<?php echo $row['PrecioVenta']; ?>" required>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $idProducto; ?>">
                    <button type="submit" class="btn btn-primary">Actualizar Producto</button>
                </form>
                <?php
                } else {
                    echo '<div class="alert alert-danger" role="alert">No se encontró el producto.</div>';
                }
                }
                ?>
    </div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>          