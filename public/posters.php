 <?php
  include('../templates/navbarSecciones.php');
  include('../clases/Posters.php');

  $Posters = new Posters();

  $listarPosters = $Posters->obtenerPosters();
  $integrantes = $Posters->obtenerIntegrantes();
  ?>

 </header>

 <main>

   <section class="home-blog bg-sand">
     <div class="container">
       <!-- TITULO POSTERS -->
       <div class="row">
         <div class="col-xl-5 col-lg-6 col-md-8">
           <div class="section-title">
             <h4>POSTERS</h4>
           </div>
         </div>
       </div>
       <!-- FINALIZA TITULO -->

       <div class="row">
         <!-- Aquí comienza el bucle para mostrar los posters -->
         <?php foreach ($listarPosters as $poster) : ?>
           <div class="col-md-6 mb-4">
             <div class="media blog-media sombras">
               <a href="../archivos/productos/posters/<?php echo $poster['archivo']; ?>" target="_blank">
                 <img class="d-flex" src="../archivos/productos/posters/<?php echo $poster['imagen']; ?>" alt="poster UNITIC" loading="lazy" style="width: 250px; height: 380px;" width="250" height="380">
               </a>

               <div class="media-body">
                 <div class="circle">
                   <h5 class="day">
                     <?php
                      $fecha = $poster['fecha']; // Tu fecha completa aquí
                      $ano = date('Y', strtotime($fecha));
                      echo $ano;
                      ?>
                   </h5>
                 </div>
                 <a href="../archivos/productos/posters/<?php echo $poster['archivo']; ?>" target="_blank">
                   <h5 class="mt-2"><?php echo $poster['titulo'] ?>.</h5>
                 </a>
                 <h5>
                   <?php echo $poster['ciudad']; ?>
                 </h5>
                 <ul>
                   <li>
                     <?php
                      foreach ($integrantes as $integrante) {
                        if ($integrante['portafolio_id'] == $poster['id']) {
                          echo 'Hecho por: ' . $integrante['integrantes'];
                        }
                      }
                      ?>
                   </li>
                 </ul>
                 <span class="badge bg-success">Ver</span>
               </div>
             </div>
           </div>
         <?php endforeach; ?>
         <!-- Fin del bucle -->
       </div>
     </div>
   </section>
 </main>
 <?php
  include '../templates/footer.php';
  ?>