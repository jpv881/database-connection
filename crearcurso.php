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

    <div class="container">
			<?php include("menu.php"); ?>
     <h1>Creación de cursos</h1>
     <hr>
        <form role="form" method="post" class="col-md-6">

                <div class="form-group">
                <div class="form-group">
                  <label>Código</label>
                  <input type="text" class="form-control" required name="codigo">
                </div>
                    <div class="form-group">
                  <label>Curso</label>
                  <input type="text" class="form-control" required name="curso">
                </div>
                     <select class="form-control" required name="cod_ciclo">
                  <?php
                    $sql2 = "select codigo from ciclos";
                    $consulta2 = mysqli_query($conexion, $sql2);
                     while($fila2 = mysqli_fetch_array($consulta2)){ ?>
                         <option  value="<?php echo $fila2['codigo']?>"><?php echo $fila2['codigo']?></option>
                       <?php  }
                  ?>
                  </select>
                <div class="form-group">
                  <label>Turno</label>
                  <input type="text" class="form-control" required name="turno">
                </div>

                <button type="submit" class="btn btn-success">Crear Ciclo</button>

								<?php
									if($_SERVER['REQUEST_METHOD']=='POST'){
										$sqlu = "insert into cursos (codigo, curso, cod_ciclo, turno) values ('".$_POST['codigo']."', '".$_POST['curso']."', '".$_POST['cod_ciclo']."', '" .$_POST['turno']."')";
										mysqli_query($conexion,$sqlu);
										header("Location:ciclos.php");
									}
								 ?>

          </form>
    </div>
    </body>
    </html>
