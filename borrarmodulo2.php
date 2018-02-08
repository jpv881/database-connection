<html>
<head>
    <meta charset="utf-8">
</head>
<body>

<?php
	session_start();
   include('conexion.php');

      if($_SESSION['user'] == null){
       header('Location: login.php');
       }

            $sql1 = "select matriculas.codigo from matriculas, modulos where modulos.codigo = matriculas.cod_modulo and modulos.codigo = ".$_GET['cod'];
      $consulta1 = mysqli_query($conexion, $sql1);
       $fila1 = mysqli_fetch_array($consulta1);
       if(sizeof($fila1) > 0){ ?>
            <script languaje="Javascript">
                alert("No puedes eliminar un módulo que esté en alguna matrícula.");
                window.location.href = "ciclos.php";
          </script>
       <?php }else{
                    $sql = "delete from modulos where codigo=".$_GET['cod'];
                    mysqli_query($conexion, $sql);
                    header('Location: ciclos.php');
           }


?>
</body>
</html>