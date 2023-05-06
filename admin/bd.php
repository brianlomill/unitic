<?php

$server = "localhost";
$bd = "db_unitic";
$user = "root";
$password = "";

try {
    $conexion = new PDO("mysql:host = $server;dbname=$bd", $user, $password);
    echo "conexion realizada...";
} catch (Exception $error) {
    echo $error->getMessage();
}

?>