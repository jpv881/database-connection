
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


        $sql = "select modulos.nombre as m,cursos.codigo as c, profesores.nombre as p, profesores.codigo as profcod, profesores.apellido as ap from modulos, cursos, profesores where cursos.codigo = modulos.cod_curso and profesores.codigo = modulos.cod_profesor";
        $consulta = mysqli_query($conexion, $sql); ?>
				<div class="page-header">
        <h1>Módulos, Cursos y Profesores</h1>
			</div>

            <div class="col-md-10" id="divCuerpo">
								  <table class="table table-striped">
										<tr>
											<td><strong>Módulo</strong></td>
											<td><strong>Curso</strong></td>
											<td><strong>Nombre del Profesor</strong></td>
                                            <td><strong>Apellidos</strong></td>
                                            <td><strong>Editar</strong></td>
										</tr>
        <?php

        while($fila = mysqli_fetch_array($consulta)){ ?>
						<tr>
							<td><?php echo $fila['m'];?></td>
							<td><?php echo $fila['c'];?></td>
							<td><?php echo $fila['p'];?></td>
							<td><?php echo $fila['ap'];?></td>
                            <td><a style="display:inline" href="editarprofesor.php?cod=<?php echo $fila['profcod'];?>" class="btn btn-link" role="button">
                                    <span class="glyphicon glyphicon-pencil" style="color:black"></span></a></td>
						</tr>

    <?php }


    ?>
				</table>
				</div>
        </div>
		</div>
	</body>

	</html>
