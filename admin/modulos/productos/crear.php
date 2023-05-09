<?php session_start();
if(!isset($_SESSION['administrador'])){
  header("location: ../../index.php");
}?>
<?php include("../../templates/header.php") ?>
Crear productos
<?php include("../../templates/footer.php") ?>