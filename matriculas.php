
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


        $sql = "select modulos.nombre as m,cursos.codigo as c, profesores.nombre as p from modulos, cursos, profesores where cursos.codigo = modulos.cod_curso and profesores.codigo = modulos.cod_profesor";
        $consulta = mysqli_query($conexion, $sql); ?>
				<div class="page-header">
        <center><h1>Matrículas</h1></center>
			</div>

   
                <div class="col-md-5">
                <form method="post" action="buscarmatriculas2.php" class="col-md-12">
                <h3>Buscar Matrícula</h3>
                <div class="form-group">
                        <div class="form-group">
                          <label>Buscar por:</label>
                          <select class="form-control"  name="busqueda">
                            <option value="codigo">Código</option>
                            <option value="nombre">Nombre</option>
                            <option value="apellidos" selected>Apellidos</option>
                          </select>
                    </div>
                    <div class="form-group">
                        <label>Texto a buscar:</label>
                        <input type="text" class="form-control"  required name="txt">
                </div>

                <button type="submit" class="btn btn-success">Buscar Matrícula</button>
          </form>
          </div>
            </div>
                     <div class="col-md-7">
            <h3>Crear Matrícula</h3>
            <button id="btnCrearAlumno" class="btn btn-link">Crear Alumno</button>
            <button id="btnVerAlumnos" class="btn btn-link">Ver Alumnos</button>
            <br>
            <br>
            <div id="divAl" class="col-md-12" style="overflow:scroll; max-height:350px; display:none">
            
            </div>
          </div>
        </div>
    <script src="matriculas.js"></script>
	</body>

	</html>
