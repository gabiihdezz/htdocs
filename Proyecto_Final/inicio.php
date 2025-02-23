<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Página Principal</title>
    <link rel="icon" href="util/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>

    /* Tabla personalizada */
    .table-custom {
        background-color: #f8f9fa; 
        border-collapse: collapse;
        width: 100%;
        max-width: 100%; /* Evita que se desborde fuera de los límites */
        table-layout: fixed; /* Ajusta el tamaño de las celdas automáticamente */
        margin: 0 auto; /* Centra la tabla */
    }

    /* Estilo para los encabezados */
    .table-custom thead {
        background-color: #0056b3; /* Azul oscuro */
        color: white;
    }

    /* Encabezados secundarios (Desayuno/Comida/Cena) */
    .table-custom thead tr:nth-child(2) {
        background-color: #003f7f; /* Azul más oscuro para diferenciar */
    }

    /* Tercer encabezado con las columnas de día, glucosa, etc. */
    .table-custom thead tr:nth-child(3) {
        background-color: #343a40; /* Gris oscuro */
        color: white;
    }

    /* Filas alternas */
    .table-custom tbody tr:nth-child(odd) {
        background-color: #fdf3e7; /* Beige claro para filas impares */
    }

    /* Bordes */
    .table-custom th, .table-custom td {
        border: 1px solid #ced4da; /* Gris medio */
        padding: 8px;
    }

    /* Hover sobre filas */
    .table-custom tbody tr:hover {
        background-color: #e2e6ea; /* Gris claro en hover */
    }

    /* Evita que las celdas se desborden */
    .table-custom th, .table-custom td {
        word-wrap: break-word;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 200px;
    }

    /* Estilo para los títulos de las celdas */
    .table-custom th {
        text-align: center;
    }

    /* Estilo para las celdas de datos */
    .table-custom td {
        text-align: center;
    }

        *{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        .fondo{
            background-image: url("../util/fondo.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            height: 100%; 
        }
        html, body {
            margin: 0;
            padding: 0;
        }

        *, *::before, *::after {
            box-sizing: border-box;
        }

        .navbar-nav .nav-link:hover {
            color: white !important; 
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <header class="navbar navbar-expand-lg bd-navbar fixed-top bg-info">
                <nav class="container-xxl bd-gutter flex-wrap flex-lg-nowrap" aria-label="Main navigation">
                    <a class="navbar-brand p-0 me-0 me-lg-2" href="inicio.php" aria-label="Bootstrap">
                        <img src="util/cora.png " alt="Logo a modo de simulación" width="50px">
                    </a>
                    <div class="offcanvas-lg offcanvas-end flex-grow-1 fs-5" tabindex="-1" >
                        <div class="offcanvas-body p-4 pt-0 p-lg-0">
                            <hr class="d-lg-none text-white-50">
                            <ul class="navbar-nav flex-row flex-wrap bd-navbar-nav">
                                <li class="nav-item col-6 col-lg-auto">
                                    <a class="nav-link py-2 px-0 px-lg-2" href="inicio.php" aria-current="true">Inicio</a>
                                </li>
                                <li class="nav-item col-6 col-lg-auto">
                                    <?php
                                        if (isset($_SESSION['id_usu']) && isset($_SESSION['nombre_usuario'])) {
                                            echo"<a class=\"nav-link py-2 px-0 px-lg-2\" href=\"portfolio/menu.php\" aria-current=\"true\">";}
                                        else{
                                            echo"<a class=\"nav-link py-2 px-0 px-lg-2\" href=\"portfolio/login.php\" class=\"text-decoration-none\">";}
                                        ?>Menu</a>
                                </li>
                                </li>
                            </ul>
                            <ul class="navbar-nav flex-row flex-wrap ms-md-auto gap-3 align-content-center">
                                <li class="nav-item col-6 col-lg-auto ">
                                    <a class="nav-link py-2 px-0 px-lg-2" hr    ef="portfolio/login.php">Iniciar Sesión</a>
                                </li>
                                <li class="nav-item col-6 col-lg-auto">
                                    <a class="nav-link py-2 px-0 px-lg-2" href="portfolio/signup.php">Registrarse</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
        </div>
        <div class="row pt-4 mt-5">
            <div class="col-12 text-justify">
                <?php
                
                if (isset($_SESSION['id_usu']) && isset($_SESSION['nombre_usuario'])) {
                    $usuario = $_SESSION['nombre_usuario'];
                    echo "<div class=\"fs-2 text-center mt-5\">Bienvenido/a, $usuario</div>";
                } else {
                    echo "<div class=\"fs-2 text-center mt-5\">Inicia sesión para disfrutar del servicio de nuestra tabla</div>";
                }
                
                ?>
                 
        <div class="container mt-5">
    <div class="row align-items-center">

        <div class="col-6">
            <div class="fs-1">¿Qué es la diabetes?</div>
                <div class=" mt-3">
                    <p>La <strong>diabetes</strong> es una enfermedad crónica que ocurre cuando el cuerpo no puede producir suficiente insulina o no puede usarla de manera efectiva. La insulina es una hormona crucial producida por el páncreas que permite que las células del cuerpo utilicen la glucosa (azúcar) como fuente de energía. Sin suficiente insulina o si el cuerpo no responde a ella de manera adecuada, los niveles de glucosa en la sangre pueden aumentar, lo que con el tiempo puede llevar a complicaciones graves.</p>
                </div>
                <div class=" mt-3">
                    <p>Existen varios tipos de diabetes, pero los más comunes son:</p>
                    <ul>
                        <li><strong>Diabetes tipo 1:</strong> El cuerpo no produce insulina, lo que significa que los pacientes deben administrar insulina a lo largo de su vida.</li>
                        <li><strong>Diabetes tipo 2:</strong> Es más común y ocurre cuando el cuerpo no usa la insulina correctamente (resistencia a la insulina) o no produce suficiente cantidad.</li>
                        <li><strong>Diabetes gestacional:</strong> Se desarrolla durante el embarazo y generalmente desaparece después del parto, pero puede aumentar el riesgo de desarrollar diabetes tipo 2 en el futuro.</li>
                    </ul>
                </div>
                <div class=" mt-3">
                    <p>Los síntomas de la diabetes pueden incluir sed excesiva, aumento de la micción, fatiga, visión borrosa y pérdida de peso inexplicada. Si no se controla, la diabetes puede provocar complicaciones serias como enfermedades íacas, daño renal, ceguera y problemas circulatorios.</p>
                </div>
                <div class="mt-3">
                    <h3>¿Cuándo ocurre la hipoglucemia e hiperglucemia?</h3>
                    <p><strong>Hipoglucemia:</strong> Se produce cuando los niveles de glucosa en la sangre son demasiado bajos (generalmente por debajo de 70 mg/dl). Puede causar sudoración, temblores, confusión, mareo y en casos graves, pérdida del conocimiento.</p>
                    <p><strong>Hiperglucemia:</strong> Ocurre cuando los niveles de glucosa en la sangre son demasiado altos. Puede provocar sed excesiva, visión borrosa, fatiga y necesidad frecuente de orinar. Si no se trata, puede derivar en complicaciones graves.</p>
                </div>

                <div class="mt-3 border rounded-3">
                    <img src="util/diabetes.webp" class="img-fluid" alt="Imagen sobre combatir la diabetes">
                </div>
        </div>
        <div class="col-6 align-self-start">
            <?php
                if (isset($_SESSION['id_usu']) && isset($_SESSION['nombre_usuario'])) {
                    echo"<a href=\"portfolio/menu.php\" class=\"text-decoration-none\">";}
                    else{
                    echo"<a href=\"portfolio/login.php\" class=\"text-decoration-none\">";}
                    
                    ?>
            <div class="fs-3 text-primary">📊 Accede al Registro y Control de Insulina</div>
                <div class="card text-center">
                    <table class="table-custom">
                        <thead>
                            <tr>
                                <th rowspan="2"></th> <!-- Espacio vacío -->
                                <th colspan="9">Desayuno | Comida | Cena</th>
                            </tr>
                            <tr>
                                <th colspan="4"></th>
                                <th colspan="2">HIPO</th>
                                <th colspan="3">HIPER</th>
                            </tr>
                            <tr>
                                <th>Día</th>
                                <th>GL/1H.</th>
                                <th>RAC.</th>
                                <th>INSU.</th>
                                <th>GL/2H.</th>
                                <th>GLU.</th>
                                <th>HORA</th>
                                <th>GLU.</th>
                                <th>HORA</th>
                                <th>CORR.</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Día 1</td>
                                <td>95 mg/dL</td> 
                                <td>Pan integral + café</td> 
                                <td>4U</td> 
                                <td>130 mg/dL</td>
                                <td>70 mg/dL</td> 
                                <td>11:00</td> 
                                <td>180 mg/dL</td>
                                <td>13:30</td>
                                <td>2U</td> 
                            </tr>
                            <tr>
                                <td>Día 2</td>
                                <td>100 mg/dL</td>
                                <td>Arroz con pollo</td>
                                <td>6U</td>
                                <td>140 mg/dL</td>
                                <td>65 mg/dL</td>
                                <td>15:30</td>
                                <td>200 mg/dL</td>
                                <td>17:00</td>
                                <td>3U</td>
                            </tr>
                            <tr>
                                <td>Día 3</td>
                                <td>85 mg/dL</td>
                                <td>Yogur con fruta</td>
                                <td>3U</td>
                                <td>120 mg/dL</td>
                                <td>75 mg/dL</td>
                                <td>09:45</td>
                                <td>160 mg/dL</td>
                                <td>12:00</td>
                                <td>1U</td>
                            </tr>
                        </tbody>
                    </table>    
                    <div class="card-body">
                        <div class="fs-4 card-title">📌 Registra y controla tu insulina</div>
                        <p class="card-text">
                            Guarda y gestiona tu administración diaria de insulina de manera sencilla.  
                            📅 Registra cada dosis, modifica valores cuando lo necesites y elimina registros obsoletos.  
                            📊 Explora estadísticas interactivas sobre tu evolución con gráficos claros y visuales.  
                            <hr>  
                            ¡Haz clic y empieza a gestionar tu tratamiento de forma eficiente!
                        </p>
                    </div>
                </div>
            </a>
        </div>
            <div class="col-11 justify-content-end mt-3">
                <div class="fs-1">¿Cómo combatir la diabetes?</div>
                        <div class="mt-3">
                            <p>Combatir la diabetes, especialmente la tipo 2, requiere un enfoque integral y un compromiso constante con el control del azúcar en sangre. Aunque no existe una "cura" definitiva para la diabetes, se pueden tomar varias medidas para gestionarla de manera efectiva y llevar una vida saludable:</p>
                        </div>
                        <div class="mt-3">
                            <h4>1. Mantener una alimentación balanceada</h4>
                            <p>Es fundamental seguir una dieta rica en frutas, verduras, proteínas magras y granos integrales. Limitar el consumo de azúcares refinados y carbohidratos simples. Controlar las porciones y comer a intervalos regulares para mantener los niveles de glucosa en sangre estables.</p>
                        </div>
                        <div class="mt-3">
                            <h4>2. Ejercicio regular</h4>
                            <p>La actividad física mejora la sensibilidad del cuerpo a la insulina y ayuda a controlar el peso. Se recomienda realizar al menos 150 minutos de actividad física moderada por semana, como caminar, nadar o montar en bicicleta.</p>
                        </div>
                        <div class="mt-3">
                            <h4>3. Monitoreo constante de los niveles de glucosa</h4>
                            <p>Los pacientes con diabetes deben controlar sus niveles de glucosa en sangre regularmente para asegurarse de que estén dentro de los rangos saludables. Utilizar dispositivos como glucómetros o sensores continuos de glucosa puede ser de gran ayuda.</p>
                        </div>
                        <div class="mt-3">
                            <h4>4. Medicamentos e insulina</h4>
                            <p>Para algunos pacientes con diabetes tipo 2, los medicamentos orales o inyectables pueden ser necesarios para controlar los niveles de glucosa. Las personas con diabetes tipo 1 siempre necesitarán insulina, ya que su cuerpo no la produce.</p>
                        </div>
                        <div class="mt-3">
                            <h4>5. Reducción del estrés</h4>
                            <p>El estrés crónico puede afectar los niveles de glucosa en sangre, por lo que las técnicas de manejo del estrés como la meditación, el yoga o el simple descanso son muy útiles.</p>
                        </div>
                        <div class="mt-3">
                            <h4>6. Visitas regulares al médico</h4>
                            <p>El control regular con el médico es esencial para ajustar el tratamiento según sea necesario y para detectar complicaciones a tiempo.</p>
                        </div>
            <div class="mb-3 border rounded-3">
                <img src="util/diabetes1.png"  alt="Imagen sobre combatir la diabetes">
            </div>

            </div>
        </div>
        </div>

</body>
</html>