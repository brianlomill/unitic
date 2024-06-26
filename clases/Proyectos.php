<?php
include_once('Conexion.php');

// Clase Proyectos
class Proyectos extends Conexion
{
    public function __construct()
    {
        parent::__construct();
    }

    public function ingresarProyectos(
        $titulo,
        $programa,
        $fecha,
        $descripcion,
        $archivo,
        $foto,
        $tipo_trabajo
    ) {
        $conexion = $this->obtenerConexion();
        $sql = "INSERT INTO portafolios (titulo, programa, fecha, descripcion, archivo, imagen, tipo_trabajo, created_at) 
            VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";
        $query = mysqli_prepare($conexion, $sql);

        if (!$query) {
            throw new Exception("Error en la consulta preparada: " . mysqli_error($conexion));
        }
        mysqli_stmt_bind_param(
            $query,
            "ssssssi",
            $titulo,
            $programa,
            $fecha,
            $descripcion,
            $archivo,
            $foto,
            $tipo_trabajo
        );

        if (!mysqli_stmt_execute($query)) {
            throw new Exception("Error al ejecutar la consulta: " . mysqli_stmt_error($query));
        }

        mysqli_stmt_close($query);

        return true;
    }

    public function ingresarIntegrantesProyectos($proyectoId, $integrantes)
    {
        $conexion = $this->obtenerConexion();

        foreach ($integrantes as $integrante) {
            $sql = "INSERT INTO portafolios_has_integrantes (portafolio_id, integrantes) VALUES (?, ?)";
            $query = mysqli_prepare($conexion, $sql);

            if (!$query) {
                throw new Exception("Error en la consulta preparada: " . mysqli_error($conexion));
            }

            mysqli_stmt_bind_param($query, "is", $proyectoId, $integrante);

            if (!mysqli_stmt_execute($query)) {
                throw new Exception("Error al ejecutar la consulta: " . mysqli_stmt_error($query));
            }

            mysqli_stmt_close($query);
        }

        return true;
    }

    public function obtenerProyectos()
    {
        $conexion = $this->obtenerConexion();
        $sql = "SELECT * FROM portafolios where tipo_trabajo = 1";
        $result = mysqli_query($conexion, $sql);
        $proyectos = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $proyectos[] = $row;
        }

        mysqli_free_result($result);

        return $proyectos;
    }

    public function obtenerPrimerosProyectos()
    {
        // Obtener solo 3 proyectos
        $cantidad = 3;
        $conexion = $this->obtenerConexion();
        if (!$conexion) {
            throw new Exception("Error en la conexión a la base de datos: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM portafolios where tipo_trabajo = 1 LIMIT ?";
        $query = mysqli_prepare($conexion, $sql);
        if (!$query) {
            throw new Exception("Error en la consulta preparada: " . mysqli_error($conexion));
        }
        // Enlazar el parámetro y ejecutar la consulta
        mysqli_stmt_bind_param($query, "i", $cantidad);

        if (!mysqli_stmt_execute($query)) {
            throw new Exception("Error al ejecutar la consulta: " . mysqli_stmt_error($query));
        }
        // Obtener los resultados
        $result = mysqli_stmt_get_result($query);
        // Manejo de errores en la obtención de resultados
        if (!$result) {
            throw new Exception("Error al obtener los resultados: " . mysqli_error($conexion));
        }
        // Recorrer los resultados y almacenar en un array
        $proyectos = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $proyectos[] = $row;
        }

        return $proyectos;
    }


    public function obtenerIntegrantes()
    {
        $conexion = $this->obtenerConexion();
        $sql = "SELECT * FROM portafolios_has_integrantes pi
        INNER JOIN portafolios p ON (pi.portafolio_id = p.id)";
        $result = mysqli_query($conexion, $sql);
        $integrantes = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $integrantes[] = $row;
        }

        mysqli_free_result($result);

        return $integrantes;
    }

    public function editarProyectos(
        $id,
        $titulo,
        $programa,
        $fecha,
        $descripcion
    ) {
        $conexion = $this->obtenerConexion();

        // Validar campos
        if (empty($id) || empty($titulo) || empty($programa) || empty($fecha) || empty($descripcion)) {
            throw new Exception("Debes completar todos los campos obligatorios.");
        }

        // Iniciar una transacción
        mysqli_begin_transaction($conexion);

        // La sentencia SQL debe actualizar los campos adecuados
        $sql = "UPDATE portafolios SET titulo=?, programa=?, fecha=?, descripcion=?, updated_at=NOW() WHERE id=?";
        $query = mysqli_prepare($conexion, $sql);

        if (!$query) {
            throw new Exception("Error en la consulta preparada: " . mysqli_error($conexion));
        }

        // Enlazar los parámetros adecuadamente, el tipo de datos del id es 'i'
        mysqli_stmt_bind_param(
            $query,
            "ssssi",
            $titulo,
            $programa,
            $fecha,
            $descripcion,
            $id
        );

        if (!mysqli_stmt_execute($query)) {
            throw new Exception("Error al ejecutar la consulta: " . mysqli_stmt_error($query));
        }

        mysqli_stmt_close($query);

        return true;
    }


    public function actualizarIntegrantes($id, $integrantes)
    {
        $conexion = $this->obtenerConexion();

        try {
            // Iniciar una transacción
            mysqli_begin_transaction($conexion);

            // Eliminar todos los integrantes existentes para el proyecto
            $sqlEliminar = "DELETE FROM portafolios_has_integrantes WHERE portafolio_id=?";
            $queryEliminar = mysqli_prepare($conexion, $sqlEliminar);

            if (!$queryEliminar) {
                throw new Exception("Error en la consulta preparada: " . mysqli_error($conexion));
            }

            mysqli_stmt_bind_param($queryEliminar, "i", $id);

            if (!mysqli_stmt_execute($queryEliminar)) {
                throw new Exception("Error al ejecutar la consulta de eliminación: " . mysqli_stmt_error($queryEliminar));
            }

            mysqli_stmt_close($queryEliminar);

            // Insertar los nuevos integrantes
            $sqlInsertar = "INSERT INTO portafolios_has_integrantes (portafolio_id, integrantes) VALUES (?, ?)";
            $queryInsertar = mysqli_prepare($conexion, $sqlInsertar);

            if (!$queryInsertar) {
                throw new Exception("Error en la consulta preparada: " . mysqli_error($conexion));
            }

            foreach ($integrantes as $integrante) {
                mysqli_stmt_bind_param($queryInsertar, "is", $id, $integrante);

                if (!mysqli_stmt_execute($queryInsertar)) {
                    // Manejar el error al insertar el integrante
                    throw new Exception("Error al insertar integrante: " . mysqli_stmt_error($queryInsertar));
                }
            }

            mysqli_stmt_close($queryInsertar);

            // Confirmar la transacción
            mysqli_commit($conexion);

            return true;
        } catch (Exception $e) {
            // Revertir la transacción en caso de error
            mysqli_rollback($conexion);

            throw new Exception("Error al actualizar los integrantes: " . $e->getMessage());
        } finally {
            // Cerrar la conexión
            mysqli_close($conexion);
        }
    }

    public function contarProyectos()
    {
        $conexion = $this->obtenerConexion();
        // Consulta para contar cuántos trabajos son de tipo 1
        $sql_conteo = "SELECT COUNT(*) AS conteo FROM portafolios WHERE tipo_trabajo = 1";
        $result_conteo = mysqli_query($conexion, $sql_conteo);
        $row_conteo = mysqli_fetch_assoc($result_conteo);
        $conteo = $row_conteo['conteo'];
        
        mysqli_free_result($result_conteo);
        
        return $conteo;
    }
}
