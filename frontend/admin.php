<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración</title>
    <link rel="stylesheet" href="/css/admin.css">
    
</head>
<body>
<header>
    <img src="img/logoPe.jpg" alt="logotipo" width="100" id="logo">
    <h1>Bienvenido a <br>Puntos Estilo</h1>
    <p>Un sistema de fidelización basado en puntos <br>que motiva y reconoce a los empleados.</p>
    <div>
        <button onclick="window.location.href='perfil.php'">Perfil</button>
        <button onclick="window.location.href='tienda.php'">Tienda</button>
        <button onclick="window.location.href='contacto.php'">Contáctenos</button>
    </div>
</header>
<div class="admin-container">
    <h1>Panel de Administración</h1>
    <?php
    if (isset($successMessage)) {
        echo "<div class='success-message'>$successMessage</div>";
    } elseif (isset($errorMessage)) {
        echo "<div class='error-message'>$errorMessage</div>";
    }
    ?>
    <div class="admin-section">
        <h2>Asignar Puntos</h2>
        <form method="post" action="admin.php">
            <label for="user-id">ID de Usuario:</label>
            <input type="text" id="user-id" name="user_id" required>
            <label for="points">Puntos a Asignar:</label>
            <input type="number" id="points" name="points" required>
            <button type="submit" name="assign_points">Asignar</button>
        </form>
    </div>
    <div class="admin-section">
        <h2>Autorizar Canjes</h2>
        <form method="post" action="admin.php">
            <label for="redemption-id">ID de Canje:</label>
            <input type="text" id="redemption-id" name="redemption_id" required>
            <button type="submit" name="authorize_redemption">Autorizar</button>
        </form>
    </div>
    <div class="admin-section">
        <h2>Eliminar Puntos Vencidos</h2>
        <form method="post" action="admin.php">
            <button type="submit" name="delete_expired_points">Eliminar</button>
        </form>
    </div>
    <div class="admin-section">
        <h2>Autorizar Creación de Perfiles</h2>
        <form method="post" action="admin.php">
            <label for="profile-id">ID de Perfil:</label>
            <input type="text" id="profile-id" name="profile_id" required>
            <button type="submit" name="authorize_profile_creation">Autorizar</button>
        </form>
    </div>
</div>

<footer>
    <h2>Información de Contacto</h2>
    <ol id="footer">
        <li>Dirección: Calle Falsa 123</li>
        <li>Teléfono: 555-555-555</li>
        <li>Email: contacto@example.com</li>
    </ol>
    <button><a href="index.php">Volver al Login</a></button>
</footer>
<script src="/js/main.js"></script>
</body>
</html>
