<?php session_start();
if(!isset($_SESSION['administrador'])){
  header("location: ../index.php");
}?>
<?php 
include('templates/header.php');
?>
<br/>
<div class="p-5 mb-4 bg-light rounded-3">
  <div class="container-fluid py-5 text-black">
    <h1>Bienvenido Administrador</h1>
    <p>Using a series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking.</p>
    <button class="btn btn-primary btn-lg" type="button">Example button</button>
  </div>
</div>

<!--?php include('templates/footer.php');?-->