<?php
session_start();

if (!isset($_SESSION['administrador'])) {
    header("location: ../../index.php");
}

include("../../templates/header.php");
include("../../../clases/Integrantes.php");

if (isset($_SESSION['success_message'])) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
    echo $_SESSION['success_message'];
    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
    echo '</div>';
    unset($_SESSION['success_message']);
}

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
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregar">
            Agregar integrantes
            <i class="bi bi-plus-circle"></i>
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
             <?php if (empty($listaIntegrantes)) : ?>
                <p>No hay integrantes registrados.</p>
             <?php else : ?>
            <table class="table table-bordered table-primary text-center">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
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
                            <td><?php $Nombres = $integrante['nombres'] . ' ' . $integrante['apellidos'];
                                echo $Nombres ?></td>
                            <td><?php echo $integrante['email']; ?></td>
                            <td>
                                <?php if ($integrante['estado'] == 1) : ?>
                                    Activo
                                <?php else : ?>
                                    Inactivo
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="editar.php?id=<?php echo $integrante['id'] ?>" class="btn btn-primary btn-sm" role="button">Editar</a>
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