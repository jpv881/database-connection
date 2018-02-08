<?php
	session_start();
   include('conexion.php');

      if($_SESSION['user'] == null){
       header('Location: login.php');
   }

   $cod = $_GET['cod'];
   $nom= $_GET['nom'];
   $ap = $_GET['ap'];
   $sql = "update profesores set nombre = '".$nom."' , apellido = '".$ap."' where codigo = ".$cod;

   mysqli_query($conexion,$sql);
  
   ?>
