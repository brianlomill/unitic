<?php
include_once('Conexion.php');

// Clase Integrantes para el modulo integrantes
class Integrantes extends Conexion
{
    public function __construct()
    {
        parent::__construct();
    }

    public function ingresarIntegrantes(
        $nombres,
        $apellidos,
        $email,
        $foto,
        $cvlac,
        $linkedin,
        $fecha_ingreso,
        $rol,
        $estado
    ) {
        $conexion = $this->obtenerConexion();
        $sql = "INSERT INTO integrantes (nombres, apellidos, email, foto, cvlac, linkedln, fecha_ingreso, roles_id, estado, created_at, updated_at) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
        $query = mysqli_prepare($conexion, $sql);
    
        if (!$query) {
            throw new Exception("Error en la consulta preparada: " . mysqli_error($conexion));
        }
    
        mysqli_stmt_bind_param(
            $query,
            "ssssssssi",
            $nombres,
            $apellidos,
            $email,
            $foto,
            $cvlac,
            $linkedin,
            $fecha_ingreso,
            $rol,
            $estado
        );
    
        if (!mysqli_stmt_execute($query)) {
            throw new Exception("Error al ejecutar la consulta: " . mysqli_stmt_error($query));
        }
    
        mysqli_stmt_close($query);
    
        return true;
    }

    public function editarIntegrantes(
        $id,
        $nombres,
        $apellidos,
        $email,
        $cvlac,
        $linkedin,
        $fecha_ingreso,
        $fecha_retiro,
        $rol,
        $estado
    ) {
        $conexion = $this->obtenerConexion();
        $sql = "UPDATE integrantes SET nombres=?, apellidos=?, email=?, cvlac=?, linkedln=?, fecha_ingreso=?, fecha_retiro=?, roles_id=?, estado=?, updated_at=NOW() WHERE id=?";
        $query = mysqli_prepare($conexion, $sql);

        if (!$query) {
            throw new Exception("Error en la consulta preparada: " . mysqli_error($conexion));
        }

        mysqli_stmt_bind_param(
            $query,
            "sssssssiii",
            $nombres,
            $apellidos,
            $email,
            $cvlac,
            $linkedin,
            $fecha_ingreso,
            $fecha_retiro,
            $rol,
            $estado,
            $id
        );

        if (!mysqli_stmt_execute($query)) {
            throw new Exception("Error al ejecutar la consulta: " . mysqli_stmt_error($query));
        }

        mysqli_stmt_close($query);

        return true;
    }

    public function obtenerIntegrantes()
    {
        $conexion = $this->obtenerConexion();
        $sql = "SELECT * FROM integrantes order by estado";
        $result = mysqli_query($conexion, $sql);
        $integrantes = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $integrantes[] = $row;
        }

        mysqli_free_result($result);

        return $integrantes;
    }

    public function obtenerPrimerosIntegrantes()
    {
        $cantidad = 3; // Obtener solo 3 integrantes
        $conexion = $this->obtenerConexion();
        $sql = "SELECT * FROM integrantes LIMIT ?";
        $query = mysqli_prepare($conexion, $sql);

        if (!$query) {
            throw new Exception("Error en la consulta preparada: " . mysqli_error($conexion));
        }

        mysqli_stmt_bind_param($query, "i", $cantidad);

        if (!mysqli_stmt_execute($query)) {
            throw new Exception("Error al ejecutar la consulta: " . mysqli_stmt_error($query));
        }

        $result = mysqli_stmt_get_result($query);
        $integrantes = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $integrantes[] = $row;
        }

        mysqli_stmt_close($query);

        return $integrantes;
    }
}
