<?php
	session_start();
   include('conexion.php');

      if($_SESSION['user'] == null){
       header('Location: login.php');
       }
?>

	<!DOCTYPE html>
	<html>

	<head>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
						<style>
							body {
								padding-top: 60px;
							}
						</style>
    </head>
    <body>

    <div class="container">
		<?php include("menu.php"); ?>
     <h1>Creación de Ciclos</h1>
     <hr>
        <form role="form" method="post" class="col-md-6">

                <div class="form-group">
                <div class="form-group">
                  <label>Codigo</label>
                  <input type="text" class="form-control"  required name="codigo">
                </div>
                    <div class="form-group">
                  <label>Ciclo</label>
                  <input type="text" class="form-control"  required name="ciclo">
                </div>
                    <div class="form-group">
                  <label>Grado</label>
                  <input type="text" class="form-control"  required name="grado">
                </div>
                <button type="submit" class="btn btn-success">Crear Ciclo</button>

								<?php
									if($_SERVER['REQUEST_METHOD']=='POST'){
										$sqlu = "insert into ciclos (codigo, ciclo, grado) values ('".$_POST['codigo']."', '".$_POST['ciclo']."', '".$_POST['grado']."')";
										mysqli_query($conexion,$sqlu);
										header("Location:ciclos.php");
									}
								 ?>

          </form>
    </div>
    </body>
    </html>
