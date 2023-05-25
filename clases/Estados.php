<?php

class Estado extends Conexion
{
    public function __construct()
    {
        parent::__construct();
    }

    public function obtenerEstados()
    {
        $conexion = $this->obtenerConexion();
        $sql = "SELECT id, estado FROM estados";
        $result = mysqli_query($conexion, $sql);
        $estados = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $estados[] = $row;
        }

        mysqli_free_result($result);

        return $estados;
    }
}

?>
