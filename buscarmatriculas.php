
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
    $campo = $_POST['busqueda'];
    $text = $_POST['txt'];

        $sql = "select alumnos.codigo as cod, alumnos.nombre as a,alumnos.apellidos as ap , modulos.nombre as nom from alumnos, modulos, matrículas where alumnos.codigo = matrículas.cod_alumno and matrículas.cod_modulo = modulos.codigo and  alumnos.".$campo." = '".$text."'";
        echo $sql;
        $consulta = mysqli_query($conexion, $sql); ?>
				<div class="page-header">
        <center><h1>Matrículas</h1></center>
			</div>

            <div class="col-md-10" id="divCuerpo">
								  <table class="table table-striped">
										<tr>
											<td><strong>Nombre</strong></td>
											<td><strong>Apellidos</strong></td>
											<td><strong>Módulo</strong></td>
											<td><strong>Editar</strong></td>
											<td><strong>Borrar</strong></td>
										</tr>
        <?php

        while($fila = mysqli_fetch_array($consulta)){ ?>
						<tr>
							<td><?php echo $fila['a'];?></td>
							<td><?php echo $fila['ap'];?></td>
							<td><?php echo $fila['nom'];?></td>
							<td><a style="display:inline" href="editarmatricula.php?cod=<?php echo $fila['cod'];?>&nom=<?php echo $fila['a'];?>&ap=<?php echo $fila['ap'];?>" class="btn btn-link" role="button">
										<span class="glyphicon glyphicon-pencil"></span></a></td>
							<td><a style="display:inline" href="borrarmatricula.php?cod=<?php echo $fila['cod'];?>" class="btn btn-link" role="button">
										<span class="glyphicon glyphicon-remove"></span></a></td>
						</tr>

    <?php }


    ?>
				</table>
				</div>
        </div>
		</div>
	</body>

	</html>
