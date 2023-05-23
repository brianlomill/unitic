<?php session_start();
if (!isset($_SESSION['administrador'])) {
    header("location: ../../index.php");
}

include("../../templates/header.php");
include("../../clases/Conexion.php");

// Crear una instancia de la clase Conexion
$conexion = new Conexion();

// Realizar la conexión a la base de datos
$conn = $conexion->conectar();

// Verificar la conexión
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

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
                    <?php
                    $No = 1;
                    $sql = "SELECT * FROM integrantes";
                    $resultado = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($resultado) > 0) {
                        // Iterar sobre los registros y hacer algo con ellos
                        while ($fila = mysqli_fetch_assoc($resultado)) {
                            if ($fila['estado'] == 1) {
                                $estado = "Activo";
                            } else {
                                $estado = "Inactivo";
                            }
                            $foto = $fila['foto'];
                            $ruta_archivo = "../../../archivos/integrantes/" . $foto;

                    ?>

                            <tr class="text-center">
                                <td scope="row"><?php echo $No; ?></td>
                                <!-- <td><!?php echo "<img src='" . $ruta_archivo . "' alt='Foto de usuario' width='100' height='100'>"; ?></td> -->
                                <td><?php $Nombres = $fila['nombres'] . ' ' . $fila['apellidos'];
                                    echo $Nombres ?></td>
                                <td><?php echo $fila['email']; ?></td>
                                <td><?php echo $estado ?></td>
                                <td>
                                    <a href="editar.php?id=<?php echo $fila['id'] ?>" class="btn btn-primary btn-sm" role="button">Editar</a>
                                </td>

                            </tr>
                    <?php
                            $No += 1;
                        }
                    } else {
                        echo "No se encontraron registros.";
                    }

                    // Cerrar la conexión
                    mysqli_close($conn);
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div><br>
<?php include("crear.php"); ?>
<?php include("../../templates/footer.php"); ?>