<?php
    include("base_datos.php");

    $idAModificar = $_GET['id_proveedor'];
    $query = "SELECT * FROM proveedor WHERE id_proveedor = $idAModificar;";
    $consultarBD = mysqli_query($conexion, $query);

    if (mysqli_num_rows($consultarBD) == 1) {
        $row = mysqli_fetch_assoc($consultarBD);
        $nombre = $row['nombre_negocio'];
        $numeroTelefonico = $row['numero_telefonico'];
        $calle = $row['calle'];
        $numeroExterior = $row['numero_exterior'];
        $numeroInterior = $row['numero_interior'];
        $colonia = $row['colonia'];
        $cp = $row['codigo_postal'];
        $descripcion = $row['descripcion'];
    }

    if (isset($_POST['update'])) {
        if (isset($_POST['nuevo_nombre_negocio'])) {
            $nuevoNombre = $_POST['nuevo_nombre_negocio'];
            $consultaNombre = "UPDATE proveedor SET nombre_negocio = '$nuevoNombre' WHERE id_proveedor = $idAModificar;";
            mysqli_query($conexion, $consultaNombre);
        }

        if (isset($_POST['nuevo_numero_telefonico'])) {
            $nuevoNumeroTelefonico = $_POST['nuevo_numero_telefonico'];
            $consultaTelefono = "UPDATE proveedor SET numero_telefonico = '$nuevoNumeroTelefonico' WHERE id_proveedor = $idAModificar;";
            mysqli_query($conexion, $consultaTelefono);
        }

        if (isset($_POST['nueva_calle'])) {
            $nuevaCalle = $_POST['nueva_calle'];
            $consultaCalle = "UPDATE proveedor SET calle = '$nuevaCalle' WHERE id_proveedor = $idAModificar;";
            mysqli_query($conexion, $consultaCalle);
        }

        if (isset($_POST['nuevo_numero_ext'])) {
            $nuevoNumeroExt = $_POST['nuevo_numero_ext'];
            $consultaNumeroExt = "UPDATE proveedor SET numero_exterior = '$nuevoNumeroExt' WHERE id_proveedor = $idAModificar;";
            mysqli_query($conexion, $consultaNumeroExt);
        }

        if (isset($_POST['nuevo_numero_int'])) {
            $nuevoNumeroInt = $_POST['nuevo_numero_int'];
            $consultaNumeroExt = "UPDATE proveedor SET numero_interior = '$nuevoNumeroInt' WHERE id_proveedor = $idAModificar;";
            mysqli_query($conexion, $consultaNumeroInt);
        }

        if (isset($_POST['nueva_colonia'])) {
            $nuevaColonia = $_POST['nueva_colonia'];
            $consultaColonia = "UPDATE proveedor SET colonia = '$nuevaColonia' WHERE id_proveedor = $idAModificar;";
            mysqli_query($conexion, $consultaColonia);
        }

        if (isset($_POST['nuevo_cp'])) {
            $nuevoCp = $_POST['nuevo_cp'];
            $consultaCp = "UPDATE proveedor SET codigo_postal = '$nuevoCp' WHERE id_proveedor = $idAModificar;";
            mysqli_query($conexion, $consultaCp);
        }

        if (isset($_POST['nueva_descripcion'])) {
            $nuevaDescripcion = $_POST['nueva_descripcion'];
            $consultaDescripcion = "UPDATE proveedor SET descripcion = '$nuevaDescripcion' WHERE id_proveedor = $idAModificar;";
            mysqli_query($conexion, $consultaDescripcion);
        }

        $_SESSION['message'] = "Se actualizaron los cambios.";
        header("Location: proveedores.php");
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
                        <form action="edit_supplier.php?id_proveedor=<?php echo $_GET['id_proveedor']?>" method="POST">
                            <div class="mb-md-2 mt-md-2 pb-2">
                                <h6 class="fw-bold mb-2">Actualizar nombre de negocio</h6>
                                <input type="text" name="nuevo_nombre_negocio" value="<?php echo $nombre; ?>" class="form-control" placeholder="Nombre">
                            </div>
                            <div class="mb-md-2 mt-md-2 pb-2">
                                <h6 class="fw-bold mb-2">Número telefónico</h6>
                                <input type="text" name="nuevo_numero_telefonico" value="<?php echo $numeroTelefonico; ?>" class="form-control" placeholder="Teléfono">
                            </div>
                            <div class="mb-md-2 mt-md-2 pb-2">
                                <h6 class="fw-bold mb-2">Calle</h6>
                                <input type="text" name="nueva_calle" value="<?php echo $calle; ?>" class="form-control" placeholder="Calle">
                            </div>
                            <div class="mb-md-2 mt-md-2 pb-2">
                                <h6 class="fw-bold mb-2">Número exterior</h6>
                                <input type="text" name="nuevo_numero_exterior" value="<?php echo $numeroExterior; ?>" class="form-control" placeholder="Num exterior">
                            </div>
                            <div class="mb-md-2 mt-md-2 pb-2">
                                <h6 class="fw-bold mb-2">Número interior</h6>
                                <input type="text" name="nuevo_numero_interior" value="<?php echo $numeroInterior; ?>" class="form-control" placeholder="Num interior">
                            </div>
                            <div class="mb-md-2 mt-md-2 pb-2">
                                <h6 class="fw-bold mb-2">Colonia</h6>
                                <input type="text" name="nueva_colonia" value="<?php echo $colonia; ?>" class="form-control" placeholder="Colonia">
                            </div>
                            <div class="mb-md-2 mt-md-2 pb-2">
                                <h6 class="fw-bold mb-2">Codigo postal</h6>
                                <input type="text" name="nuevo_cp" value="<?php echo $cp; ?>" class="form-control" placeholder="Código postal">
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
