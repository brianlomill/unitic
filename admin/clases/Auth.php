<?php
    include 'Conexion.php';

    class Auth extends Conexion{
        public function logear($admin, $password){
            $conexion = parent::conectar();
            $password_existente = "";
            $sql = "Select * from administrador
                    where email = '$admin'";
            $respuesta = mysqli_query($conexion, $sql);
            $password_existente = mysqli_fetch_array($respuesta)['password'];
            if($password == $password_existente){
                $_SESSION['administrador'] = $admin;
                return true;
            }else{
                return false;
            }
        }
    }
?>