  </main>
  <footer class="bg-light text-center text-white">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: Social media -->
      <section class="mb-4">
        <!-- Facebook -->
        <a class="btn text-white btn-floating m-1" style="background-color: #4267B2;" href="https://www.facebook.com/semillero.unitic.uniminuto" target="_blank" role="button">
          <i class="fab fa-facebook-f"></i>
        </a>

        <!-- Twitter -->
        <a class="btn text-white btn-floating m-1" style="background-color: #1DA1F2;" href="https://twitter.com/SemilleroUnitic" target="_blank" role="button">
          <i class="fab fa-twitter"></i>
        </a>

        <!-- Instagram -->
        <a class="btn text-white btn-floating m-1" style="background-color: #E1306C;" href="https://www.instagram.com/semillero.untic/" target="_blank" role="button">
          <i class="fab fa-instagram"></i>
        </a>

        <!-- Linkedin -->
        <a class="btn text-white btn-floating m-1" style="background-color: #c4302b ;" href="https://www.youtube.com/@uniticsemillerouniminuto5397" target="_blank" role="button">
          <i class="fab fa-youtube"></i>
        </a>
      </section>
      <!-- Section: Social media -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: #0A4D68;">
      © 2022 Copyright: Semillero Unitic
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

  <script>
    // deshabilitar el envío de formularios si hay campos no válidos
    (function() {
      'use strict'

      // Obtener todos los formularios para aplicar estilos de validación de Bootstrap 
      var forms = document.querySelectorAll('.needs-validation')

      // Bucle sobre ellos y evitar el envío
      Array.prototype.slice.call(forms)
        .forEach(function(form) {
          form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
              event.preventDefault()
              event.stopPropagation()
            }

            form.classList.add('was-validated')
          }, false)
        })
    })()
  </script>
  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      $('#miTabla').DataTable({
        language: {
          "decimal": "",
          "emptyTable": "No hay datos disponibles en la tabla",
          "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
          "infoEmpty": "Mostrando 0 a 0 de 0 registros",
          "infoFiltered": "(filtrado de _MAX_ registros totales)",
          "infoPostFix": "",
          "thousands": ",",
          "lengthMenu": "Mostrar _MENU_ registros por página",
          "loadingRecords": "Cargando...",
          "processing": "Procesando...",
          "search": "Buscar:",
          "zeroRecords": "No se encontraron registros coincidentes",
          "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
          },
          "aria": {
            "sortAscending": ": activar para ordenar la columna en orden ascendente",
            "sortDescending": ": activar para ordenar la columna en orden descendente"
          }
        },
        "columnDefs": [{
          "className": "text-center",
          "targets": "_all"
        }]
      });
    });
  </script>
  </body>

  </html>