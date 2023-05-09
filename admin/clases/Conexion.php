<!--?php

$server = "localhost";
$bd = "db_unitic";
$user = "root";
$password = "";

try {
    $conexion = new PDO("mysql:host = $server;dbname=$bd", $user, $password);
} catch (Exception $error) {
    echo $error->getMessage();
}

?!-->

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