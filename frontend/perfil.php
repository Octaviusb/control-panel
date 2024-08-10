<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Perfil</title>
    <link rel="stylesheet" href="css/perfil.css">
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
    <!--llama a las funciones-->
    <div class="container">
        <h1>Acumulación de Puntos</h1>
        <p>Total de puntos acumulados: <?php echo htmlspecialchars($total_puntos); ?></p>

        <h1>Puntos Canjeados</h1>
        <?php if (empty($redeemed_points)): ?>
            <p>No has canjeado puntos aún.</p>
        <?php else: ?>
            <ul>
                <?php foreach ($redeemed_points as $redeemed): ?>
                    <li><?php echo htmlspecialchars($redeemed['descripcion']); ?> - <?php echo htmlspecialchars($redeemed['puntos_canjeados']); ?> puntos (<?php echo htmlspecialchars($redeemed['fecha_canje']); ?>)</li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <h1>Puntos por Vencer</h1>
        <?php if (empty($expiring_points)): ?>
            <p>No tienes puntos próximos a vencer.</p>
        <?php else: ?>
            <ul>
                <?php foreach ($expiring_points as $expiring): ?>
                    <li><?php echo htmlspecialchars($expiring['puntos']); ?> puntos - Vence el <?php echo htmlspecialchars($expiring['fecha_vencimiento']); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <h1>Obtener Ayuda</h1>
        <p><?php echo htmlspecialchars($help_message); ?></p>

        <h1>Formas de Canjear Puntos</h1>
        <ul>
            <?php foreach ($redemption_methods as $method): ?>
                <li><?php echo htmlspecialchars($method); ?></li>
            <?php endforeach; ?>
        </ul>

        <h1>Catálogo de Beneficios</h1>
        <ul>
            <?php foreach ($benefits as $benefit): ?>
                <li><?php echo htmlspecialchars($benefit['nombre']); ?> - <?php echo htmlspecialchars($benefit['descripcion']); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <script src="/js/main.js"></script>
</body>
</html>