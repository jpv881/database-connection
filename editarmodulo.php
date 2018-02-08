<?php
	session_start();
   include('conexion.php');

      if($_SESSION['user'] == null){
       header('Location: login.php');
       }

			 $codMod = $_GET['cod'];
			 $sql1 = "select editandose from modulos where modulos.codigo =".$codMod;
			 $consulta1 = mysqli_query($conexion, $sql1);
			 $fila1 = mysqli_fetch_array($consulta1);
			 $editandose = $fila1['editandose'];

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
     <h1>Edición de módulos</h1>
     <hr>
        <form role="form" method="post" class="col-md-6">

                <div class="form-group">
                <div class="form-group">
                  <label>Módulo</label>
                  <input type="text" class="form-control" value="<?php echo $modulo ?>" required name="modulo">
                </div>
                    <div class="form-group">
                  <label>Nombre</label>
                  <input type="text" class="form-control" value="<?php echo $nombre ?>" required name="nombre">
                </div>
                <div class="form-group">
                  <label>Código del curso</label>
                  <select class="form-control" required name="codigo">
                  <?php
                    $sql2 = "select codigo from cursos";
                    $consulta2 = mysqli_query($conexion, $sql2);
                     while($fila2 = mysqli_fetch_array($consulta2)){ ?>
                         <option <?php if ($fila2['codigo'] == $cod_curso) echo " selected"; ?> value="<?php echo $fila2['codigo']?>"><?php echo $fila2['codigo']?></option>
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
								<?php
									if($editandose){ ?>
										<h4>Módulo en edición.</h4>
					<?php		}else{ ?>
										<button cod="<?php echo $codMod; ?>" type="submit" class="btn btn-success">Editar</button>
					<?php   }
								 ?>

								<?php
									if($_SERVER['REQUEST_METHOD']=='POST'){
										$sqlu = "update modulos set modulo = '".$_POST['modulo']."', nombre = '".$_POST['nombre']."', cod_curso = '".$_POST['codigo']."', cod_profesor='".$_POST['codigop']."' where codigo = '".$codigo."'";

										mysqli_query($conexion,$sqlu);
										$sql2 = "update modulos set editandose = false where modulos.codigo =".$codMod;
										mysqli_query($conexion,$sql2);
										//header("Location:ciclos.php");
										?>
										<script>
										window.location.href = ("http://www.javierperez.tk/servidor/conexionbbdd/ciclos.php");
										</script>
								<?php	} ?>

          </form>
    </div>
        <script src="jquery.min.js"></script>
        <script src="concurrenciamodulos.js"></script>
    </body>
    </html>
