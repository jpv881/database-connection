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
     <h1>Eliminación de Cursos</h1>
     <hr>
     <?php
      $sql = "select * from cursos where codigo = '".$_GET['cod']."'";
      $consulta = mysqli_query($conexion,$sql);
      while($fila = mysqli_fetch_array($consulta)){ ?>
      <div class="col-md-4">
      <table class="table table-striped">
        <tr><td><h4>Código</h4></td><td> <h4><?PHP echo $fila['codigo']; ?></h4></td></tr>
        <tr><td><h4>Curso</h4></td><td> <h4><?PHP echo $fila['curso']; ?></h4></td></tr>
        <tr><td><h4>Código del ciclo</h4></td><td> <h4><?PHP echo $fila['cod_ciclo']; ?></h4></td></tr>
        <tr><td><h4>Turno</h4></td><td> <h4><?PHP echo $fila['turno']; ?></h4></td></tr>
      </table>
        <hr>
    <?php  }
      ?>

     <form>
     <input type="button" class="btn btn-danger" value="Borrar Curso" onclick="return confirmar('<?php echo "¿Borrar Curso?"; ?>', '<?php echo $_GET['cod'] ?>')">


   </form>
     </div>

    </div>
    <script languaje=”Javascript”>
     function confirmar(variable1, variable2) {
       if (confirm (variable1)) {
				 window.location.href = "borrarcurso2.php?cod="+variable2;
         return true;
       } else {
         window.location.href = "ciclos.php";
         return false;
       }
     }
     </script>

    </body>
    </html>
