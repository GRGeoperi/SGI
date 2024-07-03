<?php
include("base_datos.php");
if (isset($_POST['submit'])) {
    $nombreNegocio = $_POST['nombre_negocio'];
    $telefono = $_POST['telefono'];
    $calle = $_POST['calle'];
    $numeroExterior = $_POST['num_ext'];
    $numeroInterior = $_POST['num_int'];
    $colonia = $_POST['colonia'];
    $codigoPostal = $_POST['codigo_postal'];
    $descripcion = $_POST['descripcion'];
    $idCategoria = $_POST['id_categoria'];
    $validacion = isset($nombreNegocio) && isset($calle) && isset($numeroExterior) && isset($colonia) && isset($codigoPostal) && isset($idCategoria);
    if ($validacion) {
        if (isset($telefono) && isset($numeroInterior) && isset($descripcion)) {
            $insertarProveedor = "INSERT INTO proveedor (nombre_negocio, numero_telefonico, calle, 
                    numero_exterior, numero_interior, colonia, codigo_postal, descripcion, id_categoria) 
                    VALUES ('$nombreNegocio', '$telefono', '$calle', '$numeroExterior', '$numeroInterior', 
                    '$colonia', '$codigoPostal', '$descripcion', '$idCategoria');";
            $ejecutarInsercionProveedor = mysqli_query($conexion, $insertarProveedor);
            $_SESSION['message'] = "Se agregó el proveedor.";
            header("Location: proveedores.php");
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
                        <form action="add_supplier.php" method="POST">
                            <div class="mb-md-2 mt-md-2 pb-2">
                                <h6 class="fw-bold mb-2">Nombre de negocio</h6>
                                <input type="text" name="nombre_negocio" class="form-control" placeholder="Nombre" required>
                            </div>
                            <div class="mb-md-2 mt-md-2 pb-2">
                                <h6 class="fw-bold mb-2">Número telefónico</h6>
                                <input type="text" name="telefono" class="form-control" placeholder="Teléfono">
                            </div>
                            <div class="mb-md-2 mt-md-2 pb-2">
                                <h6 class="fw-bold mb-2">Calle</h6>
                                <input type="text" name="calle" class="form-control" placeholder="Calle" required>
                            </div>
                            <div class="mb-md-2 mt-md-2 pb-2">
                                <h6 class="fw-bold mb-2">Número exterior</h6>
                                <input type="text" name="num_ext" class="form-control" placeholder="Num exterior" required>
                            </div>
                            <div class="mb-md-2 mt-md-2 pb-2">
                                <h6 class="fw-bold mb-2">Número interior</h6>
                                <input type="text" name="num_int" class="form-control" placeholder="Num interior">
                            </div>
                            <div class="mb-md-2 mt-md-2 pb-2">
                                <h6 class="fw-bold mb-2">Colonia</h6>
                                <input type="text" name="colonia" class="form-control" placeholder="Colonia" required>
                            </div>
                            <div class="mb-md-2 mt-md-2 pb-2">
                                <h6 class="fw-bold mb-2">Codigo postal</h6>
                                <input type="text" name="codigo_postal" class="form-control" placeholder="Código postal" required>
                            </div>
                            <div class="mb-md-2 mt-md-2 pb-2">
                                <h6 class="fw-bold mb-2">Descripción</h6>
                                <textarea name="descripcion" rows="2" class="form-control" placeholder="Descripción"></textarea>
                            </div>
                            <div class="mb-md-2 mt-md-2 pb-2">
                                <h6 class="fw-bold mb-2">Identificador de categoría</h6>
                                <select name="id_categoria">
                                    <?php
                                    $consultaTablaCategoria = "SELECT * FROM categoria";
                                    $resultadoCategoria = mysqli_query($conexion, $consultaTablaCategoria);
                                    if (isset($resultadoCategoria)) {
                                        while ($row = mysqli_fetch_array($resultadoCategoria)) {
                                            echo '<option value="' . $row["id_categoria"] . '">' . $row["nombre"] . '</option>';
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