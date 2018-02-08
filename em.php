<?php
	session_start();
   include('conexion.php');

      if($_SESSION['user'] == null){
       header('Location: login.php');
   }
   
   $al= $_GET['codAl'];
   $mo = $_GET['codMo'];
   $sql = "insert into matriculas (cod_alumno, cod_modulo) values (".$al.",".$mo.")";
   mysqli_query($conexion,$sql);
?>