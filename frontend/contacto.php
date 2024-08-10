<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contacto</title>
  <link rel="stylesheet" href="contacto.css">
</head>
<body>
  <header>
    <img src="img/logoPe.jpg" alt="logotipo" width="100" id="logo">
    <h1>Bienvenido a <br>Puntos Estilo</h1>
    <div id="parrafo">
        <p>Un sistema de fidelización basado en puntos <br>que motiva y reconoce a los empleados.</p>
    </div>
    <button id="botonInicio" onclick="toggleForms()">Ingreso</button>
</header>
  
    <!--<div class="menu logo-nav">
      <a href="index.html" class="logo">Puntos Estilo</a>
      <label class="menu-icon"><span class="fas fa-bars icomin"></span></label>
      <nav class="navigation">
        <ul>
          <li><a href="nosotros.html">Nosotros</a></li>
          <li><a href="productos.html">Productos</a></li>
          <li><a href="contacto.html">Contacto</a></li>
          <li class="search-icon">
            <input type="search" placeholder="Search">
            <label class="icon">
              <span class="fas fa-search"></span>
            </label> 
          </li>-->
        </ul>
      </nav>
    </div>
  
  
  <div class="container-contacto">
    <form action="#" id="form" method="POST">
      <h2>CONTACTO</h2>
      <br>
      <input type="text" name="cliente" id="nombre" placeholder="Ingrese su Nombre" onkeypress="return sololetras(event)" onpaste="return false" required>
      <input type="text" name="correo" id="correo" placeholder="Ingrese su Correo" required>
      <input type="text" name="celular" id="celular" placeholder="Ingrese su Celular" onkeypress="return solonumeros(event)" onpaste="return false" required>
      <textarea name="mensaje" placeholder="Escriba su Mensaje" required></textarea>
      <input type="submit" id="button-contacto" value="ENVIAR" class="button" onclick="validarCorreo(form.correo.value)">
    </form>
  </div>

  <footer>
        <h2>Información de Contacto</h2>
        <ol>
            <li>Dirección: Calle Falsa 123</li>
            <li>Teléfono: 555-555-555</li>
            <li>Email: contacto@example.com</li>
        </ol>
        <button><a href="index.php">Volver al Login</a></button>
    </footer>

  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script  src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="https://cdn.jsdelivr.net/npm/emailjs-com@2/dist/email.min.js"></script>
  <script  src="js/scripts.js"></script>
  <script  src="js/contacto.js"></script>
</body>
</html>
