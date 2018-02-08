
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

        //$sql = "select alumnos.codigo as cod, alumnos.nombre as a,alumnos.apellidos as ap , modulos.nombre as nom from alumnos, modulos, matrículas where alumnos.codigo = matrículas.cod_alumno and matrículas.cod_modulo = modulos.codigo and  alumnos.".$campo." = '".$text."'";
        $sql = "select distinct alumnos.codigo as cod, alumnos.nombre as nom, alumnos.apellidos as ap from alumnos, cursos, matriculas, modulos where alumnos.codigo = matriculas.cod_alumno and matriculas.cod_modulo = modulos.codigo and modulos.cod_curso = cursos.codigo and alumnos.".$campo." = '".$text."'";
        $consulta = mysqli_query($conexion, $sql);

        ?>
				<div class="page-header">
        <center><h1>Matrículas</h1></center>
			</div>

            <div class="col-md-10" id="divCuerpo">


                <?php while($fila = mysqli_fetch_array($consulta)){
                      $codigo = $fila['cod']; ?>
							<div id="panel" class="panel panel-warning">
                <div class="panel-heading">
                  <h5 style="display:inline"> <?php echo $fila['nom']; ?> <?php echo $fila['ap']; ?></h5>
                  <a style="display:inline" href="editarmatricula2.php?cod=<?php echo $fila['cod'];?>" class="btn btn-link" role="button">
                    <span class="glyphicon glyphicon-pencil" style="color:black"></span></a>
                  <a style="display:inline" class="btn btn-link" >
                    <span class="glyphicon glyphicon-remove" style="color:red" codal="<?php echo $codigo; ?>"></span></a>
                </div>
                  <table class="table table-striped">

        <?php
        $sql2 = "select modulos.modulo as m, modulos.nombre as nom from alumnos, matriculas, modulos where alumnos.codigo = matriculas.cod_alumno and matriculas.cod_modulo = modulos.codigo and alumnos.codigo =".$codigo;
        $consulta2 = mysqli_query($conexion, $sql2);

        while($fila2 = mysqli_fetch_array($consulta2)){ ?>

						<tr>
							<td><?php echo $fila2['m'];?></td><td><?php echo $fila2['nom'];?></td><td> <?php echo $fila['cu']; ?></td>
						</tr>

    <?php } ?>
					</table>
				</div>
			<?php	}

    ?>

				</div>
        </div>
		</div>
            <script src="matriculas.js"></script>
	</body>

	</html>
