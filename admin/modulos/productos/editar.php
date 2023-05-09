<?php session_start();
if(!isset($_SESSION['administrador'])){
  header("location: ../../index.php");
}?>
<?php include("../../templates/header.php") ?>
editar productos
<?php include("../../templates/footer.php") ?>