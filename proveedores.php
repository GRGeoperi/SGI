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
                                    Añadir categoría
                                </p>
                                <a href="add_category.php">
                                    <img src="/experimentando/src/add.png" alt="añadir">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 mb-1 mb-lg-0 position-relative" style="z-index: 10">
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            <div class="card-body text-center">
                                <p class="fw-bold mb-1">
                                    Añadir proveedor
                                </p>
                                <a href="add_supplier.php">
                                    <img src="/experimentando/src/add.png" alt="añadir">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <thead class="bg-light">
                <tr class="table-dark">
                    <th>Nombre de negocio</th>
                    <th>Número telefónico</th>
                    <th>Calle</th>
                    <th>Número exterior</th>
                    <th>Número interior</th>
                    <th>Colonia</th>
                    <th>Código postal</th>
                    <th>Descripción</th>
                    <th>Categoría</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $usuarioId = $_SESSION['id'];
                $consultaTablaProveedor = 
                "SELECT u.id_proveedor, u.nombre_negocio, u.numero_telefonico,
                    u.calle, u.numero_exterior, u.numero_interior, u.colonia,
                    u.codigo_postal, u.descripcion, c.nombre AS nombre_cat,
                    u.creacion FROM proveedor u JOIN categoria c ON u.id_categoria = c.id_categoria;";
                $resultadoProveedor = mysqli_query($conexion, $consultaTablaProveedor);

                while ($row = mysqli_fetch_array($resultadoProveedor)) { ?>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="ms-3">
                                    <p class="text-muted mb-0"><?php echo $row['nombre_negocio'] ?></p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="ms-3">
                                    <p class="text-muted mb-0">
                                    <?php
                                        if($row['numero_telefonico'] != NULL)
                                        {
                                            echo $row['numero_telefonico'];
                                        }
                                        else
                                        {
                                            echo "Sin registrar";
                                        };
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="ms-3">
                                    <p class="text-muted mb-0"><?php echo $row['calle'] ?></p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="ms-3">
                                    <p class="text-muted mb-0"><?php echo $row['numero_exterior'] ?></p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="ms-3">
                                    <p class="text-muted mb-0">
                                        <?php
                                        if($row['numero_interior'] != NULL)
                                        {
                                            echo $row['numero_interior'];
                                        }
                                        else
                                        {
                                            echo "Sin número";
                                        };
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="ms-3">
                                    <p class="text-muted mb-0"><?php echo $row['colonia'] ?></p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="ms-3">
                                    <p class="text-muted mb-0"><?php echo $row['codigo_postal'] ?></p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="ms-3">
                                    <p class="text-muted mb-0">
                                    <?php
                                        if($row['descripcion'] != NULL)
                                        {
                                            echo $row['descripcion'];
                                        }
                                        else
                                        {
                                            echo "Sin descripción";
                                        };
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="ms-3">
                                    <p class="text-muted mb-0"><?php echo $row['nombre_cat'];?></p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="edit_supplier.php?id_proveedor=<?php echo $row['id_proveedor'] ?>">
                                <img src="/experimentando/src/editar.png" alt="editar">
                            </a>
                            <br>
                            <a href="delete_supplier.php?id_proveedor=<?php echo $row['id_proveedor'] ?>">
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