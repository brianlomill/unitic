<?php
include_once('Conexion.php');

// Clase Posters
class Posters extends Conexion
{
    public function __construct()
    {
        parent::__construct();
    }

    public function ingresarPosters(
        $titulo,
        $fecha,
        $ciudad,
        $poster,
        $img,
        $tipo_trabajo
    ) {
        $conexion = $this->obtenerConexion();
        $sql = "INSERT INTO portafolios (titulo, ciudad, fecha, archivo, imagen, tipo_trabajo, created_at) 
            VALUES (?, ?, ?, ?, ?, ?, NOW())";
        $query = mysqli_prepare($conexion, $sql);
    
        if (!$query) {
            throw new Exception("Error en la consulta preparada: " . mysqli_error($conexion));
        }
        mysqli_stmt_bind_param(
            $query,
            "sssssi",
            $titulo,
            $ciudad,
            $fecha,
            $poster,
            $img,
            $tipo_trabajo
        );
        
    
        if (!mysqli_stmt_execute($query)) {
            throw new Exception("Error al ejecutar la consulta: " . mysqli_stmt_error($query));
        }
    
        mysqli_stmt_close($query);
    
        return true;
    }
    
    public function ingresarIntegrantesPosters($posterID, $integrantes)
    {
        $conexion = $this->obtenerConexion();

        foreach ($integrantes as $integrante) {
            $sql = "INSERT INTO portafolios_has_integrantes (portafolio_id, integrantes) VALUES (?, ?)";
            $query = mysqli_prepare($conexion, $sql);

            if (!$query) {
                throw new Exception("Error en la consulta preparada: " . mysqli_error($conexion));
            }

            mysqli_stmt_bind_param($query, "is", $posterID, $integrante);

            if (!mysqli_stmt_execute($query)) {
                throw new Exception("Error al ejecutar la consulta: " . mysqli_stmt_error($query));
            }

            mysqli_stmt_close($query);
        }

        return true;
    }

    public function obtenerPosters()
    {
        $conexion = $this->obtenerConexion();
        $sql = "SELECT * FROM portafolios where tipo_trabajo = 3";
        $result = mysqli_query($conexion, $sql);
        $posters = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $posters[] = $row;
        }

        mysqli_free_result($result);

        return $posters;
    }
    
    public function obtenerIntegrantes(){
        $conexion = $this->obtenerConexion();
        $sql = "SELECT *
        FROM portafolios_has_integrantes pi
        INNER JOIN portafolios p ON (pi.portafolio_id = p.id)";
        $result = mysqli_query($conexion, $sql);
        $integrantes = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $integrantes[] = $row;
        }

        mysqli_free_result($result);

        return $integrantes;
    }

    public function editarPosters(
        $id,
        $titulo,
        $fecha,
        $ciudad,
    ) {
        $conexion = $this->obtenerConexion();

        // Validar campos
        if (empty($id) || empty($titulo)|| empty($fecha) || empty($ciudad) ) {
            throw new Exception("Debes completar todos los campos obligatorios.");
        }

        // Iniciar una transacción
        mysqli_begin_transaction($conexion);

        // La sentencia SQL debe actualizar los campos adecuados
        $sql = "UPDATE portafolios SET titulo=?, ciudad=?, fecha=?, updated_at=NOW() WHERE id=?";
        $query = mysqli_prepare($conexion, $sql);

        if (!$query) {
            throw new Exception("Error en la consulta preparada: " . mysqli_error($conexion));
        }

        // Enlazar los parámetros adecuadamente, el tipo de datos del id es 'i'
        mysqli_stmt_bind_param(
            $query,
            "sssi",
            $titulo,
            $ciudad,
            $fecha,
            $id
        );

        if (!mysqli_stmt_execute($query)) {
            throw new Exception("Error al ejecutar la consulta: " . mysqli_stmt_error($query));
        }

        mysqli_stmt_close($query);

        return true;
    }

    public function contarPosters()
        {
            $conexion = $this->obtenerConexion();
            
            // Consulta para contar cuántos trabajos son del tipo 3
            $sql_conteo = "SELECT COUNT(*) AS posters FROM portafolios WHERE tipo_trabajo = 3";
            $result_posters = mysqli_query($conexion, $sql_conteo);
            $row_posters = mysqli_fetch_assoc($result_posters);
            $conteo_posters= $row_posters['posters'];
            mysqli_free_result($result_posters);
            
            return $conteo_posters;
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
    
}
