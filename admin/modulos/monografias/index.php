<?php
session_start();
if (!isset($_SESSION['administrador'])) {
    header("location: ../../index.php");
}
include("../../templates/header.php");
include("../../../clases/Monografias.php");

//instancia de la clase Integrantes
$monografias = new Monografias();

// Obtener los proyectos
$listarMonografias = $monografias->obtenerMonografias();

?>

<div class="titulo">
    <h3>Monografias</h3>
</div><br>

<div class="card">
    <div class="card-header fs-3 mb-3">
        <button type="button" class="btn btn-primary botonos-datatables" data-bs-toggle="modal" data-bs-target="#agregar">
            Agregar monografias
            <i class="bi bi-plus-circle"></i>
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <?php if (empty($listarMonografias)) : ?>
                <p>No hay monografias registradas.</p>
            <?php else : ?>
                <table class="cell-border" id="miTabla">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Monografia</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Programa</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $registro = 1;
                        foreach ($listarMonografias as $monografia) :
                        ?>
                            <tr class="text-center">
                                <td scope="row"><?php echo $registro; ?></td>
                                <td>
                                    <a href="../../../archivos/monografias/<?php echo $monografia['archivo']; ?>" target="_blank">
                                        <img class="img-fluid mx-auto d-block" width="100" height="100" src="../../../archivos/monografias/img_archivos/<?php echo $monografia['imagen']; ?>">
                                    </a>
                                </td>
                                <td><?php echo $monografia['titulo']; ?></td>
                                <td><?php echo $monografia['programa']; ?></td>
                                <td><?php echo $monografia['descripcion']; ?></td>
                                <td>
                                    <a href="editar.php?id=<?php echo $monografia['id'] ?>" class="btn btn-primary botonos-datatables btn-sm" role="button">Editar</a>
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