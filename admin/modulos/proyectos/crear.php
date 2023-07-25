<!-- Modal -->
<div class="modal fade" id="agregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLabel">Agregar proyectos</h5>
        <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../includes/upload.php" method="POST" enctype="multipart/form-data">

          <div class="row">
            <div class="col-sm-6">
              <div class="mb-3">
                <label for="nombre" class="form-label">Titulo</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="mb-3">
                <label for="nombre" class="form-label">Programa</label>
                <input type="text" id="descripcion" name="descripcion" class="form-control" required>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="mb-3">
                <label for="nombre" class="form-label">Integrantes</label>
                <select class="form-select" aria-label="Default select example">
                  <option selected disabled>Selecciona</option>
                  <option value="1">Uno</option>
                  <option value="2">Dos</option>
                  <option value="3">Tres</option>
                </select>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="mb-3">
                <label for="nombre" class="form-label">Descripcion</label>
                <textarea type="text" id="descripcion" name="descripcion" class="form-control" required></textarea>
              </div>
            </div>
          </div>

          <div class="col-12">
            <label for="yourPassword" class="form-label">Archivo (WORD & PDF)</label>
            <input type="file" name="archivo" id="archivo" class="form-control" required>
          </div>
          <br>

          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary">Guardar cambios</button>
          </div>
        </form>
      </div>
    </div>

  </div>
</div>
</div>