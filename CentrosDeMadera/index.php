  <?php
  session_start();
  ?>

  <!DOCTYPE html>
  <html lang="es">
  <head>
      <meta charset="UTF-8">
      <title>Página Principal</title>
      <link rel="icon" href="imagenes/LogoClaro.jpg" type="image/x-icon">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="css/index.css">
      <style>
          @font-face {
            font-family: 'Bcorsiva';
            src: url('Monotype-Corsiva-Bold.ttf') format('truetype'); 
            font-style: normal;
          }
          .aa {
            background-image: url("imagenes/catalogo/1.JPG");
          }
          
          .bb {
            background-image: url("imagenes/catalogo/exterior.JPG");
          }
          
          .cc {
            background-image: url("imagenes/catalogo/c.JPG");
          }
          .aa, .bb, .cc {
            height: 400px;
            background-size: cover;
            background-position: center;
          }
          .la, .lb, .lc{
            font-family: 'Bcorsiva', sans-serif;
          }
          .f1-hover {
              transition: transform 0.3s ease;
            }

          .f1-hover:hover {
              transform: scale(1.15); 
          }

          .tt{
            font-family: 'Bcorsiva', sans-serif;
          }

          footer div div{
              font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif
            }

          div div div div div img{
            height:auto;
          }
          
          footer{
            background-image: url("imagenes/LogoCentros.png");
            height: 200px;
            background-size: cover;
            background-position: center;    
            
          }

      </style>
  </head>
  <nav class="container-fluid bd-gutter d-flex flex-lg-nowrap align-items-center fixed-top p-1 collapse" style="border-bottom: 1px solid black; background-color: #FFD9B4" aria-label="Main navigation">

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
        <hr class="d-md-block d-none">
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
        <hr class="d-md-block d-none">
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
    <div class="container-fluid ">
      <div id="carouselExampleAutoplaying" class="carousel slide h-10" data-bs-ride="carousel">
          <div class="carousel-inner pt-4">
            <div class="carousel-item active">
              <img src="imagenes/portada/1.JPG" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="imagenes/portada/2.JPG" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="imagenes/portada/3.JPG" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="imagenes/portada/4.JPG" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="imagenes/portada/5.JPG" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="imagenes/portada/6.JPG" class="d-block w-100" alt="...">
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
    <div class="d-flex container-fluid bloque1 align-items-center">
      <div class="marquesina text-center">
      <button class="fs-1 vercatalogo">Ver Catálogo</button><br>
              <div class="marquesina-contenido">
                  <a href="portfolio/catalog.php" ><img src="imagenes/catalogo/1.JPG" alt="Imagen 1" class="f1-hover" ></a>
                  <a href="portfolio/catalog.php" ><img src="imagenes/catalogo/21.JPG" alt="Imagen 2" class="f1-hover" ></a>
                  <a href="portfolio/catalog.php" ><img src="imagenes/catalogo/31.JPG" alt="Imagen 3" class="f1-hover" ></a>
                  <a href="portfolio/catalog.php" ><img src="imagenes/catalogo/41.JPG" alt="Imagen 4" class="f1-hover" ></a>
                  <a href="portfolio/catalog.php" ><img src="imagenes/catalogo/51.JPG" alt="Imagen 5" class="f1-hover" ></a>
                  <a href="portfolio/catalog.php" ><img src="imagenes/catalogo/61.JPG" alt="Imagen 6" class="f1-hover" ></a>
                  <a href="portfolio/catalog.php" ><img src="imagenes/catalogo/71.JPG" alt="Imagen 1" class="f1-hover" ></a>
                  <a href="portfolio/catalog.php" ><img src="imagenes/catalogo/81.JPG" alt="Imagen 2" class="f1-hover" ></a>
                  <a href="portfolio/catalog.php" ><img src="imagenes/catalogo/91.JPG" alt="Imagen 3" class="f1-hover" ></a>
                  <a href="portfolio/catalog.php" ><img src="imagenes/catalogo/101.JPG" alt="Imagen 1" class="f1-hover" ></a>
                  <a href="portfolio/catalog.php" ><img src="imagenes/catalogo/111.JPG" alt="Imagen 2" class="f1-hover" ></a>
                  <a href="portfolio/catalog.php" ><img src="imagenes/catalogo/121.JPG" alt="Imagen 3" class="f1-hover" ></a>
                  <a href="portfolio/catalog.php" ><img src="imagenes/catalogo/131.JPG" alt="Imagen 1" class="f1-hover" ></a>
                  <a href="portfolio/catalog.php" ><img src="imagenes/catalogo/141.JPG" alt="Imagen 2" class="f1-hover" ></a>
                  <a href="portfolio/catalog.php" ><img src="imagenes/catalogo/151.JPG" alt="Imagen 4" class="f1-hover" ></a>
                  <a href="portfolio/catalog.php" ><img src="imagenes/catalogo/161.JPG" alt="Imagen 5" class="f1-hover" ></a>

                </div>

              </div>
          
      </div>
    </div>
    <div class="parte2 d-flex container-fluid gap-3  align-items-center pt-3" style="background-color:#181A1B">
        <div class="col-sm-12 col-md-6">
          <h2 class="text-light text-center">Decoración artesanal con historia</h2>
          <p class="text-light me-sm-5 ms-sm-5 text-center">En Cosinas de Madera, Cristina crea desde su casa cerca de Avilés piezas únicas de madera para decorar tu hogar. Cada artículo está hecho a mano, con cariño, detalle e imaginación.</p>
          <div class="card mb-2 bg-transparent border-0">
            <img src="imagenes/casa.jpeg" 
                class="f1-hover img-fluid rounded border border-white border-2 mx-auto d-block mt-3 mb-5"
                alt="Centro de madera" 
                  style="height: 280px; width: auto; max-width: 90%; margin-top: 10px;">
          </div>
        </div>
        <div class="col-sm-12 col-md-6">
          <h2 class="text-light text-center">Decoración artesanal con historia</h2>
          <p class="text-light me-sm-5 ms-sm-5 text-center">En Cosinas de Madera, Cristina crea desde su casa cerca de Avilés piezas únicas de madera para decorar tu hogar. Cada artículo está hecho a mano, con cariño, detalle e imaginación.</p>
          <div class="card mb-2 bg-transparent border-0">
            <img src="imagenes/madera1.JPG" 
                class="f1-hover img-fluid rounded border border-white border-2 mx-auto d-block mt-3 mb-5"
                alt="Centro de madera" 
                style="height: 280px; width: auto; max-width: 90%; margin-top: 10px;">
          </div>
        </div>
      </div>


  <div class="d-flex container-fluid align-items-center p3">
      <div class="col-4 aa">
        <h2 class="text-dark la text-center mt-3">CENTROS</h2>
      </div>
      <div class="col-4 bb">
        <h2 class="text-light lb text-center mt-3">EXTERIOR</h2>
      </div>
      <div class="col-4 cc">
        <h2 class="text-dark lc text-center mt-3">LETRAS</h2>
      </div>
  </div>
   
    <footer class="d-flex gap-2 text-center text-light p-5">
        <div class="col-sm-12 align-content-center text-align-center col-md-6">
          <div class="tt fs-1 ms-4 mx-auto">Redes Sociales</div>
          <div class="gap-2 d-flex mx-auto fs-5">
          <a class="nav-link py-2 px-0 px-lg-2 mx-auto" href="https://www.instagram.com/cosinasdemadera" target="_blank" rel="noopener">
              <span class="fab fa-instagram"></span> Instagram
            </a>
            <a class="nav-link py-2 px-0 px-lg-2 mx-auto" href="https://es.wallapop.com/user/maderaconencanto-458965972/info" target="_blank" rel="noopener">
                <i class="fa-solid fa-store"></i> Wallapop
              </a>
              <a class="nav-link py-2 px-0 px-lg-2 mx-auto" href="https://www.vinted.es/member/238052951-maderaconencanto1622" target="_blank" rel="noopener">
                <i class="fa-solid fa-shirt"></i> Vinted
              </a>
            </div>
          </div>
        <div class="col-sm-12 align-content-center text-align-center col-md-6">
        <div class="tt fs-1 ms-4 mx-auto">¿Donde estamos?</div>
        <div class="gap-2 d-flex">
            <div class="text-center mx-auto fs-5">
                <i class="fas fa-map-marker-alt"></i> Molleda, Corvera de Asturias, Asturias, España
            </div>
          </div>
        </div>

    </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>

          

  </html>
