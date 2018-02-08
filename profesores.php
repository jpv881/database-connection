
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
		<div class="container">
			<?php
    include("menu.php");


        $sql = "select profesores.nombre as nom, profesores.apellido, modulos.nombre from profesores, modulos where profesores.codigo = modulos.cod_profesor";
        $consulta = mysqli_query($conexion, $sql); ?>
				<div class="page-header">
        <h1>Profesores y Módulos Impartidos</h1>
			</div>

            <div class="col-md-10" id="divCuerpo">

				<?php
					$sql2 = "select * from profesores";
					$consulta2 = mysqli_query($conexion, $sql2);

				while($fila2 = mysqli_fetch_array($consulta2)){ ?>
					<div class="panel panel-primary">
						<div class="panel-heading"><h5 style="display:inline"><?php echo $fila2['nombre']; ?></h5>
						</div>
							<?php
									$sql3 = "select modulos.nombre as m, modulos.cod_curso as c from modulos, profesores where modulos.cod_profesor = profesores.codigo and profesores.nombre = '".$fila2['nombre']."'";
									$consulta3 = mysqli_query($conexion,$sql3);
									?>
									<table class="table table-hover">
									<?php
									while($fila3 = mysqli_fetch_array($consulta3)){ ?>
										<tr><td class="col-md-6"><?php echo $fila3['m']?></td><td><?php echo $fila3['c']?></td></tr>
								<?php	} ?>
								</table>
					</div>
			<?php	} ?>


				</div>
        </div>
		</div>
	</body>

	</html>
