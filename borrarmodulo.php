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
    </head>
    <body>

    <div class="container">
     <h1>Eliminación de módulos</h1>
     <hr>
     <?php
      $sql = "select * from modulos where codigo = ".$_GET['cod'];
      $consulta = mysqli_query($conexion,$sql);
      while($fila = mysqli_fetch_array($consulta)){ ?>
      <div class="col-md-4">
      <table class="table table-striped">
        <tr><td><h4>Código</h4></td><td> <h4><?PHP echo $fila['codigo']; ?></h4></td></tr>
        <tr><td><h4>Módulo</h4></td><td> <h4><?PHP echo $fila['modulo']; ?></h4></td></tr>
        <tr><td><h4>Nombre</h4></td><td> <h4><?PHP echo $fila['nombre']; ?></h4></td></tr>
        <tr><td><h4>Código del curso</h4></td><td> <h4><?PHP echo $fila['cod_curso']; ?></h4></td></tr>
        <tr><td><h4>Código del profesor</h4></td><td> <h4><?PHP echo $fila['cod_profesor']; ?></h4></td></tr>
      </table>

        <hr>
    <?php  }
      ?>
     <!--<form id="formMenu" method="POST" >
         <input  type="submit" class="btn btn-danger" value="Borrar Módulo" name="cerrar">
     </form>-->
     <form>
     <input type="button" href="" class="btn btn-danger" value="Borrar Módulo" onclick="return confirmar('<?php echo "¿Borrar Módulo?"; ?>', <?php echo $_GET['cod'] ?>)">
   </form>
     </div>
     <?php
     /*if($_SERVER['REQUEST_METHOD']=='POST'){
       //$mensaje = "¿Borrar módulo?";
      // return confirmar($mensaje);
onclick=”confirmar('<?php echo "borrar"; ?>')"
     */
      ?>

    </div>
    <script languaje=”Javascript”>
     function confirmar(variable1, variable2) {
       if (confirm (variable1)) {
				 window.location.href = "borrarmodulo2.php?cod="+variable2;
         return true;
       } else {
				 window.location.href = "ciclos.php";
         return false;
       }
     }
     </script>
    </body>
    </html>
