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
    <?php
        $sql = "select alumnos.nombre as nom, alumnos.apellidos as ap from alumnos where alumnos.codigo = '".$_GET['cod']."'";
        $consulta = mysqli_query($conexion, $sql);
        $fila = mysqli_fetch_array($consulta);

        ?>

    <div class="container">
			<?php include("menu.php"); ?>
     <h1>Edición de Matrículas</h1>
     <hr>
     <h4><?php echo $fila['nom']; ?> <?php echo $fila['ap']; ?></h4>
     <form method="POST" action="">
								<?php
									if($_SERVER['REQUEST_METHOD']=='POST'){
										$sqlu = "update modulos set modulo = '".$_POST['modulo']."', nombre = '".$_POST['nombre']."', cod_curso = '".$_POST['codigo']."', cod_profesor='".$_POST['codigop']."' where codigo = '".$codigo."'";

										mysqli_query($conexion,$sqlu);
										header("Location:ciclos.php");
									}

        $sql2 = "select modulos.nombre as nom, modulos.codigo as c, cursos.codigo as cod from modulos, cursos where modulos.cod_curso = cursos.codigo order by cod_curso";
        $consulta2 = mysqli_query($conexion, $sql2);
        $sql3 = "select modulos.codigo as cod from alumnos, matriculas, modulos where alumnos.codigo = matriculas.cod_alumno and matriculas.cod_modulo = modulos.codigo and alumnos.codigo = ".$_GET['cod'];
        $consulta3 = mysqli_query($conexion, $sql3);
 
        
        while($fila2 = mysqli_fetch_array($consulta2)){ ?>
        
          <input class="check" type="checkbox" codAl="<?php echo $_GET['cod']?>" codMo="<?php echo $fila2['c']?>" value="<?php echo $fila2['nom']?>"<?php 
           $consulta3 = mysqli_query($conexion, $sql3);
         while($fila3 = mysqli_fetch_array($consulta3)){
     
             if($fila2['c'] == $fila3['cod']){
                    echo " checked";
                }
              }
          ?>><?php echo " ".$fila2['nom']?><br>

      <?php  }
								 ?>

          </form>
          <hr>
          <button id="btnFinalizar" class="btn btn-success">Finalizar</button>
          <br>
    </div>
    <script src="jquery.min.js"></script>
    <script src="matriculas.js"></script>
    </body>
    </html>
