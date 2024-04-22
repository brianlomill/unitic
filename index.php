<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Favicon del sitio -->
  <link rel="icon" href="img/logo.webp" type="image/x-icon">
  <title>Semillero UNITIC</title>
  <!-- FONT FAMILY -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <!-- BOOTSTRAP ICONS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
  <!-- HOJA DE ESTILOS -->
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <!-- FONTAWESOME -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">

</head>

<body>

  <!-- header -->

  <header class="header">
    <?php
    include('templates/navbar.php');

    $url_base = "archivos/integrantes/";

    // ========== Llamado de clases ========== //
    include 'clases/Integrantes.php';
    include 'clases/Proyectos.php';
    include 'clases/Posters.php';
    // ========== fin Llamado de clases ========== //

    // ========== Instanciando las clases ========== //
    $proyectos = new Proyectos();
    // obtener los primeros 3 integrantes
    $proyectosList = $proyectos->obtenerPrimerosProyectos();
    // contar los proyectos existentes en unitic
    $conteoProyectos = $proyectos->contarProyectos();

    // Instancia de la clase Integrantes
    $integrantes = new Integrantes();
    // Obtener los primeros 3 integrantes
    $integrantesList = $integrantes->obtenerPrimerosIntegrantes();
    // contar integrantes activos
    $conteoIntegrantes = $integrantes->contarIntegrantes();

    $Productos = new Posters();
    // obtener conteo de los productos
    $conteoProductos = $Productos->contarPosters();
    // ========== fin Instanciando las clases ========== //

    // ========== Saber años de funcionamientos ========== //
    //fecha actual
    $fecha_actual = new DateTime('now');

    // Fecha de fundación
    $fecha_fundacion = new DateTime('2010-01-01');

    // Diferencia en años
    $diferencia = $fecha_actual->diff($fecha_fundacion);
    $años_en_funcionamiento = $diferencia->y;
    // ========== fin ========== //


    ?>

    <div class="header-contenido">
      <div class="header-info">
        <img src="img/unitic.webp" alt="Unitic">
        <h2>
          Ingeniería de Sistemas - ISUM - GIRARDOT
        </h2>
        <section class="layout">
          <div class="grow">
            <a href="public/ponencias.php"><i class="bi bi-soundwave"></i></a>
            <p>Ponencias</p>
          </div>
          <div class="grow">
            <a href="public/monografias.php"><i class="bi bi-file-text"></i></a>
            <p>Monografias</p>
          </div>
          <div class="grow">
            <a href="public/posters.php"><i class="bi bi-file-earmark-image"></i></i></a>
            <p>Poster</p>
          </div>
          <div class="grow">
            <a href="#"><i class="bi bi-file-earmark-medical"></i></a>
            <p>Certificados</p>
          </div>
        </section>
      </div>
    </div>
  </header> <!-- Fin seccion header -->

  <!-- Seccion barra de proyectos -->

  <div class="container-fluid py-5 bg-success p-2 text-dark bg-opacity-75">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="d-flex">
            <h1 class="me-3 text-primary counter-value"><?php echo $conteoIntegrantes; ?></h1>
            <h6 class="text-white mt-1">Estudiantes activos</h6>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="d-flex">
            <h1 class="me-3 text-primary counter-value"><?php echo $conteoProyectos; ?></h1>
            <h6 class="text-white mt-1">Total de proyectos </h6>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="d-flex">
            <h1 class="me-3 text-primary counter-value"><?php echo $conteoProductos; ?></h1>
            <h6 class="text-white mt-1">Total de productos</h6>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="d-flex">
            <h1 class="me-3 text-primary counter-value"><?php echo $años_en_funcionamiento; ?></h1>
            <h6 class="text-white mt-1">Años en funcionamiento</h6>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- Fin seccion barra de proyectos -->

  <!-- Sección: sobre nosotros  -->

  <div class="container-fluid about py-5">
    <section id="nosotros">
      <div class="container pt-5">
        <div class="row g-5">
          <div class="col-lg-7 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".5s">
            <h5>Acerca de Nosotros</h5>
            <h1>UNITIC - Un Espacio Para La Innovación</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed efficitur quis purus ut interdum. Pellentesque aliquam dolor eget urna ultricies tincidunt. Nam volutpat libero sit amet leo cursus, ac viverra eros tristique. Morbi quis quam mi. Cras vel gravida eros. Proin scelerisque quam nec elementum viverra. Suspendisse viverra hendrerit diam in tempus. Etiam gravida justo nec erat vestibulum, et malesuada augue laoreet.</p>
            <p class="mb-4">Pellentesque aliquam dolor eget urna ultricies tincidunt. Nam volutpat libero sit amet leo cursus, ac viverra eros tristique. Morbi quis quam mi. Cras vel gravida eros. Proin scelerisque quam nec elementum viverra. Suspendisse viverra hendrerit diam in tempus.</p>
            <a href="" class="btn btn-success rounded-pill">Más Detalles</a>
          </div>
          <div class="col-lg-5 col-md-6 col-sm-12">
            <div class="h-100 position-relative">
              <img src="img/about-1.jpg" class="img-fluid w-75 rounded" alt="" style="margin-bottom: 25%;">
              <div class="position-absolute w-75" style="top: 25%; left: 25%;">
                <img src="img/about-2.jpg" class="img-fluid w-100 rounded" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div> <!-- Fin seccion Nosotros -->

  <!-- Sección: proyectos -->

  <div class="container-fluid proyects py-5 mb-5">
    <section id="proyectos">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="intro">
              <h5>Explora Nuestros Logros</h5>
              <h1>Proyectos Destacados</h1>
              <p class="mx-auto">Sumérgete en la creatividad y la innovación que impulsa nuestros proyectos destacados.</p>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <?php foreach ($proyectosList as $proyecto) : ?>
            <div class="col-lg-6 col-xl-3 col-12 col-sm-12 sombras">
              <div class="proyect position-relative bg-light rounded">
                <img src="archivos/proyectos/img_archivos/<?php echo $proyecto['imagen']; ?>" class="img-fluid  rounded" alt="Archivo pdf">
                <span class="fecha position-absolute px-4 py-2 rounded"><?php echo date("Y", strtotime($proyecto['fecha'])); ?></span>
                <div class="proyects-content px-3">
                  <h5 class="autor"><?php echo strlen($proyecto['titulo']) > 50 ? substr($proyecto['titulo'], 0, 50) . ' ...' : $proyecto['titulo']; ?></h5>
                  <p><?php echo $proyecto['descripcion']; ?></p>
                  <span class="programa"><?php echo $proyecto['programa']; ?></span>
                </div>
                <div class="btn__ver d-flex justify-content-center px-4 py-2 border rounded-bottom w-100">
                  <a href="public/proyectos.php"><small><i class="bi bi-eye-fill"></i></i> Ver Más</small></a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
  </div> <!-- Fin de seccion proyectos -->

  <!-- Seccion: integrantes -->

  <div class="container-fluid py-5 mb-5 team">
    <section id="integrantes">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="intro">
              <h5>Conoce a nuestro equipo en acción</h6>
                <h1>Nuestros Colaboradores</h1>
                <p class="mx-auto">Descubre la fuerza impulsora detrás de nuestro éxito: un equipo dedicado y apasionado que trabaja en armonía para lograr resultados extraordinarios.</p>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <?php foreach ($integrantesList as $integrante) :
            $nombres = $integrante["nombres"] . ' ' . $integrante["apellidos"];
            $foto = $integrante["foto"];
            $cargo = '';
            if ($integrante['roles_id'] === 1) {
              $cargo = 'Administrador';
            } else {
              $cargo = 'Estudiante';
            }
          ?>
            <div class="col-lg-4 col-md-8">
              <div class="team-member">
                <div class="image rounded">
                  <img src="archivos/integrantes/<?php echo $foto ?>" class="img-fluid  rounded" alt="img integrante">
                  <div class="social-icons">
                    <a class="btn text-white btn-floating m-1" style="background-color: #DB4A39;" href="<?php echo $integrante['email']; ?>" target="_blank" role="button">
                      <i class="bi bi-envelope-at-fill" title="Correo" style="font-size: 1.5rem"></i>
                    </a>
                    <a class="btn text-white btn-floating m-1" style="background-color: #0E76A8 ;" href="<?php echo $integrante['linkedln']; ?>" target="_blank" role="button">
                      <i class="bi bi-linkedin" title="Linkedln" style="font-size: 1.5rem"></i>
                    </a>
                    <a class="btn text-white btn-floating m-1" style="background-color: #6C757D;" href="<?php echo $integrante['cvlac']; ?>" target="_blank" role="button">
                      <i class="bi bi-file-earmark-person-fill" title="Cvlac" style="font-size: 1.5rem"></i>
                    </a>
                  </div>
                  <div class="overlay"></div>
                </div>

                <h5><?php echo $nombres ?></h5>
                <p><?php echo $cargo; ?></p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <a class="btn btn-outline-primary btn_outlines" href="public/integrantes.php" role="button">Ver Más <i class="bi bi-arrow-right"></i></a>
        </div>
      </div>
    </section>
  </div> <!-- Fin seccion: integrantes -->

  <!-- Sección: Galeria -->

  <div class="container-fluid gallery py-5 mb-5">
    <section id="galeria">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="intro">
              <h5>Explora nuestra galeria</h6>
                <h1>Imágenes Destacadas</h1>
                <p class="mx-auto">Sumérgete en nuestra colección visual que captura momentos significativos y experiencias compartidas. Descubre la diversidad y la belleza a través de nuestras imágenes cuidadosamente seleccionadas.</p>
            </div>
          </div>
        </div>
        <!-- <hr class="mt-2 mb-5"> -->
        <div class="row text-center text-lg-start">
          <div class="col-lg-3 col-md-4 col-6">
            <a href="#" class="d-block mb-4 h-100">
              <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/pWkk7iiCoDM/400x300" alt="">
            </a>
          </div>
          <div class="col-lg-3 col-md-4 col-6">
            <a href="#" class="d-block mb-4 h-100">
              <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/aob0ukAYfuI/400x300" alt="">
            </a>
          </div>
          <div class="col-lg-3 col-md-4 col-6">
            <a href="#" class="d-block mb-4 h-100">
              <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/EUfxH-pze7s/400x300" alt="">
            </a>
          </div>
          <div class="col-lg-3 col-md-4 col-6">
            <a href="#" class="d-block mb-4 h-100">
              <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/M185_qYH8vg/400x300" alt="">
            </a>
          </div>
          <div class="col-lg-3 col-md-4 col-6">
            <a href="#" class="d-block mb-4 h-100">
              <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/sesveuG_rNo/400x300" alt="">
            </a>
          </div>
          <div class="col-lg-3 col-md-4 col-6">
            <a href="#" class="d-block mb-4 h-100">
              <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/AvhMzHwiE_0/400x300" alt="">
            </a>
          </div>
          <div class="col-lg-3 col-md-4 col-6">
            <a href="#" class="d-block mb-4 h-100">
              <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/2gYsZUmockw/400x300" alt="">
            </a>
          </div>
          <div class="col-lg-3 col-md-4 col-6">
            <a href="#" class="d-block mb-4 h-100">
              <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/EMSDtjVHdQ8/400x300" alt="">
            </a>
          </div>
          <div class="col-lg-3 col-md-4 col-6">
            <a href="#" class="d-block mb-4 h-100">
              <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/8mUEy0ABdNE/400x300" alt="">
            </a>
          </div>
          <div class="col-lg-3 col-md-4 col-6">
            <a href="#" class="d-block mb-4 h-100">
              <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/G9Rfc1qccH4/400x300" alt="">
            </a>
          </div>
          <div class="col-lg-3 col-md-4 col-6">
            <a href="#" class="d-block mb-4 h-100">
              <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/aJeH0KcFkuc/400x300" alt="">
            </a>
          </div>
          <div class="col-lg-3 col-md-4 col-6">
            <a href="#" class="d-block mb-4 h-100">
              <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/p2TQ-3Bh3Oo/400x300" alt="">
            </a>
          </div>
        </div>
      </div>
    </section>
  </div> <!-- Fin de sección Galeria -->

  <!-- Sección: Contacto -->

  <div class="container-fluid py-5 mb-5">
    <section id="contacto">
      <div class="container contacto">
        <div class="row">
          <div class="col-12">
            <div class="intro">
              <h5>Contactanos</h6>
                <h1>Formulario de Contacto</h1>
                <p class="mx-auto">Sumérgete en la creatividad y la innovación que impulsa nuestros proyectos destacados.</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-7">
            <div class="contact">
              <form class="form" method="post" action="servidor/contacto.php" onsubmit="return validation();">
                <div class="row g-5">
                  <div class="col-sm-6">
                    <input type="text" name="nombres" class="form-control mb-3" placeholder="Nombres" required="required">
                  </div>
                  <div class="col-sm-6">
                    <input type="email" name="email" class="form-control mb-3" placeholder="Email" required="required">
                  </div>
                  <div class="col-12">
                    <input type="text" name="asunto" class="form-control mb-3" placeholder="Asunto" required="required">
                  </div>
                  <div class="col-12">
                    <textarea rows="6" name="mensaje" class="form-control mb-3" placeholder="Tu Mensaje" required="required"></textarea>
                  </div>
                  <div class="col-12 text-center">
                    <button type="submit" class="btn btn-contact-bg">Enviar Mensaje</button>
                  </div>
                </div>
              </form>
            </div>
          </div>

          <div class="col-lg-5">
            <div class="single_address">
              <i class="fas fa-map-marker-alt"></i>
              <h6>Nuestra Dirección</h6>
              <p>Cra. 12a #102 Girardot, Colombia</p>
            </div>
            <div class="single_address">
              <i class="fas fa-envelope"></i>
              <h6>Envías tu mensaje a</h6>
              <p>mtsanchez@uniminuto.edu</p>
            </div>
            <div class="single_address">
              <i class="fas fa-phone"></i>
              <h6>Llamanos al</h6>
              <p>(+57) 321 461 4550</p>
            </div>
            <div class="single_address">
              <i class="fas fa-clock"></i>
              <h6>Horario</h6>
              <p>Lun - Vie: 08.00 - 18:00 <br>Sab: 08.00 - 12.00</p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div> <!-- Fin de sección Contacto -->

  <!-- FOOTER -->

  <?php
  include('templates/footer.php');
  ?>