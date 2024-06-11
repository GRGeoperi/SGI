<?php
    include("base_datos.php");

    $idAModificar = $_GET['id_categoria'];
    $query = "SELECT * FROM categoria WHERE categoria.id_categoria = $idAModificar;";
    $consultarBD = mysqli_query($conexion, $query);

    if (mysqli_num_rows($consultarBD) == 1) {
        $row = mysqli_fetch_assoc($consultarBD);
        $nombre = $row['nombre_negocio'];
    }

    if (isset($_POST['update'])) {
        $nuevoNombre = $_POST['nuevo_nombre'];
        $consultaModificar = "UPDATE categoria SET nombre = '$nuevoNombre' WHERE categoria.id_categoria = $idAModificar;";
        mysqli_query($conexion, $consultaModificar);
        $_SESSION['message'] = "Se cambió el nombre de la categoría.";
        header("Location: categorias.php");
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
                        <form action="edit_supplier.php?id_proveedor<?php echo $_GET['id_proveedor']?>" method="POST">
                            <div class="mb-md-2 mt-md-2 pb-2">
                                <h6 class="fw-bold mb-2">Actualizar nombre de negocio</h6>
                                <input type="text" name="nuevo_nombre_negocio" value="<?php echo $nombre; ?>" class="form-control" placeholder="Nombre" required>
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
                                <input type="text" name="id_categoria" class="form-control" placeholder="Identificador en la tabla de abajo" required>
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
