<?php
    include("base_datos.php");
    if (isset($_POST['submit'])) {
        $nombre = $_POST['nombre_presentacion'];
        $insertarPresentacion = "INSERT INTO presentacion (nombre_presentacion) VALUES ('$nombre');";
        mysqli_query($conexion, $insertarPresentacion);
        $_SESSION['message'] = "Se agregó la presentación.";
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
                        <form action="add_presentation.php" method="POST">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h6 class="fw-bold mb-2 text-uppercase">Nombre presentación</h6>
                                <input type="text" name="nombre_presentacion" class="form-control" placeholder="Presentación">
                            </div>
                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5" type="submit" name="submit">Actualizar</button>
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