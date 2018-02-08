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
        $sql = "select * from cursos where codigo = '".$_GET['cod']."'";
        $consulta = mysqli_query($conexion, $sql);
        while($fila = mysqli_fetch_array($consulta)){
					$codigo = $fila['codigo'];
					$curso = $fila['curso'];
					$cod_ciclo = $fila['cod_ciclo'];
					$turno = $fila['turno'];

            }

        ?>

    <div class="container">
			<?php include("menu.php"); ?>
     <h1>Edición de cursos</h1>
     <hr>
        <form role="form" method="post" class="col-md-6">

                <div class="form-group">
                <div class="form-group">
                  <label>Código</label>
                  <input type="text" class="form-control" value="<?php echo $codigo ?>" required name="codigo">
                </div>
                    <div class="form-group">
                  <label>Curso</label>
                  <input type="text" class="form-control" value="<?php echo $curso ?>" required name="curso">
                </div>
                    <div class="form-group">
                  <label>Código del ciclo</label>
                  <input type="text" class="form-control" value="<?php echo $cod_ciclo ?>" required name="cod_ciclo">
                </div>
                <div class="form-group">
                  <label>Turno</label>
                  <input type="text" class="form-control" value="<?php echo $turno ?>" required name="turno">
                </div>

                <button type="submit" class="btn btn-success">Editar</button>

								<?php
									if($_SERVER['REQUEST_METHOD']=='POST'){
										$sqlu = "update cursos set codigo = '".$_POST['codigo']."', curso = '".$_POST['curso']."', cod_ciclo = '".$_POST['cod_ciclo']."', turno='".$_POST['turno']."' where codigo = '".$codigo."'";

										mysqli_query($conexion,$sqlu);
										header("Location:ciclos.php");
									}
								 ?>

          </form>
    </div>
    </body>
    </html>
