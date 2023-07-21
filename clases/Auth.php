<?php
include 'Conexion.php';

class Auth extends Conexion
{
    public function logear($admin, $password)
    {
        $conexion = $this->obtenerConexion();
        $password_existente = "";
        $sql = "SELECT password FROM administrador WHERE email = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("s", $admin);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows === 1) {
            $row = $resultado->fetch_assoc();
            $password_existente = $row['password'];

            // Verificar que la contraseña ingresada coincide con la almacenada en la base de datos
            if (password_verify($password, $password_existente)) {
                $_SESSION['administrador'] = $admin;
                return true;
            } else {
                return false;
            }
        } else {
            // El administrador con el email proporcionado no fue encontrado
            return false;
        }
    }


    public function updateContrasena($adminId, $passwordAntigua, $passwordNueva)
    {
        $conexion = $this->obtenerConexion();

        $sql = "SELECT password FROM administrador WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("i", $adminId);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows === 1) {
            $row = $resultado->fetch_assoc();
            $passwordExistente = $row['password'];

            // Verificar que la contraseña antigua ingresada coincida con la almacenada en la base de datos
            if (password_verify($passwordAntigua, $passwordExistente)) {

                // Encriptar la nueva contraseña
                $hashedPassword = password_hash($passwordNueva, PASSWORD_DEFAULT);

                // Actualizar la contraseña encriptada en la base de datos
                $sqlUpdate = "UPDATE administrador SET password = ? WHERE id = ?";
                $stmtUpdate = $conexion->prepare($sqlUpdate);
                $stmtUpdate->bind_param("si", $hashedPassword, $adminId);

                // Verificar si ocurrió un error en la consulta de actualización
                if ($stmtUpdate->execute()) {
                    // La contraseña se actualizó correctamente
                    return true;
                } else {
                    // Ocurrió un error al actualizar la contraseña en la base de datos
                    throw new Exception("Error al actualizar la contraseña: " . $stmtUpdate->error);
                }
            } else {
                // La contraseña antigua ingresada no coincide con la almacenada en la base de datos
                throw new Exception("Contraseña antigua incorrecta.");
            }
        } else {
            // No se encontró un administrador con el ID proporcionado
            throw new Exception("Administrador no encontrado.");
        }
    }
}
