<?php
// ?Verificación de la conexión a la base de datos
include("base_datos.php");
?>

<?php
// ?Verificación de las variables de sesión
$datosRecibidos = isset($_SESSION['id']) && isset($_SESSION['username']);
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
    if ($permiso == 0) {
        header("Location: acceso_denegado.php");
        exit();
    }
} else {
    header("Location: /experimentando/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Geoperi González Roldán" />
    <meta name="description" content="Proyecto de gestión de inventario para la materia de Tecnologías
                para el Desarrollo de Aplicaciones Web, impartida por la maestra Sandra 
                Luz Morales Guitron del grupo 4CV4." />
    <title>SGI</title>
    <!-- Importación de estilos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button data-mdb-collapse-init class="navbar-toggler" type="button" data-mdb-target="#navbarCenteredExample" aria-controls="navbarCenteredExample" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse justify-content-center" id="navbarCenteredExample">
                <!-- Left links -->
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <!-- Navbar dropdown -->
                    <li class="nav-item dropdown">
                        <a data-mdb-dropdown-init class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" aria-expanded="false">
                            Panel de acciones
                        </a>
                        <!-- Dropdown menu -->
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="admin.php">Administrar usuarios</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="paginas_relacionadas.php">Administrar páginas accesibles</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <a class="dropdown-item" href="categorias.php">Administrar categorías</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="proveedores.php">Administrar proveedores</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="productos.php">Administrar productos</a>
                            </li>
                        </ul>
                    </li>
                    <!-- Avatar -->
                    <li class="nav-item">
                        <a class="nav-link disabled"><?php echo $_SESSION['username']; ?></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a data-mdb-dropdown-init class="nav-link dropdown-toggle d-flex align-items-center" href="admin.php" id="navbarDropdownMenuLink" role="button" aria-expanded="false">
                            <img src="/experimentando/src/user.png" class="rounded-circle" height="22" alt="Usuario" loading="lazy" />
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li>
                                <a class="dropdown-item" href="cerrar_sesion.php">Cerrar sesión</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->

    </nav>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.0/mdb.umd.min.js">
        // Initialization for ES Users
        import {
            Dropdown,
            initMDB
        } from "mdb-ui-kit";

        initMDB({
            Dropdown
        });
    </script>