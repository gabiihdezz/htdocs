<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Página Principal</title>
    <link rel="icon" href="imagenes/LogoClaro.jpg" type="image/x-icon">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<nav class="container-fluid bd-gutter d-flex flex-lg-nowrap align-items-center fixed-top p-1" style="background-color: #FFD9B4;" aria-label="Main navigation">

<img style="height:100px" class="ms-4 me-4" src="imagenes/logoCentros.png" alt="Logo de Boombastic">
      <button class="navbar-toggler d-flex d-lg-none order-3 p-2  ms-auto" type="button" data-bs-toggle="offcanvas" data-bs-target="#bdNavbar" aria-controls="bdNavbar" aria-label="Toggle navigation">
              <img  class="d-flex align-items-end" style="width:24px;height: auto;" src="imagenes/td.png"/>
      </button>

<div class="offcanvas-lg offcanvas-end flex-grow-1" style="background-color: #FFD9B4;" tabindex="-1" id="bdNavbar" aria-labelledby="bdNavbarOffcanvasLabel" data-bs-scroll="true" aria-modal="true" role="dialog">


<div class="offcanvas-header px-4 pb-0">
  <h1 class="text-center">Cosinas de Madera</h1>
  <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close" data-bs-target="#bdNavbar"></button>
</div>

<div class="offcanvas-body p-4 pt-0 p-lg-0">
<hr>
<ul class="navbar-nav flex-row flex-wrap bd-navbar-nav">
  <li class="nav-item col-12 fs-5 col-lg-auto">
      <a class="nav-link py-2 px-0 px-lg-2" style="color: #3D2012;" aria-current="page" href="index.php">Inicio</a>
  </li>
  <li class="nav-item col-12 fs-5 col-lg-auto">
      <a class="nav-link py-2 px-0 px-lg-2" style="color: #3D2012;" href="portfolio/anteriores.html">Catálogo</a>
  </li>
  <li class="nav-item col-12 fs-5 col-lg-auto">
      <a class="nav-link py-2 px-0 px-lg-2" style="color: #3D2012;" href="portfolio/producción.html">Producción</a>
  </li>
  <li class="nav-item col-12 fs-5 col-lg-auto">
      <a class="nav-link py-2 px-0 px-lg-2" style="color: #3D2012;" href="portfolio/nosotros.html">Sobre Nosotros</a>
  </li>
</ul>
<hr>
<ul class="navbar-nav flex-row flex-wrap ms-md-auto">
  <li class="nav-item col-12 fs-5 col-lg-auto">
    <a class="nav-link py-2 px-0 px-lg-2" href="https://www.instagram.com/centrodemadera" target="_blank" rel="noopener">
        <span class="fab fa-instagram"></span> 
        Instagram
    </a>
  </li>
  <li class="nav-item col-12 fs-5 col-lg-auto">
      <a class="nav-link py-2 px-0 px-lg-2" href="https://es.wallapop.com/user/maderaconencanto-458965972/info" target="_blank" rel="noopener">
          <i class="fa-solid fa-store"></i> Wallapop
      </a>
    </li>
  <li class="nav-item col-12 fs-5 col-lg-auto">
      <a class="nav-link py-2 px-0 px-lg-2" href="https://www.vinted.es/member/238052951-maderaconencanto1622" target="_blank" rel="noopener">
          <i class="fa-solid fa-shirt"></i> Vinted
      </a>
  </li>
</ul>
</div>


</nav>
</div>
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="imagenes/portada/1.JPG" class="d-block img-fluid" alt="...">
              </div>
              <div class="carousel-item">
              <img src="imagenes/portada/2.JPG" class="d-block img-fluid" alt="...">
              </div>
              <div class="carousel-item">
              <img src="imagenes/portada/3.JPG" class="d-block img-fluid" alt="...">
              </div>
              <div class="carousel-item">
              <img src="imagenes/portada/4.JPG" class="d-block img-fluid" alt="...">
              </div>
              <div class="carousel-item">
              <img src="imagenes/portada/5.JPG" class="d-block img-fluid" alt="...">
              </div>
              <div class="carousel-item">
              <img src="imagenes/portada/6.JPG" class="d-block img-fluid" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
</div>

<div>

</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

        

</html>
