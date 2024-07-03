<?php
include("base_datos.php");
if (isset($_POST['submit'])) {
    $idPresentacion = $_POST['id_presentacion'];
    $idProveedor = $_POST['id_proveedor'];
    $nombreProducto = $_POST['nombre_producto'];
    $cantidadDisponible = $_POST['cantidad_disponible'];
    $cantidadMinima = $_POST['cantidad_minima'];
    $descripcion = $_POST['descripcion'];

    $validacion = isset($idPresentacion) && isset($idProveedor) && isset($nombreProducto)
        && isset($cantidadDisponible) && isset($cantidadMinima) && isset($descripcion);
    if ($validacion) {
        $insertarProveedor = "INSERT INTO producto (id_presentacion, id_proveedor, nombre_producto, 
                cantidad_disponible, cantidad_minima_requerida, descripcion) 
                VALUES ('$idPresentacion', '$idProveedor', '$nombreProducto',
                '$cantidadDisponible', '$cantidadMinima', '$descripcion');";
        $ejecutarInsercionProveedor = mysqli_query($conexion, $insertarProveedor);
        $_SESSION['message'] = "Se agregó el producto.";
        header("Location: productos.php");
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
                        <form action="add_product.php" method="POST">
                            <div class="mb-md-2 mt-md-2 pb-2">
                                <h6 class="fw-bold mb-2">Nombre de producto</h6>
                                <input type="text" name="nombre_producto" class="form-control" placeholder="Producto" required>
                            </div>
                            <div class="mb-md-2 mt-md-2 pb-2">
                                <h6 class="fw-bold mb-2">Cantidad disponible almacenada</h6>
                                <input type="text" name="cantidad_disponible" class="form-control" placeholder="Cantidad disponible" required>
                            </div>
                            <div class="mb-md-2 mt-md-2 pb-2">
                                <h6 class="fw-bold mb-2">Cantidad mínima requerida</h6>
                                <input type="text" name="cantidad_minima" class="form-control" placeholder="Cantidad mínima" required>
                            </div>
                            <div class="mb-md-2 mt-md-2 pb-2">
                                <h6 class="fw-bold mb-2">Descripción</h6>
                                <textarea name="descripcion" rows="2" class="form-control" placeholder="Descripción"></textarea>
                            </div>
                            <div class="mb-md-2 mt-md-2 pb-2">
                                <h6 class="fw-bold mb-2">Presentación</h6>
                                <select name="id_presentacion">
                                    <?php
                                    $consultaTablaPresentacion = "SELECT * FROM presentacion";
                                    $resultadoPresentacion = mysqli_query($conexion, $consultaTablaPresentacion);
                                    if (isset($resultadoPresentacion)) {
                                        while ($row = mysqli_fetch_array($resultadoPresentacion)) {
                                            echo '<option value="' . $row["id_presentacion"] . '">' . $row["nombre_presentacion"] . '</option>';
                                        }
                                    } else {
                                        echo '<option value="">No hay datos disponibles</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-md-2 mt-md-2 pb-2">
                                <h6 class="fw-bold mb-2">Proveedor</h6>
                                <select name="id_proveedor">
                                    <?php
                                    $consultaTablaProveedor = "SELECT * FROM proveedor";
                                    $resultadoProveedor = mysqli_query($conexion, $consultaTablaProveedor);
                                    if (isset($resultadoProveedor)) {
                                        while ($row = mysqli_fetch_array($resultadoProveedor)) {
                                            echo '<option value="' . $row["id_proveedor"] . '">' . $row["nombre_negocio"] . '</option>';
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