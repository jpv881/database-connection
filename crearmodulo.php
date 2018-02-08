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
     <h1>Creación de Módulos</h1>
     <hr>
        <form role="form" method="post" class="col-md-6">

                <div class="form-group">
                <div class="form-group">
                  <label>Módulo</label>
                  <input type="text" class="form-control" required name="modulo">
                </div>
                    <div class="form-group">
                  <label>Nombre</label>
                  <input type="text" class="form-control"  required name="nombre">
                </div>
                <div class="form-group">
                  <label>Código del curso</label>
                  <select class="form-control" required name="codigo">
                  <?php
                    $sql2 = "select codigo from cursos";
                    $consulta2 = mysqli_query($conexion, $sql2);
                     while($fila2 = mysqli_fetch_array($consulta2)){ ?>
                         <option  value="<?php echo $fila2['codigo']?>"><?php echo $fila2['codigo']?></option>
                       <?php  }
                  ?>
                  </select>
                </div>
                    <div class="form-group">
                  <label>Código del profesor</label>
                  <select class="form-control" required name="codigop">
                  <?php
                    $sql3 = "select codigo from profesores";
                    $consulta3 = mysqli_query($conexion, $sql3);
                     while($fila3 = mysqli_fetch_array($consulta3)){ ?>
                         <option <?php if ($fila3['codigo'] == $cod_profesor) echo " selected"; ?> value="<?php echo $fila3['codigo']?>"><?php echo $fila3['codigo']?></option>
                       <?php  }
                  ?>
                  </select>
                </div>
                <button type="submit" class="btn btn-success">Crear Módulo</button>

								<?php
									if($_SERVER['REQUEST_METHOD']=='POST'){
										$sqlu = "insert into modulos (modulo, nombre, cod_curso, cod_profesor) values ('".$_POST['modulo']."', '".$_POST['nombre']."', '".$_POST['codigo']."', " .$_POST['codigop'].")";
                                        //echo $sqlu;
										mysqli_query($conexion,$sqlu);
										header("Location:ciclos.php");
									}
								 ?>

          </form>
    </div>
    </body>
    </html>
