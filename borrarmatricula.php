<?php
	session_start();
   include('conexion.php');

      if($_SESSION['user'] == null){
       header('Location: login.php');
   }
   
   $al= $_GET['codAl'];
   $sql = "delete from matriculas where cod_alumno = ".$al;
  
   mysqli_query($conexion,$sql);

?>