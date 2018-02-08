<?php
	session_start();
   include('conexion.php');

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
        $sql = "select * from modulos where codigo = ".$_GET['cod'];
        $consulta = mysqli_query($conexion, $sql);
        while($fila = mysqli_fetch_array($consulta)){
					$codigo = $fila['codigo'];
					$modulo = $fila['modulo'];
					$nombre = $fila['nombre'];
					$cod_curso = $fila['cod_curso'];

            }

        ?>

    <div class="container">
     <h1>Registro de nuevo usuario</h1>
     <hr>
        <form role="form" method="post" class="col-md-6" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <div class="form-group">
                  <label>Nombre</label>
                  <input type="text" class="form-control"  required name="nombre">
                </div>
                <div class="form-group">
                  <label>Primer Apellido</label>
                  <input type="text" class="form-control"  required name="apellido1">
                </div>
                <div class="form-group">
                  <label>Segundo Apellido</label>
                  <input type="text" class="form-control"  required name="apellido2">
                </div>
								<div class="form-group">
									<label>Email</label>
									<input type="email" class="form-control"  required name="email1">
								</div>
								<div class="form-group">
									<label>Repite el Email</label>
									<input type="email" class="form-control"  required name="email2">
								</div>
                <hr>
                <div class="form-group">
                  <label>Nombre de Usuario</label>
                  <input type="text" class="form-control"  required name="usuario">
                </div>
                <div class="form-group">
                  <label>Contraseña</label>
                  <input type="password" class="form-control"  required name="pass">
                </div>
								<div class="form-group">
									<label>Repite la Contraseña</label>
									<input type="password" class="form-control"  required name="pass2">
								</div>
                <button type="submit" class="btn btn-success">Crear Usuario</button>

								<?php
									if($_SERVER['REQUEST_METHOD']=='POST'){
                    $sql = "select * from usuarios where usuario = '".$_POST['usuario']."'";
                    $consulta = mysqli_query($conexion, $sql);
                    $fila = mysqli_fetch_array($consulta);
										$sql2 = "select * from usuarios where email = '".$_POST['email1']."'";
										$consulta2 = mysqli_query($conexion, $sql2);
										$fila2 = mysqli_fetch_array($consulta2);

										if($_POST['pass'] == $_POST['pass2'] && $_POST['email1'] == $_POST['email2']){
											if(sizeof($fila) > 0){ ?>
												<strong style="color:red" >El nombre de usuario ya existe.</strong>
								<?php }else if(sizeof($fila2) > 0){ ?>
												<strong style="color:red" >El email ya existe.</strong>
								<?php	}else{
												$sql2 = "insert into usuarios (usuario, nombre, apellido1, apellido2, password, email) values('".$_POST['usuario']."', '".$_POST['nombre']."', '".$_POST['apellido1']."', '".$_POST['apellido2']."', '".md5($_POST['pass'])."', '".$_POST['email1']."')";
												echo $sql2;
														if (mysqli_query($conexion, $sql2)) {
																$_SESSION['user'] = $_POST['usuario'];
																header("Location:index.php");
														} else { ?>
																<strong style="color:red" >Error al crear el usuario</strong>
												<?php  }
												}
										}else{
											echo '<script languaje="Javascript">alert("Las contraseñas o los emails no coinciden");</script>';
										}


                    }

                  ?>

          </form>
    </div>
    </body>
    </html>
