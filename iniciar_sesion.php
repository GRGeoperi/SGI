<?php
include("base_datos.php");
    $datosRecibidos = isset($_POST['login']) && $_POST['email'] != NULL && $_POST['pwd'] != NULL;
    if ($datosRecibidos)
    {
        $correo = $_POST['email'];
        $password = $_POST['pwd'];
        $verificarCorreo = "SELECT * FROM usuario WHERE email = '$correo'";
        $resultadoCorreo = mysqli_query($conexion, $verificarCorreo);
        $existenciaCorreoEnDB = $resultadoCorreo->num_rows > 0;
        if ($existenciaCorreoEnDB)
        {
            $extraerHash = "SELECT `hash` FROM usuario WHERE email = '$correo'";
            $hashAsociado = mysqli_query($conexion, $extraerHash);
            $filaHash = mysqli_fetch_assoc($hashAsociado);
            $hash = $filaHash['hash'];
            if (password_verify($password, $hash))
            {
                $consultarRol = "SELECT u.nombre AS usuario, u.email, r.nombre AS rol FROM usuario u JOIN rol r ON u.rol_id = r.id WHERE u.email = '$correo';";
                $rolAsociado = mysqli_query($conexion, $consultarRol);
                $filaRol = mysqli_fetch_assoc($rolAsociado);
                $rol = $filaRol['rol'];

                $consultarId = "SELECT `id` FROM usuario WHERE email = '$correo'";
                $idAsociado = mysqli_query($conexion, $consultarId);
                $filaId = mysqli_fetch_assoc($idAsociado);
                $id = $filaId['id'];

                $consultarUsername = "SELECT `username` FROM usuario WHERE email = '$correo'";
                $usernameAsociado = mysqli_query($conexion, $consultarUsername);
                $filaUsername = mysqli_fetch_assoc($usernameAsociado);
                $username = $filaUsername['username'];
                if ($rol == "Administrador")
                {
                    $_SESSION['id'] = $id;
                    $_SESSION['username'] = $username;
                    header("Location: /experimentando/admin.php");
                    exit();
                }
                if ($rol == "Almacenero")
                {
                    $_SESSION['id'] = $id;
                    // $_SESSION['username'] = $username;
                    // header("Location: /experimentando/storekeeper.php");
                    // exit();
                }
                if ($rol == "Vendedor")
                {
                    $_SESSION['id'] = $id;
                    $_SESSION['username'] = $username;
                    header("Location: /experimentando/seller.php");
                    exit();
                }
            }
            else
            {
                $_SESSION['message'] = "La contraseña es incorrecta.";
                $_SESSION['message_type'] = "failure";
                header("Location: login.php");
            }
        }
        else
        {
            $_SESSION['message'] = "No existe el correo en la base de datos.";
            $_SESSION['message_type'] = "failure";
            header("Location: login.php");
        }
    }
    else
    {
        $_SESSION['message'] = "Por favor, rellene los campos.";
        $_SESSION['message_type'] = "failure";
        header("Location: login.php");
    }
?>
