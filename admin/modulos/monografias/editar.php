<?php session_start();
if(!isset($_SESSION['Administrador'])){
  header("location: ../../index.php");
}?>
<?php include("../../templates/header.php") ?>
editar monografias
<?php include("../../templates/footer.php") ?>