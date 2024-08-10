<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <header>
        <img src="../frontend/img/logoPe.jpg" alt="logotipo" width="100" id="logo">
        <h1>Bienvenido a <br>Puntos Estilo</h1>
        <div id="parrafo">
            <p>Un sistema de fidelización basado en puntos <br>que motiva y reconoce a los empleados.</p>
        </div>
    </header>
    
    <section>
        <h2>Iniciar Sesión</h2>
        <?php if (!empty($error)): ?>
            <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <form method="POST" action="/backend/login_handler.php">
            <label for="login-email">Correo electrónico:</label>
            <input type="email" id="login-email" name="login-email" required><br>
            
            <label for="login-password">Contraseña:</label>
            <input type="password" id="login-password" name="login-password" required><br>
            
            <label for="otp">
                <input type="checkbox" id="otp" name="otp"> OTP
            </label><br>
            
            <button type="submit">Iniciar sesión</button>
            
            <p>¿No tienes una cuenta? <a href="registro.php">Regístrate aquí</a></p>
        </form>
    </section>

    <footer>
        <h2>Información de Contacto</h2>
        <ol>
            <li>Dirección: Calle Falsa 123</li>
            <li>Teléfono: 555-555-555</li>
            <li>Email: contacto&#64;example.com</li>
        </ol>
        <button><a href="index.php">Volver al Login</a></button>
    </footer>
</body>
</html>
