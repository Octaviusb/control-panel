<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Puntos Estilo</title>
    <link href="tienda.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <header>
    <img src="img/logoPe.jpg" alt="logotipo" width="100" id="logo">
    <h1>Bienvenido a <br>Puntos Estilo</h1>
    <div id="parrafo">
        <p>Un sistema de fidelización basado en puntos <br>que motiva y reconoce a los empleados.</p>
    <!--</div>
      <div class="menu logo-nav">
        <a href="index.html" class="logo">Tienda</a>
        <label class="menu-icon"><span class="fas fa-bars icomin"></span></label>
        <nav class="navigation">
          <ul>
            <li><a href="dashboard.php">Inicio</a></li>
            <li><a href="productos.html">Productos</a></li>
            <li class="search-icon">
              <input type="search" placeholder="Search">
              <label class="icon">
                <span class="fas fa-search"></span>
              </label>
            </li>
            <li class="car"><a href="carrito.html" >
              <svg class="bi bi-cart3" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
              </svg></a>
            </li>
          </ul>
        </nav>
      </div>-->
    </header>

<div class="slider">
  <ul>
    <li><img src="img/slide1.avif" alt="imagen supermercado"></li>
    <li><img src="img/slide2.jpeg" alt="imagen supermercado"></li>
    <li><img src="img/slide3.jpg" alt="imagen supermercado"></li>
  </ul>
</div>


  <div class="container-index">

    <div class="container-circulos">
      <div class="container-imagen">
        <img src="assets/img/Abarrotes-comestibles.jpg" class="circulo">
        <h2>Mercado</h2>
      </div>
      <div class="container-imagen">
        <img src="assets/img/ropa.webp" class="circulo">
        <h2>Ropa y Enseres</h2>
      </div>
      <div class="container-imagen">
        <img src="assets/img/boletas.jpg" class="circulo">
        <h2>boletas</h2>
      </div>
      <div class="container-imagen">
        <img src="assets/img/safaris.jpg" class="circulo">
        <h2>Recreacion</h2>
      </div>
      <div class="container-imagen">
        <img src="assets/img/viajes.jpg" class="circulo">
        <h2>Viajes</h2>
      </div>
      <div class="container-imagen">
        <img src="assets/img/compu.jpg" class="circulo">
        <h2>Electrodomesticos</h2>
      </div>
    </div>

    <div class="ver-todo"><a class="button" href="productos.html">Ver todos</a></div>
    
    <div class="contenedor-columna">
      <div class="columna1">
        <h2>SOBRE TIENDA PUNTOS ESTILO </h2>
        <p>En TIENDA PUNTOS ESTILO nuestro equipo trabaja constantemente con energía y entusiasmo para nuestros clientes y sus familias. Nos encanta lo que hacemos y eso se refleja no solo en nuestros servicios, sino también en la forma en que construimos relaciones con nuestros clientes.</p>
      </div>
      <div class="columna2">
        <img src="assets/img/index.png">
      </div>
    </div>

  </div>


  <footer class="footer-section">
    <div class="copyright-area">
        <div class="container-footer">
            <div class="row-footer">
                <div class="col-xl-6 col-lg-6 text-center text-lg-left">
                    <div class="copyright-text">
                        <p>Copyright &copy; 2020, todos los derechos reservados <a href="index.html">TIENDA PUNTOS ESTILO</a></p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 d-none d-lg-block text-right">
                    <div class="footer-menu">
                        <ul>
                          <li><a href="../index.html">Inicio</a></li>
                          <li><a href="productos.html">Productos</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </footer>   


    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script  src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script  src="assets/js/scripts.js"></script>
</body>
</html>

