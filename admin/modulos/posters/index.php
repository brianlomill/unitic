<?php
session_start();
if (!isset($_SESSION['administrador'])) {
    header("location: ../../index.php");
}
include("../../templates/header.php");
include("../../../clases/Posters.php");


//instancia de la clase Integrantes
$Posters = new Posters();

// Obtener los proyectos
$listarPosters= $Posters->obtenerPosters();

?>

<div class="titulo">
    <h3>Posters</h3>
</div><br>

<div class="card">
    <div class="card-header fs-3 mb-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregar">
            Agregar poster
            <i class="bi bi-plus-circle"></i>
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <?php if (empty($listarPosters)) : ?>
                <p>No hay Posters registrados.</p>
            <?php else : ?>
                <table class="cell-border" id="miTabla">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Poster</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Ciudad</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $registro = 1;
                        foreach ($listarPosters as $poster) :
                        ?>
                            <tr class="text-center">
                                <td scope="row"><?php echo $registro; ?></td>
                                <td>
                                    <a href="../../../archivos/productos/posters/<?php echo $poster['archivo']; ?>" target="_blank">
                                        <img class="img-fluid mx-auto d-block" width="100" height="100" src="../../../archivos/productos/posters/<?php echo $poster['archivo']; ?>">
                                    </a>
                                </td>
                                <td><?php echo $poster['titulo']; ?></td>
                                <td><?php echo $poster['ciudad']; ?></td>
                                <td>
                                    <a href="editar.php?id=<?php echo $poster['id'] ?>" class="btn btn-primary btn-sm" role="button">Editar</a>
                                </td>
                            </tr>
                        <?php
                            $registro++;
                        endforeach;
                        ?>
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