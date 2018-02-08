<?php
	session_start();
   include('conexion.php');

   if(is_null($_SESSION['user'])){
       header('Location: login.php');
       }
?>

	<!DOCTYPE html>
	<html>

	<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		<meta charset="utf-8">
		<style>
		.thumbnail{
			 width:25%;
			 margin-top: 15%;
		}
		</style>
	</head>

	<body>
		<div class="container">
		<center><div class="thumbnail">
			<img id ="im" src="img/database3.jpg"></img>
		</div></center>
			<?php
    include("menu.php");



    ?>
		</div>
	</body>

	</html>
