<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canjear Puntos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <!-- Encabezado de la página -->
</header>

<!-- Formulario para canjear puntos -->
<form method="POST" action="redeem.php">
    <label for="beneficio_id">Seleccione el beneficio:</label>
    <select id="beneficio_id" name="beneficio_id">
        <!-- Opciones del select con los beneficios disponibles -->
        <option value="1">Beneficio 1</option>
        <option value="2">Beneficio 2</option>
        <!-- Agrega más opciones según sea necesario -->
    </select>
    <button type="submit">Canjear Puntos</button>
</form>

</body>
</html>
