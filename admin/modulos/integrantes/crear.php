

<!-- Modal -->
<div class="modal fade" id="agregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Integrantes</h5>
        <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../../servidor/agrear_integrantes.php" method="POST" enctype="multipart/form-data">

          <div class="row">
            <div class="col-sm-6">
              <div class="mb-3">
                <label for="nombres" class="form-label">Nombres</label>
                <input type="text" id="nombres" name="nombres" class="form-control" required>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" id="apellidos" name="apellidos" class="form-control" required>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="mb-3">
                <label for="cvlac" class="form-label">Link CVLAC</label>
                <input type="text" id="cvlac" name="cvlac" class="form-control" required>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="mb-3">
                <label for="linkedin" class="form-label">Link LinkedIn</label>
                <input type="text" id="linkedin" name="linkedin" class="form-control" required>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="mb-3">
                <label for="fecha_ingreso" class="form-label">Fecha de ingreso</label>
                <input type="date" id="fecha_ingreso" name="fecha_ingreso" class="form-control"  max="<?php echo date("Y-m-d"); ?>" required>
              </div>
            </div>
          <div class="col-12">
            <label for="foto" class="form-label">Subir foto</label>
            <input type="file" name="foto" id="foto" class="form-control" >
          </div>
          <br>

          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
          </div>
        </form>
      </div>
    </div>

  </div>
</div>
</div>