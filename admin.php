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
            <thead class="bg-light">
                <tr class="table-dark">
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Rol</th>
                    <th>Creación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $usuarioId = $_SESSION['id'];
                $consultaTablaUsuario = "SELECT
            u.id AS id_usuario,
            u.nombre,
            u.apellidoPaterno AS apellido_paterno,
            u.apellidoMaterno AS apellido_materno,
            u.username AS nombre_usuario,
            u.email,
            r.nombre AS rol,
            u.creacion AS fecha_creacion
            FROM usuario u
            JOIN rol r ON u.rol_id = r.id;";
                $resultadoUsuarios = mysqli_query($conexion, $consultaTablaUsuario);
                while ($row = mysqli_fetch_array($resultadoUsuarios)) { ?>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="ms-3">
                                    <p class="fw-bold mb-1"><?php echo $row['nombre_usuario'] ?></p>
                                    <p class="text-muted mb-0"><?php echo $row['email'] ?></p>
                                </div>
                            </div>
                        </td>
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
                                    <p class="text-muted mb-0"><?php echo $row['apellido_paterno'] ?></p>
                                    <p class="text-muted mb-0"><?php echo $row['apellido_materno'] ?></p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="ms-3">
                                    <p class="text-muted mb-0"><?php echo $row['rol'] ?></p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="ms-3">
                                    <p class="text-muted mb-0"><?php echo $row['fecha_creacion'] ?></p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="edit_user.php?id_usuario=<?php echo $row['id_usuario'] ?>">
                                <img src="/experimentando/src/editar.png" alt="editar">
                            </a>
                            <br>
                            <a href="delete_user.php?id_usuario=<?php echo $row['id_usuario'] ?>">
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