<?php session_start();
if(!isset($_SESSION['Administrador'])){
  header("location: ../../index.php");
}?>
<?php include("../../templates/header.php") ?>
crear integrantes
<?php include("../../templates/footer.php") ?>