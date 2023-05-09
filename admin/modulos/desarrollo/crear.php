<?php session_start();
if(!isset($_SESSION['administrador'])){
  header("location: ../../index.php");
}?>
<?php include("../../templates/header.php") ?>
crear desarrollo
<?php include("../../templates/footer.php") ?>