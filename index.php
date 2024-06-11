<?php
include("includes/header.php");
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
    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
        <div class="row gx-lg-5 align-items-center mb-5">
            <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                <h1 class="my-5 display-6 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                    ¡Optimiza tu Inventario<br />
                    <span style="color: hsl(218, 81%, 75%)">con Nuestro Sistema Gestor!</span>
                </h1>
                <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
                    Nuestro sistema gestor de inventario te ofrece una solución integral para manejar tus productos
                    de manera eficiente y precisa. Con nuestra plataforma, podrás:
                </p>
                <ul class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
                    <li>Controlar el stock en tiempo real.</li>
                    <li>Reducir pérdidas y optimizar el espacio de almacenamiento.</li>
                    <li>Automatizar procesos de compra y reposición.</li>
                    <li>Generar reportes detallados y analíticos.</li>
                </ul>
                <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
                    No pierdas más tiempo ni dinero, ¡transforma la gestión de tu inventario hoy mismo!
                </p>
            </div>

            <div class="col-lg-6 mb-5 mb-lg-0 position-relative">

                <div class="card-body px-5 py-4 px-md-4">
                    <img src="/experimentando/src/inv.png" height="450" alt="ejemplo inventario" loading="lazy" />
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section: Design Block -->
<?php
include("includes/footer.php");
?>
