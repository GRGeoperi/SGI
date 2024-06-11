<?php
include("base_datos.php");
include("includes/header.php");
?>
<!-- Section: Design Block -->
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

        #radius-shape-1 {
            height: 220px;
            width: 220px;
            top: -60px;
            left: -130px;
            background: radial-gradient(#44006b, #ad1fff);
            overflow: hidden;
        }

        #radius-shape-2 {
            border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
            bottom: -60px;
            right: -110px;
            width: 300px;
            height: 300px;
            background: radial-gradient(#44006b, #ad1fff);
            overflow: hidden;
        }

        .bg-glass {
            background-color: hsla(0, 0%, 100%, 0.9) !important;
            backdrop-filter: saturate(200%) blur(25px);
        }
    </style>

    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
        <div class="row gx-lg-5 align-items-center mb-5">
            <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                    La mejor oferta <br />
                    <span style="color: hsl(218, 81%, 75%)">para tu negocio</span>
                </h1>
                <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
                    Nosotros proporcionamos a las empresas
                    una solución integral y flexible para la gestión de inventario que les permita mejorar
                    su eficiencia operativa, optimizar sus recursos y adaptarse a un entorno empresarial
                    en constante cambio. Al hacerlo, aspiramos a ser un socio estratégico para el éxito
                    a largo plazo de nuestros clientes. ¡No lo esperes más y regístrate!
                </p>
            </div>

            <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                <div class="card bg-glass">
                    <div class="card-body px-4 py-5 px-md-5">
                        <?php
                        if (isset($_SESSION['message'])) { ?>
                            <div class="alert alert- <?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                                <?=
                                $_SESSION['message'];
                                ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php session_unset();
                        } ?>
                        <form action="guardar_usuarios.php" method="POST">
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div data-mdb-input-init class="form-outline">
                                        <input type="text" id="form3Example1" class="form-control" name="nombre" />
                                        <label class="form-label" for="form3Example1">Nombre</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div data-mdb-input-init class="form-outline">
                                        <input type="text" id="form3Example2" class="form-control" name="apellidos" />
                                        <label class="form-label" for="form3Example2">Apellidos</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Username input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="text" id="form3Example3" class="form-control" name="username" />
                                <label class="form-label" for="form3Example3">Nombre de usuario</label>
                            </div>

                            <!-- Email input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="email" id="form3Example3" class="form-control" name="email" />
                                <label class="form-label" for="form3Example3">Dirección de email</label>
                            </div>

                            <!-- Password input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="password" id="form3Example4" class="form-control" name="pwd" />
                                <label class="form-label" for="form3Example4">Contraseña</label>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4" name="register">
                                Registrarse
                            </button>
                        </form>
                        <div>
                            <p class="mb-0">¿Ya estás registrado? <a href="login.php" class="text-black-50 fw-bold">Iniciar sesión</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section: Design Block -->
<?php
include("includes/footer.php");
?>
