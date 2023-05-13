<?php include 'conexion.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Productos</title>
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

        .card {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Consulta de Productos</h2>
        
        <?php
        // Buscar productos por nombre
        $search = '';
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $sql = "SELECT * FROM Producto WHERE Nombre LIKE '%$search%' OR Descripcion LIKE '%$search%'";
        } else {
            $sql = "SELECT * FROM Producto";
        }

        $result = $conexion->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="card">';
                echo '  <div class="card-body">';
                echo '    <h5 class="card-title"> ★ ID: ' . $row['IdProducto'] . '</h5>';
                echo '    <p class="card-text"> • Nombre: ' . $row['Nombre'] . '</p>';
                echo '    <p class="card-text"> • Descripción: ' . $row['Descripcion'] . '</p>';
                echo '    <p class="card-text"> • Stock: ' . $row['Stock'] . '</p>';
                echo '    <p class="card-text"> • Precio de venta: ' . $row['PrecioVenta'] . ' soles</p>';
                echo '    <a href="actualizar_producto.php?id=' . $row['IdProducto'] . '" class="btn btn-primary">Actualizar</a>';
                echo '    <a href="eliminar_producto.php?id=' . $row['IdProducto'] . '" class="btn btn-danger">Eliminar</a>';
                echo '  </div>';
                echo '</div>';
            }
        } else {
            echo '<div class="alert alert-info" role="alert">No se encontraron productos.</div>';
        }
        ?>

        <form method="GET" action="consultar_productos.php" class="form-inline">
            <div class="form-group mx-sm-3 mb-2">
                <input type="text" class="form-control" name="search" placeholder="Buscar por nombre o descripción" value="<?php echo $search; ?>">
            </div>
            <div>
                <button type="submit" class="btn btn-secondary">Buscar</button>&nbsp;&nbsp;
                <a href="crear_producto.php" class="btn btn-primary">Crear Producto</a>
            </div>
        </form>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>