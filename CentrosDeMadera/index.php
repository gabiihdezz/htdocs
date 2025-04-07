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
<nav class="container-fluid bd-gutter d-flex flex-lg-nowrap align-items-center fixed-top p-1 collapse" style="background-color: #FFD9B4;" aria-label="Main navigation">

    <img style="height:100px" class="ms-4 me-4" src="imagenes/logoCentros.png" alt="Logo de Boombastic">
      <button class="navbar-toggler d-flex d-lg-none order-3 p-2  ms-auto" type="button" data-bs-toggle="offcanvas" data-bs-target="#bdNavbar" aria-controls="bdNavbar" aria-label="Toggle navigation">
              <img style="width:24px;height: auto;" src="imagenes/td.png" alt="Foto Producto 1"/>
      </button>

  <div class="offcanvas-lg offcanvas-end flex-grow-1" style="background-color: #FFD9B4;" tabindex="-1" id="bdNavbar"  data-bs-scroll="true" aria-modal="true" role="dialog">


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
        <li class="nav-item-dropdown col-12 fs-5 col-lg-auto">
            <a class="nav-link dropdown-toggle py-2 px-0 px-lg-2" style="color: #3D2012;" role="button" 
              data-bs-toggle="dropdown" aria-expanded="false" href="portfolio/catalogo.html">Catálogo</a>
          <ul class="dropdown-menu" style="background-color:#FFD9B4">
            <li><a class="dropdown-item" href="#">Centros</a></li>
            <li><a class="dropdown-item" href="#">Exterior</a></li>
            <li><a class="dropdown-item" href="#">Letras</a></li>
            <li><a class="dropdown-item" href="#">Troncos</a></li>
            <li><a class="dropdown-item" href="#">Bandejas</a></li>
          </ul>
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
          <a class="nav-link py-2 px-0 px-lg-2" href="https://www.instagram.com/cosinasdemadera" target="_blank" rel="noopener">
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
  </div>
</nav>
<div class="row justify-content-center">  
  <div class="container-fluid mt-3">
    <div id="carouselExampleAutoplaying" class="carousel slide w-100" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="imagenes/portada/1.JPG" class="d-block img-fluid" alt="...">
            <!-- <img src="imagenes/balck.jpg" class="d-block w-100" alt="..."> -->
          </div>
          <div class="carousel-item">
            <!-- <img src="imagenes/balck.jpg" class="d-block w-100 " alt="..."> -->
          <img src="imagenes/portada/2.JPG" class="d-block img-fluid" alt="...">
          </div>
          <!-- <div class="carousel-item">
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
          </div> -->
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
  <div class="d-flex container-fluid bloque1 align-items-center">
    <div class="marquesina text-center">
    <button class="fs-1 vercatalogo text-center justify-content-center">Ver Catálogo</button><br>
            <div class="marquesina-contenido">
                <a href="portfolio/catalog.php" ><img src="imagenes/catalogo/1.JPG" alt="Imagen 1"></a>
                <a href="portfolio/catalog.php" ><img src="imagenes/catalogo/21.JPG" alt="Imagen 2"></a>
                <a href="portfolio/catalog.php" ><img src="imagenes/catalogo/31.JPG" alt="Imagen 3"></a>
                <a href="portfolio/catalog.php" ><img src="imagenes/catalogo/41.JPG" alt="Imagen 4"></a>
                <a href="portfolio/catalog.php" ><img src="imagenes/catalogo/51.JPG" alt="Imagen 5"></a>
                <a href="portfolio/catalog.php" ><img src="imagenes/catalogo/61.JPG" alt="Imagen 6"></a>
                <a href="portfolio/catalog.php" ><img src="imagenes/catalogo/71.JPG" alt="Imagen 1"></a>
                <a href="portfolio/catalog.php" ><img src="imagenes/catalogo/81.JPG" alt="Imagen 2"></a>
                <a href="portfolio/catalog.php" ><img src="imagenes/catalogo/91.JPG" alt="Imagen 3"></a>
                <a href="portfolio/catalog.php" ><img src="imagenes/catalogo/101.JPG" alt="Imagen 1"></a>
                <a href="portfolio/catalog.php" ><img src="imagenes/catalogo/111.JPG" alt="Imagen 2"></a>
                <a href="portfolio/catalog.php" ><img src="imagenes/catalogo/121.JPG" alt="Imagen 3"></a>
                <a href="portfolio/catalog.php" ><img src="imagenes/catalogo/131.JPG" alt="Imagen 1"></a>
                <a href="portfolio/catalog.php" ><img src="imagenes/catalogo/141.JPG" alt="Imagen 2"></a>
                <a href="portfolio/catalog.php" ><img src="imagenes/catalogo/151.JPG" alt="Imagen 4"></a>
                <a href="portfolio/catalog.php" ><img src="imagenes/catalogo/161.JPG" alt="Imagen 5"></a>

              </div>

            </div>
         
    </div>
  </div>
  <div class="d-flex container-fluid gap-3 bloque2 align-items-center pt-3">
      <div class="col-sm-12 col-md-6">
        <h2 class="text-light text-center">Texto GPT</h2>
        <p class="text-light me-sm-5 ms-sm-5 text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, odio atque. Nesciunt repellendus voluptas accusamus hic minima odit corrupti accusantium esse natus vel! Odit hic nemo est neque voluptatem ipsum.</p>
      </div>
      <div class="col-sm-12 col-md-6">
      <h2 class="text-light text-center">Texto GPT</h2>
      <p class="text-light ms-auto text-justify">Texto GPT</p>
      </div>
    </div>
  </div>

  <div class="d-flex container-fluid bloque3 align-items-center pt-3">
      <div class="col-4">
        <h2 class="text-light text-center">Texto GPT</h2>
        <p class="text-light text-center">Texto GPT</p>
      </div>
      <div class="col-4">
        <h2 class="text-light text-center">Texto GPT</h2>
        <p class="text-light text-center">Texto GPT</p>
      </div>
      <div class="col-4">
        <h2 class="text-light text-center">Texto GPT</h2>
        <p class="text-light text-center">Texto GPT</p>
      </div>
    </div>
  </div>
  <!-- <div class="d-grid gap-4">
    <div class="row mx-auto">
        <div class="col-sm-12 align-content-center text-align-center col-md-6">
        <div class="fs-3 mb-2">Redes Sociales</div>
        <div class="gap-2 d-flex ">
            <a href="https://www.instagram.com/BOOMBASTIC_FESTIVAL/" target="_blank">
                <span class="fab fa-instagram"></span> Instagram
            </a>
            <a href="https://www.tiktok.com/@boombastic_festival?lang=es" target="_blank">
                <i class="fab fa-tiktok"></i> TikTok
            </a>
            <a href="https://www.facebook.com/boombasticfestival/" target="_blank">
                <span class="fab fa-facebook"></span> Facebook
            </a>
            <a href="https://open.spotify.com/user/5e79twm662x7nswa3fp9lbncl?si=_C0lkV_2TCCXXMryjhFhrQ" target="_blank">
                <span class="fab fa-spotify"></span> Spotify
            </a>
        </div>
    </div>

 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

        

</html>
