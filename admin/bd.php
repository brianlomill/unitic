<?php

$server = "localhost";
$bd = "db_unitic";
$user = "root";
$password = "";

try {
    $conexion = new PDO("mysql:host = $server;dbname=$bd", $user, $password);
} catch (Exception $error) {
    echo $error->getMessage();
}

?>