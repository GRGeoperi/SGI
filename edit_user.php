<?php
include("base_datos.php");
$idAModificar = $_GET['id_usuario'];
$query = "SELECT * FROM usuario WHERE id = $idAModificar";
$modificarEnDB = mysqli_query($conexion, $query);
if (mysqli_num_rows($modificarEnDB) == 1) {
    $row = mysqli_fetch_array($modificarEnDB);
    $rol = $row['rol_id'];
}
if (isset($_POST['update'])) {
    $nuevoRol = $_POST['nuevo_rol_id'];
    $consultaModificar = "UPDATE usuario set rol_id = '$nuevoRol' WHERE id = $idAModificar";
    mysqli_query($conexion, $consultaModificar);
    $_SESSION['message'] = "Se cambió el rol de usuario.";
    header("Location: /experimentando/admin.php");
    exit();
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
                        <form action="edit_user.php?id_usuario=<?php echo $_GET['id_usuario'] ?>" method="POST">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h6 class="fw-bold mb-2 text-uppercase">Actualizar rol</h6>
                                <input type="text" name="nuevo_rol_id" value="<?php echo $rol; ?>" class="form-control" placeholder="Actualiza el rol">
                                <br>
                                <p class="text-white-50 mb-1">Recuerda:</p>
                                <p class="text-white-50 mb-0">1 = Administrador</p>
                                <p class="text-white-50 mb-0">2 = Almacenero</p>
                                <p class="text-white-50 mb-0">3 = Vendedor</p>
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