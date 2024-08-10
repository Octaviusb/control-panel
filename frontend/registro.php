<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="css/registro.css">
</head>
<body>
    <header>
        <img src="img/logoPe.jpg" alt="logotipo" width="100" id="logo">
        <h1>Bienvenido a <br>Puntos Estilo</h1>
        <div id="parrafo">
            <p>Un sistema de fidelización basado en puntos <br>que motiva y reconoce a los empleados.</p>
        </div>
    </header>
    <div class="container">
        <form method="POST" action="../backend/registro.handler.php">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            
            <div class="form-group">
                <label for="correo">Correo electrónico:</label>
                <input type="email" id="correo" name="correo" required>
            </div>
            
            <div class="form-group">
                <label for="contraseña">Contraseña:</label>
                <input type="password" id="contraseña" name="contraseña" required>
            </div>
            
            <div class="form-group">
                <label for="rol">Rol:</label>
                <select id="rol" name="rol">
                    <option value="usuario">Usuario</option>
                    <option value="admin">Administrador</option>
                </select>
            </div>
            
            <button type="submit">Registrarse</button>
        </form>
    </div>

    <footer class="footer">
        <h2>Información de Contacto</h2>
        <ol>
            <li>Dirección: Calle Falsa 123</li>
            <li>Teléfono: 555-555-555</li>
            <li>Email: contacto@example.com</li>
        </ol>
    </footer>
</body>
</html>
