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
        
        // Verificar la conexión a la base de datos
        $conexion = $this->obtenerConexion();
        
        if (!$conexion) {
            throw new Exception("Error en la conexión a la base de datos: " . mysqli_connect_error());
        }
    
        $sql = "SELECT * FROM portafolios where tipo_trabajo = 1 LIMIT ?";
        
        // Manejo de errores en la preparación de la consulta
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
    
        // Cerrar la consulta y la conexión
        mysqli_stmt_close($query);
        mysqli_close($conexion);
    
        return $proyectos;
    }
    

    public function obtenerIntegrantes(){
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
