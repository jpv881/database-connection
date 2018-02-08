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
     <h1>Eliminación de Alumnos</h1>
     <hr>
     <?php
     $codigo = $_GET['cod'];
      $sql = "select * from alumnos where codigo = ".$_GET['cod'];
      $consulta = mysqli_query($conexion,$sql);
      while($fila = mysqli_fetch_array($consulta)){ ?>
      <div class="col-md-4">
      <table class="table table-striped">
        <tr><td><h4>Nombre</h4></td><td> <h4><?PHP echo $fila['nombre']; ?></h4></td></tr>
        <tr><td><h4>Apellidos</h4></td><td> <h4><?PHP echo $fila['apellidos']; ?></h4></td></tr>
      </table>

        <hr>
    <?php  }
      ?>
     <!--<form id="formMenu" method="POST" >
         <input  type="submit" class="btn btn-danger" value="Borrar Módulo" name="cerrar">
     </form>-->
     <form>
     <input type="button" class="btn btn-danger" value="Borrar Alumno" onclick="return confirmar('<?php echo "¿Borrar Alumno?"; ?>', '<?php echo $codigo; ?>')">
   </form>
     </div>

    </div>
    <script languaje=”Javascript”>
     function confirmar(variable1, variable2) {
       if (confirm (variable1)) {
				 window.location.href = "borraralumno2.php?cod="+variable2;
                 console.log(variable2);
         return true;
       } else {
				 window.location.href = "alumnos.php";
         return false;
       }
     }
     </script>
    </body>
    </html>
