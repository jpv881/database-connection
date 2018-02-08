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
     <h1>Creación de Alumnos</h1>
     <hr>
        <form role="form" method="post" class="col-md-6">

                <div class="form-group">
                <div class="form-group">
                  <label>Nombre</label>
                  <input type="text" class="form-control" required name="nombre">
                </div>
                    <div class="form-group">
                  <label>Apellidos</label>
                  <input type="text" class="form-control"  required name="apellidos">
                </div>

                <button type="submit" class="btn btn-success">Crear Alumno</button>

								<?php
									if($_SERVER['REQUEST_METHOD']=='POST'){
										$sqlu = "insert into alumnos (nombre, apellidos) values ('".$_POST['nombre']."', '".$_POST['apellidos']."')";
										mysqli_query($conexion,$sqlu);
                                       // $id = mysql_insert_id($conexion);
                                     $id =   $conexion->insert_id;
                                        echo "id: ".$id;
										header("Location: editarmatricula2.php?cod=".$id);
									}
								 ?>

          </form>
    </div>
    </body>
    </html>
