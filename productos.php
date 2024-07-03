<?php
include("includes/headerAdmin.php");
?>
<section class="background-radial-gradient overflow-hidden">
    <style>
        .background-radial-gradient {
            background-color: hsl(218, 41%, 15%);
            background-image: radial-gradient(650px circle at 0% 0%,
                    hsl(218, 41%, 35%) 15%,
                    hsl(218, 41%, 30%) 35%,
                    hsl(218, 41%, 20%) 75%,
                    hsl(218, 41%, 19%) 80%,
                    transparent 100%),
                radial-gradient(1250px circle at 100% 100%,
                    hsl(218, 41%, 45%) 15%,
                    hsl(218, 41%, 30%) 35%,
                    hsl(218, 41%, 20%) 75%,
                    hsl(218, 41%, 19%) 80%,
                    transparent 100%);
        }

        .bg-glass {
            background-color: hsla(0, 0%, 100%, 0.9) !important;
            backdrop-filter: saturate(200%) blur(25px);
        }
    </style>
    <div class="container py-5 h-100">
        <table class="table table-striped align-middle mb-5">
            <?php
            if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?=
                    $_SESSION['message'];
                    ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php }
            unset($_SESSION['message']) ?>
            <div class="container px-4 py-1 px-md-1 text-center text-lg-start my-1">
                <div class="row gx-lg-1 align-items-center mb-3">
                    <div class="col-lg-3 mb-1 mb-lg-0" style="z-index: 10">
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            <div class="card-body text-center">
                                <p class="fw-bold mb-1">
                                    Añadir presentación
                                </p>
                                <a href="add_presentation.php">
                                    <img src="/experimentando/src/add.png" alt="añadir">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 mb-1 mb-lg-0 position-relative" style="z-index: 10">
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            <div class="card-body text-center">
                                <p class="fw-bold mb-1">
                                    Añadir producto
                                </p>
                                <a href="add_product.php">
                                    <img src="/experimentando/src/add.png" alt="añadir">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <thead class="bg-light">
                <tr class="table-dark">
                    <th>Nombre producto</th>
                    <th>Presentación</th>
                    <th>Proveedor</th>
                    <th>Cantidad disponible</th>
                    <th>Cantidad mínima requerida</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $usuarioId = $_SESSION['id'];
                $consultaTablaProducto =
                    "SELECT u.id_producto, u.nombre_producto, u.cantidad_disponible,
                    u.cantidad_minima_requerida, u.descripcion, u.creacion,
                    c.nombre_presentacion AS presentacion, p.nombre_negocio AS proveedor FROM producto u JOIN 
                    presentacion c JOIN proveedor p ON u.id_presentacion = c.id_presentacion AND u.id_proveedor = p.id_proveedor;";
                $resultadoProductos = mysqli_query($conexion, $consultaTablaProducto);
                while ($row = mysqli_fetch_array($resultadoProductos)) { ?>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="ms-3">
                                    <p class="text-muted mb-0"><?php echo $row['nombre_producto'] ?></p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="ms-3">
                                    <p class="text-muted mb-0"><?php echo $row['presentacion'] ?></p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="ms-3">
                                    <p class="text-muted mb-0"><?php echo $row['proveedor'] ?></p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="ms-3">
                                    <p class="text-muted mb-0"><?php echo $row['cantidad_disponible'] ?></p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="ms-3">
                                    <p class="text-muted mb-0"><?php echo $row['cantidad_minima_requerida'] ?></p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="ms-3">
                                    <p class="text-muted mb-0"><?php echo $row['descripcion'] ?></p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="edit_product.php?id_producto=<?php echo $row['id_producto'] ?>">
                                <img src="/experimentando/src/editar.png" alt="editar">
                            </a>
                            <br>
                            <a href="delete_product.php?id_producto=<?php echo $row['id_producto'] ?>">
                                <img src="/experimentando/src/eliminar.png" alt="eliminar">
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>
<?php
include("includes/footer.php");
?>