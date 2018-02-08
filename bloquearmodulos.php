<?php
	session_start();
   include('conexion.php');

      if($_SESSION['user'] == null){
       header('Location: login.php');
   }


   $sql = "update modulos set editandose = true where modulos.codigo = ".$_GET['cod'];
   mysqli_query($conexion,$sql);
?>
