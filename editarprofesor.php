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
    <?php
        $sql = "select * from profesores where codigo = ".$_GET['cod'];
        $consulta = mysqli_query($conexion, $sql);
        while($fila = mysqli_fetch_array($consulta)){
					$codigo = $fila['codigo'];
					$nombre = $fila['nombre'];
					$apellidos = $fila['apellido'];
            }

        ?>

    <div class="container">
			<?php include("menu.php"); ?>
     <h1>Edición de Profesores</h1>
     <hr>
        <form role="form" method="post" class="col-md-6">
                <div class="form-group">
                <div class="form-group">
                  <label>Nombre</label>
                  <input id="inNomProf" type="text" class="form-control" value="<?php echo $nombre ?>" name="nombre">
                </div>
                    <div class="form-group">
                  <label>Apellidos</label>
                  <input id="inApProf" type="text" class="form-control" value="<?php echo $apellidos ?>" name="apellidos">
                </div>

                <button cod="<?php echo $_GET['cod']; ?>" id="btnEditarProf" type ="button" class="btn btn-success">Editar Profesor</button>
          </form>
    </div>
    <script src="jquery.min.js"></script>
    <script src="profesores.js"></script>
    </body>
    </html>
