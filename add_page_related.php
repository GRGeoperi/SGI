<?php
    include("base_datos.php");
    if (isset($_POST['submit'])) {
        $nombre_pagina = $_POST['nombre_pagina'];
        $ruta = $_POST['ruta'];
        $nombre_permiso = $_POST['nombre_permiso'];
        $rolPermitido = $_POST['id_rol'];
        if (isset($nombre_pagina) && isset($ruta) && isset($nombre_permiso) && isset($rolPermitido))
        {
            $insertarPagina = "INSERT INTO pagina (nombre, ruta) VALUES ('$nombre_pagina', '$ruta');";
            $ejecutarInsercionPagina = mysqli_query($conexion, $insertarPagina);

            $insertarPermiso = "INSERT INTO permiso (nombre) VALUES ('$nombre_permiso');";
            $ejecutarInsercionPermiso = mysqli_query($conexion, $insertarPermiso);

            if ($ejecutarInsercionPagina && $ejecutarInsercionPermiso)
            {
                $consultarIdPagina = "SELECT * FROM pagina WHERE nombre = '$nombre_pagina';";
                $ejecutarConsultaIdPagina = mysqli_query($conexion, $consultarIdPagina);
                $filaIdPagina = mysqli_fetch_assoc($ejecutarConsultaIdPagina);
                $idPagina = $filaIdPagina['id'];

                $consultarIdPermiso = "SELECT * FROM permiso WHERE nombre = '$nombre_permiso';";
                $ejecutarConsultaIdPermiso = mysqli_query($conexion, $consultarIdPermiso);
                $filaIdPermiso = mysqli_fetch_assoc($ejecutarConsultaIdPermiso);
                $idPermiso = $filaIdPermiso['id'];

                $insertarPaginaPermiso = "INSERT INTO pagina_permiso (pagina_id, permiso_id) VALUES ($idPagina, $idPermiso);";
                $ejecutarInsercionPaginaPermiso = mysqli_query($conexion, $insertarPaginaPermiso);

                $insertarRolPermiso = "INSERT INTO rol_permiso (rol_id, permiso_id) VALUES ($rolPermitido, $idPermiso);";
                $ejecutarInsercionRolPermiso = mysqli_query($conexion, $insertarRolPermiso);

                $_SESSION['message'] = "Se agregó la página relacionada.";
                header("Location: paginas_relacionadas.php");
            }
        }
    }
?>
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
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <form action="add_page_related.php" method="POST">
                            <div class="mb-md-2 mt-md-2 pb-2">
                                <h6 class="fw-bold mb-2 text-uppercase">Agrega página</h6>
                                <input type="text" name="nombre_pagina" class="form-control" placeholder="Nombre página" required>
                            </div>
                            <div class="mb-md-2 mt-md-2 pb-2">
                                <h6 class="fw-bold mb-2 text-uppercase">Agrega ruta</h6>
                                <input type="text" name="ruta" class="form-control" placeholder="Ruta absoluta" required>
                            </div>
                            <div class="mb-md-2 mt-md-2 pb-2">
                                <h6 class="fw-bold mb-2 text-uppercase">Agrega permiso</h6>
                                <input type="text" name="nombre_permiso" class="form-control" placeholder="Acceso a nombre página" required>
                            </div>
                            <div class="mb-md-2 mt-md-2 pb-2">
                                <h6 class="fw-bold mb-2 text-uppercase">Asigna el rol permitido</h6>
                                <select name="id_rol">
                                    <?php
                                    $consultaTablaRol = "SELECT * FROM rol";
                                    $resultadoRol = mysqli_query($conexion, $consultaTablaRol);
                                    if (isset($resultadoRol)) {
                                        while ($row = mysqli_fetch_array($resultadoRol)) {
                                            echo '<option value="' . $row["id"] . '">' . $row["nombre"] . '</option>';
                                        }
                                    } else {
                                        echo '<option value="">No hay datos disponibles</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5" type="submit" name="submit">Añadir</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    include("includes/footer.php");
?>