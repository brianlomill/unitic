<?php
include 'Conexion.php';

class Integrantes extends Conexion
{

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
        $conexion = parent::conectar();
        $sql = "INSERT INTO integrantes (nombres, apellidos, email, foto, cvlac, linkedln, fecha_ingreso, roles_id, estado ) 
            VALUES (?,?,?,?,?,?,?,?,?)";
        $query = $conexion->prepare($sql);
        $query->bind_param(
            "sssssssii",
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

        return $query->execute();
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
        $conexion = parent::conectar();
        $sql = "UPDATE integrantes SET nombres=?, apellidos=?, email=?, cvlac=?, linkedln=?, fecha_ingreso=?, fecha_retiro=?, roles_id=?, estado=? WHERE id=$id";
        $query = $conexion->prepare($sql);
        $query->bind_param(
            "sssssssii",
            $nombres,
            $apellidos,
            $email,
            $cvlac,
            $linkedin,
            $fecha_ingreso,
            $fecha_retiro,
            $rol,
            $estado,
        );

        return $query->execute();
    }
}
