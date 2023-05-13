
<?php
$host = 'localhost'; // Por ejemplo, 'localhost' si estás en tu servidor local
$usuario = 'root'; // Nombre de usuario de la base de datos
$contraseña = 'usbw'; // Contraseña de la base de datos
$base_datos = 'eval02'; // Nombre de la base de datos

// Establecer la conexión
$conexion = new mysqli($host, $usuario, $contraseña, $base_datos);

// Verificar si hay errores en la conexión
if ($conexion->connect_error) {
    die('Error de conexión: ' . $conexion->connect_error);
}
?>
