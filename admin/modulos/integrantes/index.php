<?php
session_start();

if (!isset($_SESSION['administrador'])) {
    header("location: ../../index.php");
}

include("../../templates/header.php");
include("../../../clases/Integrantes.php");

//instancia de la clase Integrantes
$integrantes = new Integrantes();

// Obtener los integrantes
$listaIntegrantes = $integrantes->obtenerIntegrantes();

?>

<div class="titulo">
    <h3>Integrantes</h3>
</div><br>

<div class="card">
    <div class="card-header fs-3 mb-3">
        <button type="button" class="btn btn-primary botonos-datatables" data-bs-toggle="modal" data-bs-target="#agregar">
            Agregar integrantes
            <i class="bi bi-plus-circle"></i>
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
             <?php if (empty($listaIntegrantes)) : ?>
                <p>No hay integrantes registrados.</p>
             <?php else : ?>
            <table class="cell-border" id="miTabla">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody>
                   <?php foreach ($listaIntegrantes as $integrante) : ?>
            
                        <tr class="text-center">
                            <td scope="row"><?php echo $integrante['id']; ?></td>
                            <td><img class="img-fluid mx-auto d-block"  width="40" height="40" src="../../../archivos/integrantes/<?php echo $integrante['foto']; ?>"></td>
                            <td><?php $Nombres = $integrante['nombres'] . ' ' . $integrante['apellidos'];
                                echo $Nombres ?></td>
                            <td><?php echo $integrante['email']; ?></td>
                            <td>
                                <?php if ($integrante['estado'] == 1) : ?>
                                    <span class="badge bg-success">Activo</span>
                                <?php else : ?>
                                    <span class="badge bg-danger">Inactivo</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="editar.php?id=<?php echo $integrante['id'] ?>" class="btn btn-primary botonos-datatables btn-sm" role="button">Editar</a>
                            </td>
                        </tr>
                         <?php endforeach; ?>
                </tbody>
            </table>
            <?php endif; ?>
        </div>
    </div>
</div><br>
<?php include("crear.php"); ?>
<?php include("../../templates/footer.php"); ?>