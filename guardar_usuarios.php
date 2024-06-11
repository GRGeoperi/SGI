<?php
    /*  Falta verificar
        ~Que la contraseña tenga un mínimo de 8 caracteres,
        ~que la contraseña use mínimo 2 números,
        ~que la contraseña use al menos una mayúscula y
        ~que el email tenga el patrón de expresión regular estándar.
    */

    // ?Verificación de la conexión a la base de datos
    include("base_datos.php");

    // ?Verificación de los datos del formulario "signup.php"
    $datosRecibidos = isset($_POST['register']) 
        && $_POST['nombre'] != NULL && $_POST['apellidos'] != NULL 
        && $_POST['username'] != NULL && $_POST['email'] != NULL 
        && $_POST['pwd'] != NULL;

    if ($datosRecibidos)
    {
        $nombre = $_POST['nombre'];
        $usuario = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['pwd'];
        // ?Lo que se ingrese en el formulario se divide en un arreglo
        $apellidos = explode(" ", $_POST['apellidos'], 2);
        
        // ?A mayor costo, mejor protección de la contraseña
        $costeHash = ['cost' => 12];

        // ?Creación del hash asociado a la contraseña recibida
        $hash = password_hash($password, PASSWORD_DEFAULT, $costeHash);

        // !Consulta para verificar si el email ya existe
        $verificarEmail = "SELECT * FROM usuario WHERE email = '$email'";

        // !Consulta para verificar si el usuario ya existe
        $verificarUsuario = "SELECT * FROM usuario WHERE username = '$usuario'";

        // ?Ejecución de las consultas
        $resultadoEmail = mysqli_query($conexion, $verificarEmail);
        $resultadoUsuario = mysqli_query($conexion, $verificarUsuario);

        // ?Verificación de los resultados obtenidos de ambas consultas
        $existenciaEnDB = $resultadoEmail->num_rows > 0 || $resultadoUsuario->num_rows > 0;

        if ($existenciaEnDB)
        {
            // *Notificación emergente de fallo
            $_SESSION['message'] = "El email electrónico o el usuario ya está registrado.";
            $_SESSION['message_type'] = "failure";
            header("Location: signup.php");
        }
        else
        {
            // ?Verificación de las longitudes permitidas por la base de datos
            $longitudDatos = strlen($nombre) <= 36
                && strlen($apellidos[0]) <= 22 && strlen($apellidos[1]) <= 22
                && strlen($usuario) <= 30 && strlen($email) <= 320;
            
            if ($longitudDatos)
            {
                // !Consulta para agregar los datos recibidos
                $agregarRegistro = "INSERT INTO 
                usuario(nombre, apellidoPaterno, apellidoMaterno, username, email, hash, rol_id) 
                VALUES ('$nombre', '$apellidos[0]', '$apellidos[1]', '$usuario', '$email', '$hash', 3)";

                // ?Ejecución de la consulta
                $resultado = mysqli_query($conexion, $agregarRegistro);

                // *Notificación emergente de éxito
                $_SESSION['message'] = "Se agregó su registro a la base de datos.";
                $_SESSION['message_type'] = "success";
                header("Location: signup.php");
            }
            else
            {
                // *Notificación emergente de fallo
                $_SESSION['message'] = "Sus campos son demasiado largos.";
                $_SESSION['message_type'] = "failure";
                header("Location: signup.php");
            }
        }
    }
    else
    {
        // *Notificación emergente de fallo
        $_SESSION['message'] = "Faltan campos por rellenar";
        $_SESSION['message_type'] = "failure";   
        header("Location: signup.php");
    }
?>
