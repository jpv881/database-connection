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
								<style>
									body {
										padding-top: 60px;
									}

								</style>
    </head>
    <body>
    <?php
        $sql = "select * from ciclos where codigo = '".$_GET['cod']."'";
        $consulta = mysqli_query($conexion, $sql);
        while($fila = mysqli_fetch_array($consulta)){
					$codigo = $fila['codigo'];
					$ciclo = $fila['ciclo'];
					$grado = $fila['grado'];


            }

        ?>

    <div class="container">
			<?php include("menu.php"); ?>
     <h1>Edición de ciclos</h1>
     <hr>
        <form role="form" method="post" class="col-md-6">

                <div class="form-group">
                <div class="form-group">
                  <label>Código</label>
                  <input type="text" class="form-control" value="<?php echo $codigo ?>" required name="codigo">
                </div>
                    <div class="form-group">
                  <label>Ciclo</label>
                  <input type="text" class="form-control" value="<?php echo $ciclo ?>" required name="ciclo">
                </div>
                <div class="form-group">
                  <label>Grado</label>
                  <input class="form-control" required name="grado" value="<?php echo $grado ?>" >
                </div>
                <button type="submit" class="btn btn-success">Editar</button>

								<?php
									if($_SERVER['REQUEST_METHOD']=='POST'){
										$sqlu = "update ciclos set codigo = '".$_POST['codigo']."', ciclo = '".$_POST['ciclo']."', grado = '".$_POST['grado']."' where codigo = '".$codigo."'";
										mysqli_query($conexion,$sqlu);
										header("Location:ciclos.php");
									}
								 ?>

          </form>
    </div>
    </body>
    </html>
