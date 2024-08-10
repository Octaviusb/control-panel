<?php
session_start();

// Verificar si el usuario está logueado, de lo contrario redirigirlo al login
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Verificar si el OTP fue enviado por el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si la variable de sesión OTP está definida
    if (isset($_SESSION['otp_guardado'])) {
        $otp_guardado = $_SESSION['otp_guardado'];
        $otp_ingresado = $_POST['otp']; // Suponiendo que el campo del formulario se llama 'otp'
        if (verificarOTP($otp_ingresado, $otp_guardado)) {
            // Código OTP válido, continuar con el proceso de autenticación
            // Aquí puedes hacer lo que necesites, como iniciar sesión, etc.
            // Después de completar la autenticación, limpiar la variable de sesión OTP
            unset($_SESSION['otp_guardado']);
            // Redirigir al usuario a la página de perfil o a donde corresponda
            header("Location: perfil.php");
            exit();
        } else {
            // Código OTP inválido, mostrar mensaje de error o redirigir
            $error_message = "El código OTP ingresado es incorrecto. Inténtalo nuevamente.";
        }
    } else {
        // La variable de sesión OTP no está definida, manejar el error
        $error_message = "No se ha generado un código OTP para esta sesión.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Verificar OTP</title>
</head>
<body>
    <h1>Verificar OTP</h1>
    <?php if (isset($error_message)): ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php endif; ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="otp">Ingrese el código OTP:</label>
        <input type="text" id="otp" name="otp" required>
        <button type="submit">Verificar OTP</button>
    </form>
</body>
</html>
