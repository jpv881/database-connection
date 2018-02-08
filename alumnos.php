
<?php
	session_start();
   include('conexion.php');

      if($_SESSION['user'] == null){
       header('Location: login.php');
   }

  //select alumnos.nombre, alumnos.apellidos, cursos.codigo from alumnos, matrículas, modulos, cursos where alumnos.codigo = matrículas.cod_alumno and matrículas.cod_modulo = modulos.codigo and modulos.cod_curso = cursos.codigo

//select alumnos.nombre, alumnos.apellidos, cursos.codigo from alumnos join matrículas on alumnos.codigo = matrículas.cod_alumno join modulos on matrículas.cod_modulo = modulos.codigo join cursos on cursos.codigo = modulos.cod_curso
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


        $sql = "select distinct alumnos.codigo as cod, alumnos.nombre, alumnos.apellidos from alumnos left join matriculas on alumnos.codigo = matriculas.cod_alumno left join modulos on matriculas.cod_modulo = modulos.codigo left join cursos on cursos.codigo = modulos.cod_curso order by alumnos.apellidos";
        $consulta = mysqli_query($conexion, $sql); ?>
				<div class="page-header">
        <h1>ALUMNOS</h1>
			</div>

            <div class="col-md-10" id="divCuerpo">
								  <table class="table table-striped">
										<tr>
											<td><strong>Nombre</strong></td>
											<td><strong>Apellidos</strong></td>
											<td><strong>Curso</strong></td>
											<td><strong>Editar</strong></td>
											<td><strong>Borrar</strong></td>
										</tr>
        <?php

        while($fila = mysqli_fetch_array($consulta)){ ?>
						<tr>
							<td><?php echo $fila['nombre'];?></td>
							<td><?php echo $fila['apellidos'];?></td>
							<td>
							<?php
							$sql2 = "select distinct cursos.codigo as c from alumnos, matriculas, modulos, cursos WHERE alumnos.codigo = matriculas.cod_alumno and matriculas.cod_modulo = modulos.codigo and modulos.cod_curso = cursos.codigo and alumnos.codigo =".$fila['cod'];
							$consulta2 = mysqli_query($conexion, $sql2);
							while($fila2 = mysqli_fetch_array($consulta2)){ ?>
								<?php echo $fila2['c']." ";?>
					<?php		}
							 ?>
							 </td>
							<td><a style="display:inline" href="editaralumno.php?cod=<?php echo $fila['cod'];?>" class="btn btn-link" role="button">
										<span class="glyphicon glyphicon-pencil" style="color:black"></span></a></td>
							<td><a style="display:inline" href="borraralumno.php?cod=<?php echo $fila['cod'];?>" class="btn btn-link" role="button">
										<span class="glyphicon glyphicon-remove" style="color:red"></span></a></td>
						</tr>







    <?php }


    ?>
				</table>
				</div>
        </div>
		</div>
	</body>

	</html>
