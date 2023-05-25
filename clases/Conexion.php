<?php

    class Conexion{
        public $servidor = "localhost";
        public $user = "root";
        public $password = "";
        public $database = "db_unitic";
        public $puerto = "3306";

        public function conectar(){
            return mysqli_connect(
                $this->servidor,
                $this->user,
                $this->password,
                $this->database,
                $this->puerto
            );
        }
    }

?>