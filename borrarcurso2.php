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

<?php
       $sql = "select * from modulos where cod_curso = '".$_GET['cod']."'";
      $consulta = mysqli_query($conexion, $sql);
       $fila = mysqli_fetch_array($consulta);

       if(sizeof($fila) > 0){ ?>
         <script languaje="Javascript">
            alert("No puedes eliminar un curso que contenga módulos");
            window.location.href = "ciclos.php";
          </script>

      <?php }else{
        $sql = "delete from cursos where codigo = '".$_GET['cod']."'";
        mysqli_query($conexion, $sql);
        header("Location:ciclos.php");
       }
       /*$sql = "delete from modulos where codigo=".$_GET['cod'];
       mysqli_query($conexion, $sql);
       header('Location: ciclos.php');*/
?>
  <script src="jquery.min.js"></script>
  </body>
  </html>
