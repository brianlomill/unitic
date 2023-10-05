<?php
include 'Conexion.php';

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
        $sql = "INSERT INTO portafolios (titulo, programa, fecha, descripcion, archivo, imagen, tipo_trabajo) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
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

    public function ingresarIntegrantesPoyectos($proyectoId, $integrantes)
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
        $sql = "SELECT * FROM portafolios";
        $result = mysqli_query($conexion, $sql);
        $proyectos = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $proyectos[] = $row;
        }

        mysqli_free_result($result);

        return $proyectos;
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

    public function editarProyectos(
        $id,
        $titulo,
        $archivo_existente,
        $archivo_nuevo,
        $programa,
        $fecha,
        $descripcion,
        $integrantes
    ) {
        $conexion = $this->obtenerConexion();
        $sql = "UPDATE portafolios SET archivo_nuevo=?, programa=?, fecha=?, descripcion=? WHERE id=?";
        $query = mysqli_prepare($conexion, $sql);

        if (!$query) {
            throw new Exception("Error en la consulta preparada: " . mysqli_error($conexion));
        }

        mysqli_stmt_bind_param(
            $query,
            "sssssi",
            $id,
            $titulo,
            $archivo_existente,
            $archivo_nuevo,
            $programa,
            $fecha,
            $descripcion,
            $integrantes
        );

        if (!mysqli_stmt_execute($query)) {
            throw new Exception("Error al ejecutar la consulta: " . mysqli_stmt_error($query));
        }

        mysqli_stmt_close($query);

        return true;
    }
}
