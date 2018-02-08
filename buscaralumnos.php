
<?php
	session_start();
   include('conexion.php');

      if($_SESSION['user'] == null){
       header('Location: login.php');
   }

  
?>



			<?php



        $sql = "select distinct alumnos.codigo as cod, alumnos.nombre, alumnos.apellidos from alumnos left join matriculas on alumnos.codigo = matriculas.cod_alumno left join modulos on matriculas.cod_modulo = modulos.codigo left join cursos on cursos.codigo = modulos.cod_curso order by alumnos.apellidos";
        $consulta = mysqli_query($conexion, $sql); ?>


  
								  <table class="table table-striped">
										<tr>
											<td><strong>Nombre</strong></td>
											<td><strong>Apellidos</strong></td>
											<td><strong>Curso</strong></td>
										</tr>
        <?php

        while($fila = mysqli_fetch_array($consulta)){ ?>
						<tr class="fila" cod="<?php echo $fila['cod']; ?>">
							<td><?php echo $fila['nombre'];?></td>
							<td><?php echo $fila['apellidos'];?></td>
							<td>
							<?php
							$sql2 = "select distinct cursos.codigo as c from alumnos, matriculas, modulos, cursos WHERE alumnos.codigo = matriculas.cod_alumno and matriculas.cod_modulo = modulos.codigo and modulos.cod_curso = cursos.codigo and alumnos.codigo =".$fila['cod'];
							$consulta2 = mysqli_query($conexion, $sql2);
							while($fila2 = mysqli_fetch_array($consulta2)){ ?>
								<?php echo $fila2['c']." ";?>
					<?php		}
							 ?>
							 </td>
						</tr>


    <?php }


    ?>

