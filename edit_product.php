<?php
    include("base_datos.php");

    $idAModificar = $_GET['id_producto'];
    $query = "SELECT * FROM producto WHERE id_producto = $idAModificar;";
    $consultarBD = mysqli_query($conexion, $query);

    if (mysqli_num_rows($consultarBD) == 1) {
        $row = mysqli_fetch_assoc($consultarBD);
        $nombre = $row['nombre_producto'];
        $cantidadDisponible = $row['cantidad_disponible'];
        $cantidadMinimaRequerida = $row['cantidad_minima_requerida'];
        $descripcion = $row['descripcion'];
    }

    if (isset($_POST['update'])) {
        if (isset($_POST['nuevo_nombre_producto'])) {
            $nuevoNombre = $_POST['nuevo_nombre_producto'];
            $consultaNombre = "UPDATE producto SET nombre_producto = '$nuevoNombre' WHERE id_producto = $idAModificar;";
            mysqli_query($conexion, $consultaNombre);
        }

        if (isset($_POST['nueva_cantidad_disponible'])) {
            $nuevaCantidadDisponible = $_POST['nueva_cantidad_disponible'];
            $consultaCantidadDisponible = "UPDATE producto SET cantidad_disponible = '$nuevaCantidadDisponible' WHERE id_producto = $idAModificar;";
            mysqli_query($conexion, $consultaCantidadDisponible);
        }

        if (isset($_POST['nueva_cantidad_minima_requerida'])) {
            $nuevaCantidadMinima = $_POST['nueva_cantidad_minima_requerida'];
            $consultaCantidadMinima = "UPDATE producto SET cantidad_minima_requerida = '$nuevaCantidadMinima' WHERE id_producto = $idAModificar;";
            mysqli_query($conexion, $consultaCantidadMinima);
        }

        if (isset($_POST['nueva_descripcion'])) {
            $nuevaDescripcion = $_POST['nueva_descripcion'];
            $consultaDescripcion = "UPDATE producto SET descripcion = '$nuevaDescripcion' WHERE id_producto = $idAModificar;";
            mysqli_query($conexion, $consultaDescripcion);
        }

        $_SESSION['message'] = "Se actualizaron los cambios.";
        header("Location: productos.php");
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
    </style>
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <form action="edit_product.php?id_producto=<?php echo $_GET['id_producto']?>" method="POST">
                            <div class="mb-md-2 mt-md-2 pb-2">
                                <h6 class="fw-bold mb-2">Nombre de producto</h6>
                                <input type="text" name="nuevo_nombre_producto" value="<?php echo $nombre; ?>" class="form-control" placeholder="Nombre">
                            </div>
                            <div class="mb-md-2 mt-md-2 pb-2">
                                <h6 class="fw-bold mb-2">Cantidad disponible</h6>
                                <input type="text" name="nueva_cantidad_disponible" value="<?php echo $cantidadDisponible; ?>" class="form-control" placeholder="Teléfono">
                            </div>
                            <div class="mb-md-2 mt-md-2 pb-2">
                                <h6 class="fw-bold mb-2">Cantidad mínima requerida</h6>
                                <input type="text" name="nueva_cantidad_minima_requerida" value="<?php echo $cantidadMinimaRequerida; ?>" class="form-control" placeholder="Num exterior">
                            </div>
                            <div class="mb-md-2 mt-md-2 pb-2">
                                <h6 class="fw-bold mb-2">Descripción</h6>
                                <textarea name="nueva_descripcion" rows="2" class="form-control" placeholder="Descripción"><?php echo $descripcion; ?></textarea>
                            </div>
                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5" type="submit" name="update">Actualizar</button>
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