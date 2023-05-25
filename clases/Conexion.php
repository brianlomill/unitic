<?php

class Conexion
{
    public $servidor = "localhost";
    public $user = "root";
    public $password = "";
    public $database = "db_unitic";
    public $puerto = "3306";
    public $conexion;

    public function __construct()
    {
        $this->conexion = mysqli_connect(
            $this->servidor,
            $this->user,
            $this->password,
            $this->database,
            $this->puerto
        );

        if (!$this->conexion) {
            throw new Exception("Error de conexión: " . mysqli_connect_error());
        }
    }

    public function obtenerConexion()
    {
        return $this->conexion;
    }
}

?>