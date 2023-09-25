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
        $tipo_trabajo
    ) {
        $conexion = $this->obtenerConexion();
        $sql = "INSERT INTO portafolios (titulo, programa, fecha, descripcion, archivo, tipo_trabajo) 
            VALUES (?, ?, ?, ?, ?, ?)";
        $query = mysqli_prepare($conexion, $sql);

        if (!$query) {
            throw new Exception("Error en la consulta preparada: " . mysqli_error($conexion));
        }

        mysqli_stmt_bind_param(
            $query,
            "sssssi",
            $titulo,
            $programa,
            $fecha,
            $descripcion,
            $archivo,
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
            $sql = "INSERT INTO portafolios_has_integrantes (portafolios_id, integrantes) VALUES (?, ?)";
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
}
