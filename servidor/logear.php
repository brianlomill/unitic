<?php
include ('../clases/Auth.php');
session_start();

$admin = $_POST['admin'];
$password = $_POST['password'];

$Auth = new Auth();

if ($Auth->logear($admin, $password)) {
    header("location: ../admin/index.php");
} else {
    header('Location: ../admin/login.php?error=1');
    exit();
}

?>