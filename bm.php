<?php
	session_start();
   include('conexion.php');

      if($_SESSION['user'] == null){
       header('Location: login.php');
   }
   
   $al= $_GET['codAl'];
   $mo = $_GET['codMo'];
   $sql = "delete from matriculas where cod_alumno = ".$al." and cod_modulo = ".$mo;
   mysqli_query($conexion,$sql);
?>