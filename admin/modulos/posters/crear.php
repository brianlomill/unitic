<!-- Modal -->
<div class="modal fade" id="agregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Poster</h5>
        <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../../../servidor/posters/agregar_posters.php" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>

          <div class="row form-crear">
            <div class="col-sm-12">
              <div class="mb-3">
                <label for="titulo" class="form-label">Titulo</label>
                <input type="text" id="titulo" name="titulo" class="form-control" required>
                <div class="invalid-feedback">
                  Escriba el titulo
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
                <button type="button" class="btn btn-primary botonos-datatables" id="agregarIntegrantes">
                  Creadores y/o Integrantes
                  <i class="bi bi-plus-circle"></i>
                </button>
                <div class="invalid-feedback">
                  Escriba los Creadores y/o Integrantes
                </div>
              </div>
            </div>

            <div class="col-12">
              <label for="poster" class="form-label">Archivo (WORD & PDF)</label>
              <input type="file" name="poster" id="poster" class="form-control" required> 
              <em><p id="errorPoster" class="text-danger"  style="font-size: 14px;"></p></em>
            </div>

            <div class="col-12">
              <label for="img" class="form-label">Subir foto de portada</label>
              <input type="file" name="img" id="img" class="form-control" required>
              <em><p id="errorFoto" class="text-danger"  style="font-size: 14px;"></p></em>
            </div>

            <div class="modal-footer">
              <button type="button" id="close" class="btn btn-lg btn-danger btn-login text-uppercase fw-semibold mb-2" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-lg btn-primary btn-login text-uppercase fw-semibold mb-2" id="enviarFormularioBtn">Guardar cambios</button>
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
</script>