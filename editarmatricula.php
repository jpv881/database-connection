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
							body{
								padding-top:60px;
							}
						</style>
    </head>
    <body>
    <?php
        $sql = "select * from modulos where codigo = '".$_GET['cod']."'";
        $consulta = mysqli_query($conexion, $sql);
        while($fila = mysqli_fetch_array($consulta)){
					$codigo = $fila['codigo'];
					$modulo = $fila['modulo'];
					$nombre = $fila['nombre'];
					$cod_curso = $fila['cod_curso'];
          $cod_profesor = $fila['cod_profesor'];

            }

        ?>

    <div class="container">
			<?php include("menu.php"); ?>
     <h1>Edición de Matrículas</h1>
     <hr>
        <form role="form" method="post" class="col-md-6">

                <div class="form-group">
                    <h4><?php echo $_GET['nom']." ".$_GET['ap'] ?></h4>
                <div class="form-group">
                  <label>Curso de la matrícula</label>
                  <select class="form-control" required name="codigo">
                  <?php
                    $sql = "select codigo from cursos";
                    $consulta = mysqli_query($conexion, $sql);
                     while($fila = mysqli_fetch_array($consulta)){ ?>
                         <option <?php if ($fila['codigo'] == $_GET['codMat']) echo " selected"; ?> value="<?php echo $fila['codigo']?>"><?php echo $fila['codigo']?></option>
                       <?php  }
                  ?>
                  </select>
                </div>

                <button type="submit" class="btn btn-success">Editar Matrícula</button>

								<?php
									if($_SERVER['REQUEST_METHOD']=='POST'){
										$sqlu = "update modulos set modulo = '".$_POST['modulo']."', nombre = '".$_POST['nombre']."', cod_curso = '".$_POST['codigo']."', cod_profesor='".$_POST['codigop']."' where codigo = '".$codigo."'";

										mysqli_query($conexion,$sqlu);
										header("Location:ciclos.php");
									}
								 ?>

          </form>
    </div>
    </body>
    </html>
