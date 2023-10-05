<?php
session_start();
if (!isset($_SESSION['administrador'])) {
    header("location: ../../index.php");
}
include("../../templates/header.php");
include("../../../clases/Proyectos.php");

//instancia de la clase Integrantes
$proyectos = new Proyectos();

// Obtener los proyectos
$listarProyectos = $proyectos->obtenerProyectos();

?>

<div class="titulo">
    <h3>Proyectos</h3>
</div><br>

<div class="card">
    <div class="card-header fs-3 mb-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregar">
            Agregar proyectos
            <i class="bi bi-plus-circle"></i>
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <?php if (empty($listarProyectos)) : ?>
                <p>No hay proyectos registrados.</p>
            <?php else : ?>
                <table class="cell-border" id="miTabla">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Proyecto</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Programa</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listarProyectos as $proyecto) : ?>
                            <tr class="text-center">
                                <td scope="row"><?php echo $proyecto['id']; ?></td>
                                <td>
                                    <a href="../../../archivos/proyectos/<?php echo $proyecto['archivo']; ?>" target="_blank">
                                        <img class="img-fluid mx-auto d-block" width="100" height="100" src="../../../archivos/proyectos/img_archivos/<?php echo $proyecto['imagen']; ?>">
                                    </a>
                                </td>
                                <td><?php echo $proyecto['titulo']; ?></td>
                                <td><?php echo $proyecto['programa']; ?></td>
                                <td><?php echo $proyecto['descripcion']; ?></td>
                                <td>
                                    <a href="editar.php?id=<?php echo $proyecto['id'] ?>" class="btn btn-primary btn-sm" role="button">Editar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</div>
<br>
<?php
include("crear.php");
include("../../templates/footer.php");
?>