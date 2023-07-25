<?php session_start();
if(!isset($_SESSION['administrador'])){
  header("location: ../../index.php");
}?>
<?php include("../../templates/header.php") ?>

<div class="titulo">
<h3>Productos</h3>
</div><br>

<div class="card">
    <div class="card-header fs-3 mb-3">
        <a name="" id="" class="btn btn-primary " href="#" role="button">Agregar Productos 
            <i class="bi bi-plus-circle"></i>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="cell-border" id="miTabla">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Programa</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td scope="row">Item</td>
                        <td>Item</td>
                        <td>Item</td>
                        <td>Item</td>
                        <td>
                            <a name="editar" id="editar" class="btn btn-primary btn-sm" href="#" role="button">Editar</a> |
                            <a name="editar" id="editar" class="btn btn-success btn-sm" href="#" role="button">Estado</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>  
    </div>
</div><br>
<footer>
<?php include("../../templates/footer.php") ?>
</footer>
