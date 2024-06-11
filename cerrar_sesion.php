<?php
// Liberar todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

// Eliminar las cookies de sesión, si las hay
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Redirigir al usuario a la página de inicio de sesión o a otra página
header("Location: login.php");
exit();
?>
