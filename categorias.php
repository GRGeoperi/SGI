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
            <div class="container py-3">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-6 col-md-4 col-lg-3 col-xl-3">
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
                </div>
            </div>
            <thead class="bg-light">
                <tr class="table-dark">
                    <th>Nombre</th>
                    <th>Creacion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $usuarioId = $_SESSION['id'];
                $consultaTablaCategoria = "SELECT * FROM categoria";
                $resultadoCategoria = mysqli_query($conexion, $consultaTablaCategoria);
                while ($row = mysqli_fetch_array($resultadoCategoria)) { ?>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="ms-3">
                                    <p class="text-muted mb-0"><?php echo $row['nombre'] ?></p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="ms-3">
                                    <p class="text-muted mb-0"><?php echo $row['creacion'] ?></p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="edit_category.php?id_categoria=<?php echo $row['id_categoria'] ?>">
                                <img src="/experimentando/src/editar.png" alt="editar">
                            </a>
                            <br>
                            <a href="delete_category.php?id_categoria=<?php echo $row['id_categoria'] ?>">
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