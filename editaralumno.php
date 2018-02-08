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
    </head>
    <body>
    <?php
        $sql = "select * from alumnos where codigo = ".$_GET['cod'];
        $consulta = mysqli_query($conexion, $sql);
        while($fila = mysqli_fetch_array($consulta)){
					$codigo = $fila['codigo'];
					$nombre = $fila['nombre'];
					$apellidos = $fila['apellidos'];
            }

        ?>

    <div class="container">
     <h1>Edición de Alumnos</h1>
     <hr>
        <form role="form" method="post" class="col-md-6">

                <div class="form-group">
                <div class="form-group">
                  <label>Nombre</label>
                  <input type="text" class="form-control" value="<?php echo $nombre ?>" required name="nombre">
                </div>
                    <div class="form-group">
                  <label>Apellidos</label>
                  <input type="text" class="form-control" value="<?php echo $apellidos ?>" required name="apellidos">
                </div>

                <button type="submit" class="btn btn-success">Editar Alumno</button>

								<?php
									if($_SERVER['REQUEST_METHOD']=='POST'){
										$sqlu = "update alumnos set nombre = '".$_POST['nombre']."', apellidos = '".$_POST['apellidos']."' where codigo = '".$codigo."'";

										mysqli_query($conexion,$sqlu);
										header("Location:alumnos.php");
									}
								 ?>

          </form>
    </div>
    </body>
    </html>
