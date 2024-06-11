<?php
    session_start();
    // !Intentar conectar a la base de datos
    try
    {
        $conexion = mysqli_connect('localhost', 'root', '', 'SGI');
    }
    // !Manejar el error de conexión
    catch (Exception $error)
    {
        // ?Registrar el error
        error_log($error->getMessage());
        // ?Mostrar el error y detener la ejecución
        die("Error de conexión: " . $error->getMessage());
    }
?>
