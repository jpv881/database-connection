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

			#panel{
				width:90%;
				float:right;
			}
		</style>
	</head>

	<body>
		<div class="container">
			<?php
    include("menu.php");


        $sql = "select * from ciclos";
        $consulta = mysqli_query($conexion, $sql); ?>
				<div class="page-header">
					<center>
						<h2>CICLOS, CURSOS Y MÓDULOS</h2></center>
				</div>

				<div class="col-md-12" id="divCuerpo">

					<?php

        while($fila = mysqli_fetch_array($consulta)){ ?>
					<div class = "row">
						<div class="alert alert-info">
							<h4>
            <?php
                $cod_ciclo = $fila[0];
                echo "Ciclo: ".$fila['ciclo'];
								?>

								<a style="display:inline" href="editarciclo.php?cod=<?php echo $fila['codigo'];?>" class="btn btn-link" role="button">
								<span class="glyphicon glyphicon-pencil" style="color:black"></span></a>
								<a style="display:inline" href="borrarciclo.php?cod=<?php echo $fila['codigo'];?>" class="btn btn-link" role="button">
								<span class="glyphicon glyphicon-remove" style="color:red"></span></a>
						</h4>
						</div>
							<br>
								<?php
                $sql2 = 'SELECT * FROM cursos WHERE cod_ciclo ="'.$cod_ciclo.'"';

                $consulta2 = mysqli_query($conexion,$sql2);
                    while($fila2 = mysqli_fetch_array($consulta2)){
                        $cod_curso = $fila2[0];

							$sql3 = 'SELECT * FROM modulos WHERE cod_curso ="'.$cod_curso.'"'; $consulta3 = mysqli_query($conexion,$sql3); ?>
							<div id="panel" class="panel panel-default">
								<div class="panel-heading">
									<h5 style="display:inline">Curso: <?php echo $cod_curso; ?></h5>
									<a style="display:inline" href="editarcurso.php?cod=<?php echo $fila2['codigo'];?>" class="btn btn-link" role="button">
										<span class="glyphicon glyphicon-pencil" style="color:black"></span></a>
									<a style="display:inline" href="borrarcurso.php?cod=<?php echo $fila2['codigo'];?>" class="btn btn-link" role="button">
										<span class="glyphicon glyphicon-remove" style="color:red"></span></a>

								</div>

								<table id="tabla" class="table table-hover">
									<?php
                        while($fila3 = mysqli_fetch_array($consulta3)){ ?>
										<tr>
											<td>
													<?php echo $fila3['nombre'];  ?>

														<a href="editarmodulo.php?cod=<?php echo $fila3['codigo'];?>" class="btn btn-link" role="button"><span class="glyphicon glyphicon-pencil" style="color:black"></span></a>
														<a href="borrarmodulo.php?cod=<?php echo $fila3['codigo'];?>" class="btn btn-link" role="button"><span class="glyphicon glyphicon-remove" style="color:red"></span></a>
											</td>
										</tr>
										<?php } ?>
								</table>
							</div>

							<?php
                    } ?>

										</div>
								<?php } ?>

						</div>
				</div>

	</body>

	</html>
