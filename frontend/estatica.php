<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Estatica</title>
<link rel="stylesheet" href="css/estatica.css">
</head>
<body>
<header>
    <img src="img/logoPe.jpg" alt="logotipo" width="100" id="logo">
    <h1>Bienvenido a <br>Puntos Estilo</h1>
    <p>Un sistema de fidelización basado en puntos <br>que motiva y reconoce a los empleados.</p>
    <div>
        <?php if ($_SESSION['role'] === 'admin'): ?>
            <button onclick="toggleForm('admin.php')">Administración</button>
        <?php endif; ?>
        <button onclick="toggleForm('perfil.php')">Perfil</button>
        <button onclick="toggleForm('tienda.php')">Tienda</button>
        <button onclick="toggleForm('contacto.php')">Contáctenos</button>
    </div>
</header>

<div class="grupo_personas">
    <div class="contenido">
        <h2>Bienvenido a Puntos Estilo</h2>
        <p id="frase">Un sistema de fidelización basado en puntos que motiva y reconoce a los empleados.</p>
    </div>
    <div>
        <img class="imagen" src="img/Imagen1.png" alt="grupo personas" width="250">
    </div>
    <div>
        <h2>Funcionalidades Clave</h2>
        <ol class="textos">
            <li><strong>Autenticación Segura</strong></li>
            <p>Acceso con OTP o método de autenticación seguro.</p>
            <li><strong>Acumulación de Puntos</strong></li>
            <p>Cada usuario puede ver sus puntos acumulados, canjeados y por vencer.</p>
            <li><strong>Ayuda con Bonos</strong></li>
            <p>Poder obtener ayuda sobre bonos no entregados.</p>
        </ol>
        </div>
    <div>
        <img class="imagen" src="img/Imagen2.png" alt="grupo personas" width="250">
    </div>
</div>

<script>
function toggleForm(url) {
    // Redireccionar a la URL especificada
    window.location.href = url;
}
</script>
</body>
</html>
