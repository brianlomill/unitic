<?php
session_start();
if (!isset($_SESSION['administrador'])) {
    header("location: ../../index.php");
}
include("../../templates/header.php");
include("../../../clases/Ponencias.php");

//instancia de la clase Integrantes
$Ponencias = new Ponencias();

// Obtener los proyectos
$listarPonencias = $Ponencias->obtenerPonencias();

?>

<div class="titulo">
    <h3>Ponencias</h3>
</div><br>

<div class="card">
    <div class="card-header fs-3 mb-3">
        <button type="button" class="btn btn-primary botonos-datatables" data-bs-toggle="modal" data-bs-target="#agregar">
            Agregar ponencias
            <i class="bi bi-plus-circle"></i>
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <?php if (empty($listarPonencias)) : ?>
                <p>No hay ponencias registradas.</p>
            <?php else : ?>
                <table class="cell-border" id="miTabla">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Ponencia</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Ciudad</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $registro = 1;
                        foreach ($listarPonencias as $ponencia) :
                        ?>
                            <tr class="text-center">
                                <td scope="row"><?php echo $registro; ?></td>
                                <td>
                                    <a href="../../../archivos/productos/ponencias/<?php echo $ponencia['archivo']; ?>" target="_blank">
                                        <img class="img-fluid mx-auto d-block" width="100" height="100" src="../../../archivos/productos/ponencias/img_archivos/<?php echo $ponencia['imagen']; ?>">
                                    </a>
                                </td>
                                <td><?php echo $ponencia['titulo']; ?></td>
                                <td><?php echo $ponencia['ciudad']; ?></td>
                                <td>
                                    <a href="editar.php?id=<?php echo $ponencia['id'] ?>" class="btn btn-primary botonos-datatables btn-sm" role="button">Editar</a>
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