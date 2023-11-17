<!-- Modal -->
<div class="modal fade" id="agregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLabel">Agregar ponencia</h5>
        <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../../../servidor/ponencias/agregar_ponencias.php" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>

          <div class="row">
            <div class="col-sm-12">
              <div class="mb-3">
                <label for="titulo" class="form-label">Titulo</label>
                <input type="text" id="titulo" name="titulo" class="form-control" required>
                <div class="invalid-feedback">
                  Escriba el titulo
                </div>
              </div>
            </div>

            <div class="col-sm-12">
              <div class="mb-3">
                <label for="evento" class="form-label">Evento</label>
                <input type="text" id="evento" name="evento" class="form-control" required>
                <div class="invalid-feedback">
                  Escriba el evento
                </div>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" id="fecha" name="fecha" class="form-control" max="<?php echo date("Y-m-d"); ?>" required>
                <div class="invalid-feedback">
                  Seleccione fecha
                </div>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="mb-3">
                <label for="ciudad" class="form-label">Ciudad</label>
                <input type="text" id="ciudad" name="ciudad" class="form-control" required>
                <div class="invalid-feedback">
                  Escriba la ciudad
                </div>
              </div>
            </div>

            <div class="col-sm-12" id="integrantes">
              <div class="mb-3">
                <button type="button" class="btn btn-primary" id="agregarIntegrantes">
                  Creadores y/o Integrantes
                  <i class="bi bi-plus-circle"></i>
                </button>
                <div class="invalid-feedback">
                  Escriba los Creadores y/o Integrantes
                </div>
              </div>
            </div>

            <div class="col-sm-12">
              <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion</label>
                <textarea type="text" id="descripcion" name="descripcion" class="form-control" required></textarea>
                <div class="invalid-feedback">
                  Escriba una descripción
                </div>
              </div>
            </div>

            <div class="col-12">
              <label for="archivo" class="form-label">Archivo (WORD & PDF)</label>
              <input type="file" name="archivo" id="archivo" class="form-control" required>
              <em>
                <p id="errorArchivo" class="text-danger" style="font-size: 14px;"></p>
              </em>
            </div>

            <div class="col-12">
              <label for="foto" class="form-label">Subir foto de portada</label>
              <input type="file" name="foto" id="foto" class="form-control" required>
              <em>
                <p id="errorFoto" class="text-danger" style="font-size: 14px;"></p>
              </em>
            </div>

            <div class="modal-footer">
              <button type="button" id="close" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary" id="enviarFormularioBtn">Guardar cambios</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $(document).ready(function() {
    const integrantesDiv = $("#integrantes");
    const agregarIntegranteBtn = $("#agregarIntegrantes");

    agregarIntegranteBtn.click(function() {
      const nuevoInputDiv = $("<div>")
        .addClass("mb-3");
      const nuevoInput = $("<input>")
        .addClass("form-control")
        .attr("aria-label", "Default select example")
        .attr("name", "integrante[]")
        .attr("placeholder", "Escriba Integrante");

      nuevoInputDiv.append(nuevoInput);
      integrantesDiv.append(nuevoInputDiv);
    });

    $("#enviarFormularioBtn").click(function() {
      // Obtén los valores de los campos de integrantes
      const integrantes = [];
      $("input[name='integrante[]']").each(function() {
        integrantes.push($(this).val());
      });

      // Envia los datos de los integrantes por AJAX
      $.ajax({
        type: "POST",
        url: "agregar_proyectos.php", // Cambia la URL al archivo que maneja la solicitud
        data: {
          integrantes: integrantes
        }, // Envía los datos de los integrantes como un objeto
        success: function(response) {
          // Maneja la respuesta del servidor si es necesario
          console.log(response);
        }
      });
    });
    $('#agregar').on('hidden.bs.modal', function(e) {
      // Restablecer el contenido de los campos del formulario aquí
      $('#titulo').val('');
      $('#programa').val('');
      $('#fecha').val('');
      $('#descripcion').val('');
      $('#archivo').val('');
    });
  });

  // En tu JavaScript o dentro de un script en el HTML
  document.addEventListener('DOMContentLoaded', function() {
    // Obtener el elemento del error
    var errorArchivo = document.getElementById('errorArchivo');
    var archivoInput = document.getElementById('archivo');

    // Agregar un evento al input del archivo para verificar el tipo de archivo
    archivoInput.addEventListener('change', function() {
      var tipo_archivo = this.files[0].type;
      if (!(tipo_archivo === "application/pdf" || tipo_archivo === "application/vnd.openxmlformats-officedocument.wordprocessingml.document")) {
        // Mostrar el mensaje de error
        errorArchivo.textContent = "El formato del archivo no es válido. Solo se permiten archivos PDF y DOCX.";
        // Hacer que el mensaje de error sea visible
        errorArchivo.style.display = 'block';
      } else {
        // Ocultar el mensaje de error si el archivo es válido
        errorArchivo.style.display = 'none';
        errorArchivo.textContent = ''; // Limpiar el contenido del mensaje de error
      }
    });
  });

  document.addEventListener('DOMContentLoaded', function() {
    var errorImagen = document.getElementById('errorFoto');
    var fotoInput = document.getElementById('foto');

    fotoInput.addEventListener('change', function() {
      var tipo_imagen = this.files[0].type;
      if (!(tipo_imagen === "image/png" || tipo_imagen === "image/jpeg" || tipo_imagen === "image/jpg")) {
        errorImagen.textContent = "El formato de la imagen no es válido. Solo se permiten imágenes en formato PNG, JPG o JPEG.";
        errorImagen.style.display = 'block';
      } else {
        errorImagen.style.display = 'none';
        errorImagen.textContent = '';
      }
    });
  });
</script>