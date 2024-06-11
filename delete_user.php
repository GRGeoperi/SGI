<?php
// ?Verificación de la conexión a la base de datos
include("base_datos.php");
?>

<?php
// ?Verificación de las variables de sesión
$datosRecibidos = isset($_SESSION['id']) && isset($_GET['id_usuario']);
if ($datosRecibidos) {
    $usuarioId = $_SESSION['id'];
    $rutaPagina = $_SERVER['PHP_SELF'];
    $consultaPaginaAccesible = "SELECT COUNT(*) AS permiso_valido
    FROM usuario u
    JOIN rol r ON u.rol_id = r.id
    JOIN rol_permiso rp ON r.id = rp.rol_id
    JOIN permiso p ON rp.permiso_id = p.id
    JOIN pagina_permiso pp ON p.id = pp.permiso_id
    JOIN pagina pg ON pp.pagina_id = pg.id
    WHERE u.id = '$usuarioId' AND pg.ruta = '$rutaPagina'";
    $resultadoPaginaAccesible = mysqli_query($conexion, $consultaPaginaAccesible);
    $resultadoAsociado = mysqli_fetch_assoc($resultadoPaginaAccesible);
    $permiso = $resultadoAsociado['permiso_valido'];
    if ($permiso > 0) {
        $idAEliminar = $_GET['id_usuario'];
        $eliminarFila = "DELETE FROM usuario WHERE id = $idAEliminar";
        $eliminarEnDB = mysqli_query($conexion, $eliminarFila);
        if (!$eliminarEnDB) {
            die("Falló la consulta");
        }
        $_SESSION['message'] = "Se eliminó definitivamente el usuario";
        header("Location: admin.php");
    } else {
        header("Location: acceso_denegado.php");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
?>