<?php
include("includes/headerSeller.php");
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
        <div class="col-md-4 mb-4">
            <div class="input-group">
                <input type="search" class="form-control rounded" placeholder="Por id o nombre" aria-label="Search" aria-describedby="search-addon" />
                <button type="button" class="btn btn-outline-warning" data-mdb-ripple-init>Buscar</button>
            </div>
        </div>
        <table class="table table-striped align-middle mb-5">
            <thead class="bg-light">
                <tr class="table-dark">
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Cantidad disponible</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $usuarioId = $_SESSION['id'];
                $consultaTablaProducto =
                    "SELECT u.id_producto, u.nombre_producto, u.cantidad_disponible,
                    u.descripcion, c.nombre_presentacion AS presentacion FROM producto u JOIN 
                    presentacion c ON u.id_presentacion = c.id_presentacion;";
                $resultadoProductos = mysqli_query($conexion, $consultaTablaProducto);
                while ($row = mysqli_fetch_array($resultadoProductos)) { ?>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="ms-3">
                                    <p class="text-muted mb-0"><?php echo $row['id_producto'] ?></p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="ms-3">
                                    <p class="text-muted mb-0"><?php echo $row['nombre_producto'] ?></p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="ms-3">
                                    <p class="text-muted mb-0"><?php echo $row['cantidad_disponible'] ?></p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="ms-3">
                                    <p class="text-muted mb-0"><?php echo $row['descripcion'] ?></p>
                                </div>
                            </div>
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